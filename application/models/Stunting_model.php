<?php
class Stunting_model extends CI_Model
{

    public function get_stunting_data()
    {
        // Ambil data terkini berdasarkan created_at
        $query = $this->db->query("
			SELECT region_name, total_balita, stunting_pendek, stunting_sangat_pendek, prevalensi 
			FROM stunting_data 
			WHERE created_at = (SELECT MAX(created_at) FROM stunting_data)
		");
        return $query->result();
    }

    public function get_latest_sigizi_data()
    {
        // Ambil data terkini berdasarkan created_at
        $query = $this->db->query("
            SELECT 
                sasaran_balita,
                jumlah_balita_diukur,
                jumlah_balita_ditemukan,
                persentase_balita_diukur,
                jumlah_balita_t,
                jumlah_balita_bb_kurang,
                jumlah_balita_gizi_buruk,
                jumlah_balita_stunting,
                jumlah_balita_gizi_kurang,
                jumlah_balita_t_mendapat_mt,
                jumlah_balita_bb_kurang_mendapat_mt,
                jumlah_balita_gizi_buruk_dirujuk_rs,
                jumlah_balita_stunting_dirujuk,
                jumlah_balita_gizi_kurang_mendapat_mt,
                jumlah_balita_gizi_buruk_tatalaksana
            FROM data_sigizi 
            WHERE created_at = (SELECT MAX(created_at) FROM data_sigizi)
        ");
        return $query->result();
    }

    public function get_monthly_data()
    {
        $query = $this->db->query("
            SELECT 
                MONTH(created_at) AS month, 
                SUM(total_balita) AS total_balita, 
                SUM(stunting_pendek) AS stunting_pendek 
            FROM 
                stunting_data 
            WHERE 
                created_at BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND LAST_DAY(NOW() + INTERVAL 1 YEAR)
            GROUP BY 
                MONTH(created_at);
        ");
        return $query->result();
    }

    public function get_monthly_sigizi_data()
    {
        // Subquery untuk mendapatkan created_at terakhir setiap bulan dan tahun
        $subquery = $this->db->select('MAX(created_at) as latest_date')
            ->from('data_sigizi')
            ->group_by(['YEAR(created_at)', 'MONTH(created_at)'])
            ->get_compiled_select();

        // Query utama untuk mengambil data berdasarkan tanggal terakhir setiap bulan dan tahun
        $this->db->select('
            YEAR(ds.created_at) as year, 
            MONTH(ds.created_at) as month, 
            ds.sasaran_balita, 
            ds.jumlah_balita_diukur, 
            ds.jumlah_balita_ditemukan, 
            ds.jumlah_balita_t, 
            ds.jumlah_balita_bb_kurang, 
            ds.jumlah_balita_gizi_buruk, 
            ds.jumlah_balita_stunting, 
            ds.jumlah_balita_gizi_kurang, 
            ds.jumlah_balita_t_mendapat_mt, 
            ds.jumlah_balita_bb_kurang_mendapat_mt, 
            ds.jumlah_balita_gizi_buruk_dirujuk_rs, 
            ds.jumlah_balita_stunting_dirujuk, 
            ds.jumlah_balita_gizi_kurang_mendapat_mt, 
            ds.jumlah_balita_gizi_buruk_tatalaksana,
            ds.jumlah_posyandu_eppgbm,
            ds.persentase_antropometri_standar,
            ds.persentase_alat_antropometri_terkalibrasi,
            ds.jumlah_kader_microsite
        ');
        $this->db->from('data_sigizi ds');
        $this->db->join("($subquery) latest_data", 'ds.created_at = latest_data.latest_date', 'inner');
        $this->db->group_by(['YEAR(ds.created_at)', 'MONTH(ds.created_at)']);

        $query = $this->db->get();
        return $query->result(); // Mengembalikan data bulan dan tahun
    }


}
