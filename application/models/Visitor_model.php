<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Visitor_model extends CI_Model
{

    public function record_visitor()
    {
        $ip_address = $this->input->ip_address();
        $today = date('Y-m-d');

        // Cek apakah IP sudah tercatat hari ini
        $query = $this->db->get_where('visitor_counter', [
            'ip_address' => $ip_address,
            'visit_date' => $today
        ]);

        if ($query->num_rows() > 0) {
            // Jika sudah tercatat, tambahkan hit
            $this->db->set('hits', 'hits+1', FALSE)
                ->where('ip_address', $ip_address)
                ->where('visit_date', $today)
                ->update('visitor_counter');
        } else {
            // Jika belum, tambahkan data baru
            $this->db->insert('visitor_counter', [
                'ip_address' => $ip_address,
                'visit_date' => $today,
                'hits' => 1
            ]);
        }
    }

    public function get_total_visitors()
    {
        $this->db->select_sum('hits');
        $query = $this->db->get('visitor_counter');
        return $query->row()->hits;
    }
}
