<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function cekuser()
    {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp = $this->input->ip_address();
        $secret = "6LfffwsfAAAAAA2w41z9UFCue-h056Hq5Dx-QrwQ";
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
    
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
    
        $status = json_decode($output, true);
    
        if ($status['success']) {
            $username = htmlspecialchars($this->input->post('username'), ENT_QUOTES);
            $password = htmlspecialchars($this->input->post('password'), ENT_QUOTES);
    
            // Fetch user data including the hashed password
            $query = $this->db->select('password, id_user, nama, level')
                              ->from('user')
                              ->where('username', $username)
                              ->get();
    
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $storedPassword = $row->password;
    
                // Check if the password is stored as MD5 hash
                if (strlen($storedPassword) === 32) { // MD5 hash length
                    // Verify MD5 hash
                    if (md5($password) === $storedPassword) {
                        // Update password hash to bcrypt
                        $newHash = password_hash($password, PASSWORD_BCRYPT);
    
                        // Update the database with the new password hash
                        $this->db->where('username', $username);
                        $this->db->update('user', ['password' => $newHash]);
    
                        // Set session data and redirect
                        $data = [
                            'id'   => $row->id_user,
                            'nama' => $row->nama,
                            'level' => $row->level,
                            'role' => '1'
                        ];
                        $this->session->set_userdata($data);
                        redirect("admin/index");
                    } else {
                        $this->session->set_flashdata('msg', 'gagal');
                        redirect('welcome/index');
                    }
                } else {
                    // Verify password using bcrypt (for new entries)
                    if (password_verify($password, $storedPassword)) {
                        // Set session data and redirect
                        $data = [
                            'id'   => $row->id_user,
                            'nama' => $row->nama,
                            'level' => $row->level,
                            'role' => '1'
                        ];
                        $this->session->set_userdata($data);
                        redirect("admin/index");
                    } else {
                        $this->session->set_flashdata('msg', 'gagal');
                        redirect('welcome/index');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', 'gagal');
                redirect('welcome/index');
            }
        } else {
            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect('welcome/index');
        }
    }


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}

}
