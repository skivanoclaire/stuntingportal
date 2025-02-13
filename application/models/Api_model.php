<?php
class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
     public function fetch_data($url, $api_key) {
        // Ensure the URL is HTTPS
        if (strpos($url, 'https://') !== 0) {
            log_message('error', 'URL must use HTTPS');
            return false;
        }
    
        $headers = array(
            'apikey: ' . $api_key,
            'Accept: application/xml'
        );
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        // Enable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // Verify the host
        curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output for debugging
    
        $response = curl_exec($ch);
    
        // Check for cURL errors
        if (curl_errno($ch)) {
            log_message('error', 'cURL error: ' . curl_error($ch));
            curl_close($ch);
            return false;
        }
    
        curl_close($ch);
    
        // Log raw response
        log_message('debug', 'Raw API response: ' . $response);
    
        // Load XML response
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($response);
    
        if ($xml === false) {
            // Convert libxml errors to string
            $errors = libxml_get_errors();
            $errorMessages = array();
            foreach ($errors as $error) {
                $errorMessages[] = $error->message;
            }
            libxml_clear_errors();
    
            log_message('error', 'XML parse error: ' . implode(', ', $errorMessages));
            return false;
        }
    
        $json = json_encode($xml);
        $data = json_decode($json, true);
    
        return isset($data['berita']) ? $data['berita'] : false;
    }


     public function save_data($data, $source) {
        // Ensure the data is an array
        if (!is_array($data)) {
            return false;
        }
    
        // Start transaction
        $this->db->trans_start();
    
        // Get existing records
        $existing_records = $this->db->select('id_user, source')->get('api_data')->result_array();
        $existing_records_map = [];
        foreach ($existing_records as $record) {
            $existing_records_map[$record['id_user']][$record['source']] = true;
        }
    
        $update_ids = array();
        $insert_data = array();
    
        foreach ($data as $item) {
            $unique_id = $item['id_user'] . '_' . $source; // Combine id_user with source
    
            if (isset($existing_records_map[$item['id_user']][$source])) {
                // Record exists, so update it
                $this->db->where('id_user', $item['id_user']);
                $this->db->where('source', $source);
                $this->db->update('api_data', array(
                    'judul' => $item['judul'],
                    'isi' => $item['isi'],
                    'tanggal_post' => $item['tanggal_post'],
                    'status_berita' => $item['status_berita']
                ));
                $update_ids[] = $unique_id;
            } else {
                // Record does not exist, so prepare for insertion
                $insert_data[] = array(
                    'id_user' => $item['id_user'],
                    'judul' => $item['judul'],
                    'isi' => $item['isi'],
                    'tanggal_post' => $item['tanggal_post'],
                    'status_berita' => $item['status_berita'],
                    'source' => $source
                );
            }
        }
    
        // Insert new records
        if (!empty($insert_data)) {
            $this->db->insert_batch('api_data', $insert_data);
        }
    
        // Ensure only the 5 latest records are kept
        $this->db->order_by('tanggal_post', 'DESC'); // Order by date, latest first
        $query = $this->db->get('api_data');
        $all_records = $query->result_array();
    
        // Get the IDs of the latest 5 records
        $latest_ids = array_column(array_slice($all_records, 0, 5), 'id_user');
    
        // Delete records not in the latest 5
        $this->db->where_not_in('id_user', $latest_ids);
        $this->db->where('source', $source); // Ensure the deletion is limited to the same source
        $this->db->delete('api_data');
    
        // Complete transaction
        $this->db->trans_complete();
    
        return $this->db->trans_status(); // Return true if transaction succeeded, false otherwise
    }






}

?>
