<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama'))
            redirect('welcome/index');
        $this->load->model('main_model');
        $this->load->model('Api_model');
    }

    public function index()
    {
        if ($this->session->userdata('role') == '1') {
            $this->load->view('assets/atas');
            $this->load->view('assets/index');
            $this->load->view('assets/bawah');
        }
    }



    public function video()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Video';
            $this->load->view('assets/atas');
            $this->load->view('assets/video', $data);
            $this->load->view('assets/bawah');
        }
    }
    public function addvideo()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Video';
            $this->load->view('assets/atas');
            $this->load->view('assets/addvideo', $data);
            $this->load->view('assets/bawah');
        }
    }


    public function savevideo()
    {
        $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
        $link_video = htmlspecialchars($_POST['link_video'], ENT_QUOTES);
        if ($this->db->query("insert into video values('','$judul','$link_video','')")) {
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/video', 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/video', 'refresh');
        }
    }

    public function editvideo($id = '')
    {
        $data = array(
            'id' => $id,
            'title' => 'Edit Video : '
        );
        $this->load->view('assets/atas');
        $this->load->view('assets/editvideo', $data);
        $this->load->view('assets/bawah');
    }

    public function updatevideo($id)
    {

        $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
        $link_video = htmlspecialchars($_POST['link_video'], ENT_QUOTES);
        $this->db->query("UPDATE video SET judul='$judul', link_video='$link_video' WHERE id_video='$id'");
        $this->session->set_flashdata('msg', 'info');
        redirect("admin/video/$id");
    }

    public function hapusvideo($id = '')
    {
        $this->db->query("delete from video where id_video='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/video', 'refresh');
    }

    public function instagram_post()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Manajemen Instagram Post';
            $this->load->view('assets/atas');
            $this->load->view('assets/instagram_post', $data);
            $this->load->view('assets/bawah');
        }
    }
    public function addig()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Postingan IG';
            $this->load->view('assets/atas');
            $this->load->view('assets/addig', $data);
            $this->load->view('assets/bawah');
        }
    }


    public function saveig()
    {
        $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
        $link_ig = htmlspecialchars($_POST['link_ig'], ENT_QUOTES);
        if ($this->db->query("insert into instagram_post values('','$judul','$link_ig','')")) {
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/instagram_post', 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/instagram_post', 'refresh');
        }
    }

    public function editig($id = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data = array(
                'id' => $id,
                'title' => 'Edit Instagram Post : '
            );
            $this->load->view('assets/atas');
            $this->load->view('assets/editig', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function update_ig($id)
    {

        $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
        $link_ig = htmlspecialchars($_POST['link_ig'], ENT_QUOTES);
        $this->db->query("UPDATE instagram_post SET judul='$judul', link_ig='$link_ig' WHERE id_post='$id'");
        $this->session->set_flashdata('msg', 'info');
        redirect("admin/instagram_post/$id");
    }

    public function hapusig($id = '')
    {
        $this->db->query("delete from instagram_post where id_post='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/instagram_post', 'refresh');
    }

    public function importsigizi()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Data Sigizi';
            $this->load->view('assets/atas');
            $this->load->view('assets/importsigizi', $data);
            $this->load->view('assets/bawah');
        }
    }
    public function saveimportsigizi()
    {
        if (isset($_FILES['csv_file']['name'])) {
            $file = fopen($_FILES['csv_file']['tmp_name'], 'r');

            // Lewati header CSV
            fgetcsv($file);

            // Loop setiap baris CSV dan simpan ke database
            while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
                $data = [
                    'sasaran_balita' => $row[1],
                    'jumlah_balita_diukur' => $row[2],
                    'jumlah_balita_ditemukan' => $row[3],
                    'persentase_balita_diukur' => $row[4],
                    'jumlah_balita_t' => $row[5],
                    'jumlah_balita_bb_kurang' => $row[6],
                    'jumlah_balita_gizi_buruk' => $row[7],
                    'jumlah_balita_stunting' => $row[8],
                    'jumlah_balita_gizi_kurang' => $row[9],
                    'jumlah_balita_t_mendapat_mt' => $row[10],
                    'jumlah_balita_bb_kurang_mendapat_mt' => $row[11],
                    'jumlah_balita_gizi_buruk_dirujuk_rs' => $row[12],
                    'jumlah_balita_stunting_dirujuk' => $row[13],
                    'jumlah_balita_gizi_kurang_mendapat_mt' => $row[14],
                    'jumlah_balita_gizi_buruk_tatalaksana' => $row[15],
                    'provinsi' => $row[16],
                    'kabupaten_kota' => $row[17],
                    'jumlah_posyandu' => $row[18],
                    'ketersediaan_alat_antropometri' => $row[19],
                    'alat_antropometri_terkalibrasi' => $row[20],
                    'kader_terampil_antropometri' => $row[21],
                    'jumlah_posyandu_eppgbm' => $row[22],
                    'persentase_antropometri_standar' => $row[23],
                    'persentase_alat_antropometri_terkalibrasi' => $row[24],
                    'jumlah_kader_microsite' => $row[25],
                ];

                // Insert data ke database
                $this->db->insert('data_sigizi', $data);
            }

            fclose($file);

            // Set flashdata dan redirect jika berhasil
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/sigizi', 'refresh');
        } else {
            // Set flashdata dan redirect jika gagal
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/sigizi', 'refresh');
        }
    }

    public function sigizi()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data Sigizi';
            $data['sigizi_data'] = $this->db->get('data_sigizi')->result(); // Ambil data dari tabel
            $this->load->view('assets/atas');
            $this->load->view('assets/sigizi', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addsigizi()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Data Sigizi';
            $this->load->view('assets/atas');
            $this->load->view('assets/addsigizi', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function savesigizi()
    {
        // Sanitasi input
        $data = array(
            'sasaran_balita' => htmlspecialchars($this->input->post('sasaran_balita', true), ENT_QUOTES), // String input
            'jumlah_balita_diukur' => (int) $this->input->post('jumlah_balita_diukur', true), // Numeric input, cast to int
            'jumlah_balita_ditemukan' => (int) $this->input->post('jumlah_balita_ditemukan', true), // Numeric input, cast to int
            'persentase_balita_diukur' => (float) $this->input->post('persentase_balita_diukur', true), // Numeric input, cast to float
            'jumlah_balita_t' => (int) $this->input->post('jumlah_balita_t', true), // Numeric input, cast to int

            'jumlah_balita_bb_kurang' => (int) $this->input->post('jumlah_balita_bb_kurang', true), // Numeric input, cast to int
            'jumlah_balita_gizi_buruk' => (int) $this->input->post('jumlah_balita_gizi_buruk', true), // Numeric input, cast to int
            'jumlah_balita_stunting' => (int) $this->input->post('jumlah_balita_stunting', true), // Numeric input, cast to int
            'jumlah_balita_gizi_kurang' => (int) $this->input->post('jumlah_balita_gizi_kurang', true), // Numeric input, cast to int
            'jumlah_balita_t_mendapat_mt' => (int) $this->input->post('jumlah_balita_t_mendapat_mt', true), // Numeric input, cast to int
            'jumlah_balita_bb_kurang_mendapat_mt' => (int) $this->input->post('jumlah_balita_bb_kurang_mendapat_mt', true), // Numeric input, cast to int
            'jumlah_balita_gizi_buruk_dirujuk_rs' => (int) $this->input->post('jumlah_balita_gizi_buruk_dirujuk_rs', true), // Numeric input, cast to int
            'jumlah_balita_stunting_dirujuk' => (int) $this->input->post('jumlah_balita_stunting_dirujuk', true), // Numeric input, cast to int
            'jumlah_balita_gizi_kurang_mendapat_mt' => (int) $this->input->post('jumlah_balita_gizi_kurang_mendapat_mt', true), // Numeric input, cast to int
            'jumlah_balita_gizi_buruk_tatalaksana' => (int) $this->input->post('jumlah_balita_gizi_buruk_tatalaksana', true), // Numeric input, cast to int
            'provinsi' => htmlspecialchars($this->input->post('provinsi', true), ENT_QUOTES), // String input
            'kabupaten_kota' => htmlspecialchars($this->input->post('kabupaten_kota', true), ENT_QUOTES), // String input
            'jumlah_posyandu' => (int) $this->input->post('jumlah_posyandu', true), // Numeric input, cast to int
            'ketersediaan_alat_antropometri' => htmlspecialchars($this->input->post('ketersediaan_alat_antropometri', true), ENT_QUOTES), // String input
            'alat_antropometri_terkalibrasi' => htmlspecialchars($this->input->post('alat_antropometri_terkalibrasi', true), ENT_QUOTES), // String input
            'kader_terampil_antropometri' => htmlspecialchars($this->input->post('kader_terampil_antropometri', true), ENT_QUOTES), // String input
            'jumlah_posyandu_eppgbm' => (int) $this->input->post('jumlah_posyandu_eppgbm', true), // Numeric input, cast to int
            'persentase_antropometri_standar' => (float) $this->input->post('persentase_antropometri_standar', true), // Numeric input, cast to float
            'persentase_alat_antropometri_terkalibrasi' => (float) $this->input->post('persentase_alat_antropometri_terkalibrasi', true), // Numeric input, cast to float
            'jumlah_kader_microsite' => (int) $this->input->post('jumlah_kader_microsite', true) // Numeric input, cast to int
        );

        if ($this->db->insert('data_sigizi', $data)) {
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/sigizi', 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/sigizi', 'refresh');
        }
    }

    public function editsigizi($id = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data = array(
                'id' => $id,
                'title' => 'Edit Data Si Gizi '
            );
            $this->load->view('assets/atas');
            $this->load->view('assets/editsigizi', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function updatesigizi($id)
    {
        // Sanitasi input
        $data = array(
            'sasaran_balita' => htmlspecialchars($this->input->post('sasaran_balita', true), ENT_QUOTES), // String input
            'jumlah_balita_diukur' => (int) $this->input->post('jumlah_balita_diukur', true), // Numeric input, cast to int
            'jumlah_balita_ditemukan' => (int) $this->input->post('jumlah_balita_ditemukan', true), // Numeric input, cast to int
            'persentase_balita_diukur' => (float) $this->input->post('persentase_balita_diukur', true), // Numeric input, cast to float
            'jumlah_balita_t' => (int) $this->input->post('jumlah_balita_t', true), // Numeric input, cast to int

            'jumlah_balita_bb_kurang' => (int) $this->input->post('jumlah_balita_bb_kurang', true), // Numeric input, cast to int
            'jumlah_balita_gizi_buruk' => (int) $this->input->post('jumlah_balita_gizi_buruk', true), // Numeric input, cast to int
            'jumlah_balita_stunting' => (int) $this->input->post('jumlah_balita_stunting', true), // Numeric input, cast to int
            'jumlah_balita_gizi_kurang' => (int) $this->input->post('jumlah_balita_gizi_kurang', true), // Numeric input, cast to int
            'jumlah_balita_t_mendapat_mt' => (int) $this->input->post('jumlah_balita_t_mendapat_mt', true), // Numeric input, cast to int
            'jumlah_balita_bb_kurang_mendapat_mt' => (int) $this->input->post('jumlah_balita_bb_kurang_mendapat_mt', true), // Numeric input, cast to int
            'jumlah_balita_gizi_buruk_dirujuk_rs' => (int) $this->input->post('jumlah_balita_gizi_buruk_dirujuk_rs', true), // Numeric input, cast to int
            'jumlah_balita_stunting_dirujuk' => (int) $this->input->post('jumlah_balita_stunting_dirujuk', true), // Numeric input, cast to int
            'jumlah_balita_gizi_kurang_mendapat_mt' => (int) $this->input->post('jumlah_balita_gizi_kurang_mendapat_mt', true), // Numeric input, cast to int
            'jumlah_balita_gizi_buruk_tatalaksana' => (int) $this->input->post('jumlah_balita_gizi_buruk_tatalaksana', true), // Numeric input, cast to int
            'provinsi' => htmlspecialchars($this->input->post('provinsi', true), ENT_QUOTES), // String input
            'kabupaten_kota' => htmlspecialchars($this->input->post('kabupaten_kota', true), ENT_QUOTES), // String input
            'jumlah_posyandu' => (int) $this->input->post('jumlah_posyandu', true), // Numeric input, cast to int
            'ketersediaan_alat_antropometri' => htmlspecialchars($this->input->post('ketersediaan_alat_antropometri', true), ENT_QUOTES), // String input
            'alat_antropometri_terkalibrasi' => htmlspecialchars($this->input->post('alat_antropometri_terkalibrasi', true), ENT_QUOTES), // String input
            'kader_terampil_antropometri' => htmlspecialchars($this->input->post('kader_terampil_antropometri', true), ENT_QUOTES), // String input
            'jumlah_posyandu_eppgbm' => (int) $this->input->post('jumlah_posyandu_eppgbm', true), // Numeric input, cast to int
            'persentase_antropometri_standar' => (float) $this->input->post('persentase_antropometri_standar', true), // Numeric input, cast to float
            'persentase_alat_antropometri_terkalibrasi' => (float) $this->input->post('persentase_alat_antropometri_terkalibrasi', true), // Numeric input, cast to float
            'jumlah_kader_microsite' => (int) $this->input->post('jumlah_kader_microsite', true) // Numeric input, cast to int
        );

        $this->db->where('id', $id);
        if ($this->db->update('data_sigizi', $data)) {
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/sigizi', 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/sigizi', 'refresh');
        }
    }

    public function deletesigizi($id)
    {
        if ($this->session->userdata('role') == '1') {
            if ($this->db->delete('data_sigizi', array('id' => $id))) {
                $this->session->set_flashdata('msg', 'success');
            } else {
                $this->session->set_flashdata('msg', 'error');
            }
            redirect('admin/sigizi', 'refresh');
        }
    }





    public function kemendagri()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data Stunting Kemendagri';
            $this->load->view('assets/atas');
            $this->load->view('assets/kemendagri', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addkemendagri()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Data Stunting Kemendagri';
            $this->load->view('assets/atas');
            $this->load->view('assets/addkemendagri', $data);
            $this->load->view('assets/bawah');
        }
    }
    public function editkemendagri($id = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data = array(
                'id' => $id,
                'title' => 'Edit Data Stunting Kemendagri '
            );
            $this->load->view('assets/atas');
            $this->load->view('assets/editkemendagri', $data);
            $this->load->view('assets/bawah');
        }
    }


    public function savekemendagri()
    {
        // Ambil data dari POST dan lakukan sanitasi
        $lokasi = htmlspecialchars($this->input->post('lokasi', true), ENT_QUOTES);
        $totalbalita = (int) $this->input->post('totalbalita', true);
        $stuntingpendek = (int) $this->input->post('stuntingpendek', true);
        $stuntingsangatpendek = (int) $this->input->post('stuntingsangatpendek', true);
        $prevalensi = (float) $this->input->post('prevalensi', true);

        // Validasi agar angka yang diinput benar (numeric validation)
        if (is_numeric($totalbalita) && is_numeric($stuntingpendek) && is_numeric($stuntingsangatpendek) && is_numeric($prevalensi)) {

            // Persiapkan data untuk dimasukkan ke database menggunakan query builder (aman dari SQL Injection)
            $data = array(
                'region_name' => $lokasi,
                'total_balita' => $totalbalita,
                'stunting_pendek' => $stuntingpendek,
                'stunting_sangat_pendek' => $stuntingsangatpendek,
                'prevalensi' => $prevalensi,
                'created_at' => date('Y-m-d H:i:s') // Menggunakan fungsi PHP untuk waktu sekarang
            );

            // Masukkan data ke dalam tabel kemendagri
            if ($this->db->insert('stunting_data', $data)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('admin/kemendagri', 'refresh');
            } else {
                $this->session->set_flashdata('msg', 'error');
                redirect('admin/kemendagri', 'refresh');
            }

        } else {
            // Jika input tidak valid
            $this->session->set_flashdata('msg', 'invalid-input');
            redirect('admin/kemendagri', 'refresh');
        }
    }

    public function updatekemendagri($id)
    {
        // Sanitasi input
        $lokasi = htmlspecialchars($this->input->post('lokasi', true), ENT_QUOTES);
        $totalbalita = (int) $this->input->post('totalbalita', true);
        $stuntingpendek = (int) $this->input->post('stuntingpendek', true);
        $stuntingsangatpendek = (int) $this->input->post('stuntingsangatpendek', true);
        $prevalensi = (float) $this->input->post('prevalensi', true);

        // Query untuk update data di tabel stunting_data
        $this->db->query("
				UPDATE stunting_data 
				SET 
					region_name = '$lokasi',
					total_balita = '$totalbalita',
					stunting_pendek = '$stuntingpendek',
					stunting_sangat_pendek = '$stuntingsangatpendek',
					prevalensi = '$prevalensi'
				WHERE id = '$id'
			");

        // Set pesan flashdata dan redirect
        $this->session->set_flashdata('msg', 'info');
        redirect('admin/kemendagri', 'refresh');
    }


    public function hapuskemendagri($id = '')
    {
        $this->db->query("delete from stunting_data where id='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/kemendagri', 'refresh');
    }

    public function kategori()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Kategori';
            $this->load->view('assets/atas');
            $this->load->view('assets/kategori', $data);
            $this->load->view('assets/bawah');
        }
    }
    public function addkategori()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Kategori';
            $this->load->view('assets/atas');
            $this->load->view('assets/addkategori', $data);
            $this->load->view('assets/bawah');
        }
    }


    public function savekategori()
    {
        $a = htmlspecialchars($_POST['a'], ENT_QUOTES);
        if ($this->db->query("insert into kategori values('','$a')")) {
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/kategori', 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/kategori', 'refresh');
        }
    }

    public function editkategori($id = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data = array(
                'id' => $id,
                'title' => 'Ubah Jabatan : '
            );
            $this->load->view('assets/atas');
            $this->load->view('assets/ubahkategori', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function updatekategori($id)
    {

        $tmp = htmlspecialchars($_POST['tmp'], ENT_QUOTES);
        $this->db->query("UPDATE kategori SET nmkat='$tmp' WHERE idkat='$id'");
        $this->session->set_flashdata('msg', 'info');
        redirect("admin/kategori/$id");
    }

    public function hapuskategori($id = '')
    {
        $this->db->query("delete from kategori where idkat='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/kategori', 'refresh');
    }

    public function berita()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Berita';
            $this->load->view('assets/atas');
            $this->load->view('assets/berita', $data);
            $this->load->view('assets/bawah');
        }
    }
    public function addberita()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Berita';
            $this->load->view('assets/atas');
            $this->load->view('assets/addberita', $data);
            $this->load->view('assets/bawah');
        }
    }


    public function editberita($id = '')
    {
        if ($this->session->userdata('role') == '1') {
            // Fetch the selected category ID for the given record ID
            $this->db->select('idkat');
            $this->db->from('berita'); // Make sure to replace 'berita' with your actual table name
            $this->db->where('id_berita', $id); // Replace 'id' with the correct column name
            $query = $this->db->get();
            $current_record = $query->row();
            $selected_kat = $current_record ? $current_record->idkat : '';

            // Fetch all categories
            $categories_query = $this->db->get('kategori');

            // Prepare data for the view
            $data['id'] = $id;
            $data['title'] = 'Edit Berita';
            $data['selected_kat'] = $selected_kat;
            $data['categories'] = $categories_query->result();

            $this->load->view('assets/atas');
            $this->load->view('assets/editberita', $data);
            $this->load->view('assets/bawah');
        }
    }


    public function saveberita()
    {
        $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
        $user = $this->session->userdata('id');
        $keyword = htmlspecialchars($_POST['keyword'], ENT_QUOTES);
        $isi = htmlspecialchars($_POST['isi'], ENT_QUOTES);
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];
        $kat = $_POST['kat'];

        // Upload images
        $gambar_fields = ['gambar', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];
        $gambar_paths = [];

        foreach ($gambar_fields as $field) {
            $gambar_paths[$field] = $this->upload_gambar($field);
        }

        // Insert into berita
        $this->db->query(
            "INSERT INTO berita VALUES ('', '$judul', '$user', '{$gambar_paths['gambar']}', '{$gambar_paths['gambar2']}', '{$gambar_paths['gambar3']}', '{$gambar_paths['gambar4']}', '{$gambar_paths['gambar5']}', '$keyword', '$isi', '$tanggal', '$status', '$kat')"
        );

        // Insert into galeri
        foreach ($gambar_paths as $gambar) {
            $this->insert_galeri($judul, $gambar, $status, $tanggal);
        }

        $this->session->set_flashdata('msg', 'success');
        redirect('admin/berita', 'refresh');
    }

    public function upload_gambar($field_name)
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5000000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field_name)) {
            return '';
        } else {
            $gbr = $this->upload->data();
            // Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './gambar/' . $gbr['file_name'];
            $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '80%';
            $config['width'] = 710;
            $config['height'] = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $gbr['file_name'];
        }
    }

    public function insert_galeri($judul, $gambar, $status, $tanggal)
    {
        if ($gambar != '') {
            $this->db->query("INSERT INTO galeri VALUES ('', '$judul', '$gambar', '$status', '$tanggal')");
        }
    }


    public function hapusberita($id = '')
    {
        $wo = $this->db->query("select * from berita where id_berita='$id'");
        $row = $wo->row();
        $path_part = pathinfo("./gambar/$row->gambar");
        $lok = $path_part['filename'];
        $s = $lok . "_thumb.jpg";
        unlink('./gambar/' . $row->gambar);
        unlink('./gambar/' . $row->gambar2);
        unlink('./gambar/' . $row->gambar3);
        unlink('./gambar/' . $row->gambar4);
        unlink('./gambar/' . $row->gambar5);

        unlink('./gambar/thumb/' . $s);
        $this->db->query("delete from berita where id_berita='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/berita');
    }


    public function updateberita($id = '')
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '500000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
            $user = $this->session->userdata('id');
            $gambar = $this->upload_gambar1();
            $gambar2 = $this->upload_gambar2();
            $gambar3 = $this->upload_gambar3();
            $gambar4 = $this->upload_gambar4();
            $gambar5 = $this->upload_gambar5();

            $keyword = htmlspecialchars($_POST['keyword'], ENT_QUOTES);
            $isi = htmlentities($_POST['isi'], ENT_QUOTES);
            $tanggal = $_POST['tanggal'];
            $status = $_POST['status'];
            $kat = $_POST['kat'];

            $wo = $this->db->query("select * from berita where id_berita='$id'");
            $row = $wo->row();
            $id = $row->id_berita;
            $path_part = pathinfo("./gambar/" . $row->gambar);
            $path_part = pathinfo("./gambar/" . $row->gambar2);
            $path_part = pathinfo("./gambar/" . $row->gambar3);
            $path_part = pathinfo("./gambar/" . $row->gambar4);
            $path_part = pathinfo("./gambar/" . $row->gambar5);

            $lok = $path_part['filename'];
            $s = $lok . "_thumb.jpg";
            unlink('./gambar/' . $row->gambar);
            unlink('./gambar/' . $row->gambar2);
            unlink('./gambar/' . $row->gambar3);
            unlink('./gambar/' . $row->gambar4);
            unlink('./gambar/' . $row->gambar5);
            unlink('./gambar/thumb/' . $s);
            $this->db->query("update berita set judul='$judul',gambar='$gambar',gambar2='$gambar2',gambar3='$gambar3',gambar4='$gambar4',gambar5='$gambar5',keyword='$keyword',tanggal_post='$tanggal',isi='$isi',status_berita='$status',idkat='$kat' where id_berita='$id' ");
            $this->session->set_flashdata('msg', 'info');
            redirect('admin/berita');



        } else {
            $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
            $keyword = htmlspecialchars($_POST['keyword'], ENT_QUOTES);
            $tanggal = $_POST['tanggal'];
            $isi = htmlentities($_POST['isi'], ENT_QUOTES);
            $status = $_POST['status'];
            $kat = $_POST['kat'];
            $this->db->query("update berita set judul='$judul',keyword='$keyword',tanggal_post='$tanggal',isi='$isi',status_berita='$status',idkat='$kat' where id_berita='$id' ");
            $this->session->set_flashdata('msg', 'info');
            redirect('admin/berita');
        }
    }

    public function struktural()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data Struktural';
            $this->load->view('assets/atas');
            $this->load->view('assets/struktural', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addstruktural()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Pegawai';
            $this->load->view('assets/atas');
            $this->load->view('assets/addstruktural', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function editstruktural($idstruktural = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data['idstruktural'] = $idstruktural;
            $data['title'] = 'Edit struktural';
            $this->load->view('assets/atas');
            $this->load->view('assets/editstruktural', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function savestruktural()
    {

        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '500000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/struktural', 'refresh');
        } else {

            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './gambar/' . $gbr['file_name'];
            $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '60%';
            $config['width'] = 710;
            $config['height'] = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $nip = htmlspecialchars($_POST['nip'], ENT_QUOTES);
            $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
            $jk = $_POST['jk'];
            $tempatlahir = htmlspecialchars($_POST['tempatlahir'], ENT_QUOTES);
            $tanggal = $_POST['tanggal'];
            $idjabatan = $_POST['idjabatan'];
            $pendakhir = $_POST['pendakhir'];
            $gol = htmlspecialchars($_POST['gol'], ENT_QUOTES);
            $gambar = $gbr['file_name'];
            $this->db->query("insert into struktural values('','$nip','$nama','$jk','$tempatlahir','$tanggal','$idjabatan','$pendakhir','$gol','$gambar')");
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/struktural', 'refresh');
        }
    }

    public function updatestruktural($id = '')
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '500000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('msg', 'error');
                redirect('main/blog');
            } else {
                $gbr = $this->upload->data();
                $nip = htmlspecialchars($_POST['nip'], ENT_QUOTES);
                $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
                $jk = $_POST['jk'];
                $tempatlahir = htmlspecialchars($_POST['tempatlahir'], ENT_QUOTES);
                $tanggal = $_POST['tanggal'];
                $idjabatan = $_POST['idjabatan'];
                $pendakhir = $_POST['pendakhir'];
                $gol = htmlspecialchars($_POST['gol'], ENT_QUOTES);
                $gambar = $gbr['file_name'];
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $gbr['file_name'];
                $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '50%';
                $config['width'] = 710;
                $config['height'] = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $wo = $this->db->query("select * from struktural where id_struktural='$id'");
                $row = $wo->row();
                $id = $row->id_struktural;
                $path_part = pathinfo("./gambar/" . $row->foto);
                $lok = $path_part['filename'];
                $s = $lok . "_thumb.jpg";
                unlink('./gambar/' . $row->foto);
                unlink('./gambar/thumb/' . $s);
                $this->db->query("update struktural set nip='$nip',nama='$nama',jk='$jk',tempat_lahir='$tempatlahir',tanggal_lahir='$tanggal',id_jabatan='$idjabatan',pendakhir='$pendakhir',gol='$gol',foto='$gambar' where id_struktural='$id'");
                $this->session->set_flashdata('msg', 'info');
                redirect('admin/struktural');
            }
        } else {
            $nip = htmlspecialchars($_POST['nip'], ENT_QUOTES);
            $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
            $jk = $_POST['jk'];
            $tempatlahir = htmlspecialchars($_POST['tempatlahir'], ENT_QUOTES);
            $tanggal = $_POST['tanggal'];
            $idjabatan = $_POST['idjabatan'];
            $pendakhir = $_POST['pendakhir'];
            $gol = htmlspecialchars($_POST['gol'], ENT_QUOTES);
            $this->db->query("update struktural set nip='$nip',nama='$nama',jk='$jk',tempat_lahir='$tempatlahir',tanggal_lahir='$tanggal',id_jabatan='$idjabatan',pendakhir='$pendakhir',gol='$gol' where id_struktural='$id'");
            $this->session->set_flashdata('msg', 'info');
            redirect('admin/struktural');
        }
    }

    public function hapusstruktural($id = '')
    {
        $wo = $this->db->query("select * from struktural where id_struktural='$id'");
        $row = $wo->row();
        $path_part = pathinfo("./gambar/$row->foto");
        $lok = $path_part['filename'];
        $s = $lok . "_thumb.jpg";
        unlink('./gambar/' . $row->foto);
        unlink('./gambar/thumb/' . $s);
        $this->db->query("delete from struktural where id_struktural='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/struktural');
    }

    public function datauser()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Manajemen Akun Pengguna';
            $this->load->view('assets/atas');
            $this->load->view('assets/datauser', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function adduser()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah User';
            $this->load->view('assets/atas');
            $this->load->view('assets/adduser', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function edituser($iduser = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data['iduser'] = $iduser;
            $data['title'] = 'Edit User';
            $this->load->view('assets/atas');
            $this->load->view('assets/edituser', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function saveuser()
    {

        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
        $password = htmlspecialchars(md5($_POST['password']), ENT_QUOTES);
        $level = htmlspecialchars($_POST['level'], ENT_QUOTES);
        $this->db->query("insert into user values('','$nama','$username','$password','$level')");
        $this->session->set_flashdata('msg', 'success');
        redirect('admin/datauser', 'refresh');

    }

    public function updateuser($iduser)
    {

        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $level = htmlspecialchars($_POST['level'], ENT_QUOTES);
        if (empty($password)) {
            $this->db->query("UPDATE user SET nama='$nama', username='$username', level='$level' WHERE id_user='$iduser'");
            $this->session->set_flashdata('msg', 'info');
        } else {
            $password = md5($password);
            $this->db->query("UPDATE user SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$iduser'");
            $this->session->set_flashdata('msg', 'info');
        }
        redirect("admin/datauser");
    }


    public function hapususer($id = '')
    {

        $this->db->query("delete from user where id_user='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/datauser', 'refresh');

    }



    public function jabatan()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data Jabatan';
            $this->load->view('assets/atas');
            $this->load->view('assets/jabatan', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addjabatan()
    {
        $data['title'] = 'Tambah Jabatan';
        $this->load->view('assets/atas');
        $this->load->view('assets/addjabatan', $data);
        $this->load->view('assets/bawah');
    }


    public function savejabatan()
    {
        $a = $_POST['a'];
        if ($this->db->query("insert into jabatan values('','$a')")) {
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/jabatan', 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/jabatan', 'refresh');
        }
    }

    public function editjabatan($id = '')
    {
        $data = array(
            'id' => $id,
            'title' => 'Ubah Jabatan : '
        );
        $this->load->view('assets/atas');
        $this->load->view('assets/ubahjabatan', $data);
        $this->load->view('assets/bawah');
    }

    public function updatejabatan($id)
    {

        $tmp = $_POST['tmp'];
        $this->db->query("UPDATE jabatan SET namajabatan='$tmp' WHERE id_jabatan='$id'");
        $this->session->set_flashdata('msg', 'info');
        redirect("admin/editjabatan/$id");
    }

    public function hapusjabatan($id = '')
    {
        $this->db->query("delete from jabatan where id_jabatan='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/jabatan', 'refresh');
    }


    public function slider()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data Slider (Ukuran Gambar Wajib 2000 x 793 pixel, tipe file jpg atau jpeg)';
            $this->load->view('assets/atas');
            $this->load->view('assets/slider', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addslider()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Slider';
            $this->load->view('assets/atas');
            $this->load->view('assets/addslider', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function editslider($id_slider = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data['id_slider'] = $id_slider;
            $data['title'] = 'Edit Slider';
            $this->load->view('assets/atas');
            $this->load->view('assets/editslider', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function saveslider()
    {

        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size'] = '50000000';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/slider', 'refresh');
        } else {

            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './gambar/' . $gbr['file_name'];
            $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '100%';
            $config['width'] = 2000;
            $config['height'] = 783;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $gbr['file_name'];
            $this->db->query("insert into slider values('','$gambar')");
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/slider', 'refresh');
        }
    }


    public function updateslider($id = '')
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size'] = '500000';
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('msg', 'error');
                redirect('admin/slider');
            } else {

                $gbr = $this->upload->data();
                $gambar = $gbr['file_name'];
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $gbr['file_name'];
                $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 2000;
                $config['height'] = 783;
                $config['overwrite'] = TRUE;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $wo = $this->db->query("select * from slider where id_slider='$id'");
                $row = $wo->row();
                $id = $row->id_slider;
                $path_part = pathinfo("./gambar/" . $row->foto);
                $lok = $path_part['filename'];
                $s = $lok . "_thumb.jpg";
                unlink('./gambar/' . $row->foto);
                unlink('./gambar/thumb/' . $s);
                $this->db->query("update slider set foto='$gambar' where id_slider='$id'");
                $this->session->set_flashdata('msg', 'info');
                redirect('admin/slider');
            }
        }
    }

    public function hapusslider($id = '')
    {
        $wo = $this->db->query("select * from slider where id_slider='$id'");
        $row = $wo->row();
        $path_part = pathinfo("./gambar/$row->foto");
        $lok = $path_part['filename'];
        $s = $lok . "_thumb.jpg";
        unlink('./gambar/' . $row->foto);
        unlink('./gambar/thumb/' . $s);
        $this->db->query("delete from slider where id_slider='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/slider');
    }


    public function sambutan()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data Sambutan ';
            $this->load->view('assets/atas');
            $this->load->view('assets/sambutan', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addsambutan()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Sambutan';
            $this->load->view('assets/atas');
            $this->load->view('assets/addsambutan', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function editsambutan($id_sambutan = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data['id_sambutan'] = $id_sambutan;
            $data['title'] = 'Edit Sambutan';
            $this->load->view('assets/atas');
            $this->load->view('assets/editsambutan', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function savesambutan()
    {

        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size'] = '500000';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/sambutan', 'refresh');
        } else {

            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './gambar/' . $gbr['file_name'];
            $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '100%';
            $config['width'] = 2000;
            $config['height'] = 783;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
            $deskripsi = htmlspecialchars($_POST['deskripsi'], ENT_QUOTES);
            $gambar = $gbr['file_name'];
            $this->db->query("insert into sambutan values('','$judul','$deskripsi','$gambar')");
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/sambutan', 'refresh');
        }
    }

    public function updatesambutan($id = '')
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '500000';
        $this->load->library('upload', $config);

        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('msg', 'error');
                redirect('admin/sambutan');
            } else {
                $gbr = $this->upload->data();
                $gambar = $gbr['file_name'];
                $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
                $deskripsi = htmlspecialchars($_POST['deskripsi'], ENT_QUOTES);

                // Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $gbr['file_name'];
                $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 710;
                $config['height'] = 460;
                $config['overwrite'] = TRUE;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $wo = $this->db->query("select * from sambutan where id_sambutan='$id'");
                if ($wo->num_rows() > 0) {
                    $row = $wo->row();
                    if (!empty($row->gambar)) {
                        $path_part = pathinfo("./gambar/" . $row->gambar);
                        $lok = $path_part['filename'];
                        $s = $lok . "_thumb.jpg";

                        // Unlink previous files safely
                        if (file_exists('./gambar/' . $row->gambar)) {
                            unlink('./gambar/' . $row->gambar);
                        }

                        if (file_exists('./gambar/thumb/' . $s)) {
                            unlink('./gambar/thumb/' . $s);
                        }
                    }
                }

                $this->db->query("update sambutan set judul='$judul',deskripsi='$deskripsi',foto='$gambar' where id_sambutan='$id'");
                $this->session->set_flashdata('msg', 'info');
                redirect('admin/sambutan');
            }
        } else {
            $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
            $deskripsi = htmlspecialchars($_POST['deskripsi'], ENT_QUOTES);
            $this->db->query("update sambutan set judul='$judul',deskripsi='$deskripsi' where id_sambutan='$id'");
            $this->session->set_flashdata('msg', 'info');
            redirect('admin/sambutan');
        }
    }



    public function hapussambutan($id = '')
    {
        $wo = $this->db->query("select * from sambutan where id_sambutan='$id'");
        $row = $wo->row();
        $path_part = pathinfo("./gambar/$row->foto");
        $lok = $path_part['filename'];
        $s = $lok . "_thumb.jpg";
        unlink('./gambar/' . $row->foto);
        unlink('./gambar/thumb/' . $s);
        $this->db->query("delete from sambutan where id_sambutan='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/sambutan');
    }




    public function galeri()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Galeri';
            $this->load->view('assets/atas');
            $this->load->view('assets/galeri', $data);
            $this->load->view('assets/bawah');
        }
    }
    public function addgaleri()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Galeri';
            $this->load->view('assets/atas');
            $this->load->view('assets/addgaleri', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function editgaleri($id = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data['id'] = $id;
            $data['title'] = 'Galeri';
            $this->load->view('assets/atas');
            $this->load->view('assets/editgaleri', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function savegaleri()
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '500000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/galeri', 'refresh');
        } else {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './gambar/' . $gbr['file_name'];
            $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '100%';
            $config['width'] = 710;
            $config['height'] = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
            $gambar = htmlspecialchars($gbr['file_name'], ENT_QUOTES);
            $status = $_POST['status'];
            $tanggal = $_POST['tanggal'];
            $this->db->query("insert into galeri values('','$judul','$gambar','$status','$tanggal')");
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/galeri', 'refresh');
        }
    }

    public function updategaleri($id = '')
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '500000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('msg', 'error');
                redirect('admin/galeri');
            } else {
                $gbr = $this->upload->data();
                $judul = $_POST['judul'];
                // $gambar = $gbr['file_name'];
                $status = $_POST['status'];
                $tanggal = $_POST['tanggal'];
                $gambar = $gbr['file_name'];
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $gbr['file_name'];
                $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 710;
                $config['height'] = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $wo = $this->db->query("select * from galeri where id_galeri='$id'");
                $row = $wo->row();
                $id = $row->id_galeri;
                $path_part = pathinfo("./gambar/" . $row->gambar);
                $lok = $path_part['filename'];
                $s = $lok . "_thumb.jpg";
                unlink('./gambar/' . $row->gambar);
                unlink('./gambar/thumb/' . $s);
                $this->db->query("update galeri set judul='$judul',gambar='$gambar',tanggal='$tanggal',status='$status' where id_galeri='$id' ");
                $this->session->set_flashdata('msg', 'info');
                redirect('admin/galeri');
            }
        } else {
            $judul = htmlspecialchars(['judul'], ENT_QUOTES);
            $status = htmlspecialchars($_POST['status'], ENT_QUOTES);
            $tanggal = $_POST['tanggal'];
            $this->db->query("update galeri set judul='$judul',status='$status',tanggal='$tanggal' where id_galeri='$id' ");
            $this->session->set_flashdata('msg', 'info');
            redirect('admin/galeri');
        }
    }

    public function hapusgaleri($id = '')
    {
        $wo = $this->db->query("select * from galeri where id_galeri='$id'");
        $row = $wo->row();
        $path_part = pathinfo("./gambar/$row->gambar");
        $lok = $path_part['filename'];
        $s = $lok . "_thumb.jpg";
        unlink('./gambar/' . $row->gambar);
        unlink('./gambar/thumb/' . $s);
        $this->db->query("delete from galeri where id_galeri='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/galeri');
    }

    public function download()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Download';
            $this->load->view('assets/atas');
            $this->load->view('assets/download', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function adddownload()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Download';
            $this->load->view('assets/atas');
            $this->load->view('assets/adddownload', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function savedownload()
    {
        $config['upload_path'] = './file/';
        $config['allowed_types'] = 'xls|pdf|docx|doc|xlsx';
        $config['max_size'] = '5000000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/adddownload', 'refresh');
        } else {
            $file = $this->upload->data();
            $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
            $sd = $file['file_name'];
            $this->db->query("insert into download values('','$judul','$sd')");
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/download', 'refresh');
        }
    }

    public function hapusdownload($id)
    {
        $q = $this->db->query("select * from download where id_download='$id'");
        $row = $q->row();
        $this->db->query("delete from download where id_download='$id'");
        unlink('./file/' . $row->file);
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/download');
    }

    public function pengumuman()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Pengumuman';
            $this->load->view('assets/atas');
            $this->load->view('assets/pengumuman', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addpengumuman()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah Pengumuman';
            $this->load->view('assets/atas');
            $this->load->view('assets/addpengumuman', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function savepengumuman()
    {
        $config['upload_path'] = './file/';
        $config['allowed_types'] = 'xls|pdf|docx|doc|xlsx';
        $config['max_size'] = 100240;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('msg', 'error');
            redirect('admin/addpengumuman', 'refresh');
        } else {
            $file = $this->upload->data();
            $judul = $_POST['judul'];
            $sd = $file['file_name'];
            $this->db->query("insert into pengumuman values('','$judul','$sd')");
            $this->session->set_flashdata('msg', 'success');
            redirect('admin/pengumuman', 'refresh');
        }
    }

    public function updatepengumuman($id = '')
    {
        $config['upload_path'] = './file/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|xls|xlsx';
        $config['max_size'] = 100240;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('msg', 'error');
                redirect('admin/addpengumuman', 'refresh');
            } else {
                $gbr = $this->upload->data();
                $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
                $user = $this->session->userdata('id');
                // $gambar = $gbr['file_name'];
                //   $status = $_POST['status'];
                $gambar = $gbr['file_name'];
                //Compress Image
                //$config['image_library']    ='gd2';
                // $config['source_image']     ='./gambar/'.$gbr['file_name'];
                //   $config['new_image']        = './gambar/thumb/'.$gbr['file_name'];
                // $config['create_thumb']     = TRUE;
                //  $config['maintain_ratio']   = TRUE;
                //  $config['quality']          = '50%';
                //  $config['width']            = 710;
                //  $config['height']           = 460;
                //  $this->load->library('image_lib', $config);
                //  $this->image_lib->resize();

                $wo = $this->db->query("select * from pengumuman where id_pengumuman='$id'");
                $row = $wo->row();
                $id = $row->id_pengumuman;
                //  $path_part = pathinfo("./file/".$row->gambar);
                //      $lok = $path_part['filename'];
                //   $s = $lok."_thumb.jpg";
                //   unlink('./file/'.$row->gambar);
                //   unlink('./file/thumb/'.$s);
                $this->db->query("update pengumuman set judul='$judul',file='$gambar' where id_pengumuman='$id' ");
                $this->session->set_flashdata('msg', 'info');
                redirect('admin/pengumuman');
            }
        } else {
            $judul = htmlspecialchars($_POST['judul'], ENT_QUOTES);
            // $status = $_POST['status'];
            $this->db->query("update pengumuman set judul='$judul' where id_pengumuman='$id' ");
            $this->session->set_flashdata('msg', 'info');
            redirect('admin/pengumuman');
        }
    }

    public function editpengumuman($id = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data['id'] = $id;
            $data['title'] = 'Ubah Pengumuman ';
            $this->load->view('assets/atas');
            $this->load->view('assets/editpengumuman', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function hapuspengumuman($id)
    {
        $q = $this->db->query("select * from pengumuman where id_pengumuman='$id'");
        $row = $q->row();
        $this->db->query("delete from pengumuman where id_pengumuman='$id'");
        unlink('./file/' . $row->file);
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/pengumuman');
    }

    public function pesan()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Pesan Masuk';
            $this->load->view('assets/atas');
            $this->load->view('assets/pesan', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function hapuskomentar($id = '')
    {
        $this->db->query("delete from komentar where id_komentar='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/pesan', 'refresh');
    }

    public function datapengguna()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Manajemen Akun Pengguna';
            $this->load->view('assets/atas');
            $this->load->view('assets/datapengguna', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function addpengguna()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Tambah pengguna';
            $this->load->view('assets/atas');
            $this->load->view('assets/addpengguna', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function editpengguna($idpengguna = '')
    {
        if ($this->session->userdata('role') == '1') {
            $data['idpengguna'] = $idpengguna;
            $data['title'] = 'Edit pengguna';
            $this->load->view('assets/atas');
            $this->load->view('assets/editpengguna', $data);
            $this->load->view('assets/bawah');
        }
    }

    public function savepengguna()
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
        $config['max_size'] = '500000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('msg', 'error');
            redirect('home/pendaftaran', 'refresh');
        } else {

            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './gambar/' . $gbr['file_name'];
            $config['new_image'] = './gambar/thumb/' . $gbr['file_name'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '60%';
            $config['width'] = 710;
            $config['height'] = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
            $password = htmlspecialchars(md5($_POST['password']), ENT_QUOTES);
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
            $nohp = htmlspecialchars($_POST['nohp'], ENT_QUOTES);
            $gambar = $gbr['file_name'];
            $level = '2';
            $this->db->query("insert into pengguna values('','$nama','$username','$password','$email','$nohp','$gambar','$level','0')");
            $this->session->set_flashdata('msg', 'success');
            redirect('welcomeuser', 'refresh');
        }
    }

    public function updatepengguna($idpengguna)
    {

        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $level = htmlspecialchars($_POST['level'], ENT_QUOTES);
        if (empty($password)) {
            $this->db->query("UPDATE pengguna SET nama='$nama', username='$username', level='$level' WHERE id_pengguna='$idpengguna'");
            $this->session->set_flashdata('msg', 'info');
        } else {
            $password = md5($password);
            $this->db->query("UPDATE pengguna SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_pengguna='$idpengguna'");
            $this->session->set_flashdata('msg', 'info');
        }
        redirect("admin/datapengguna");
    }


    public function hapuspengguna($id = '')
    {

        $this->db->query("delete from pengguna where id_pengguna='$id'");
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/datapengguna', 'refresh');

    }

    //opsi approve pengguna//

    public function setuju3($id)
    {
        $this->db->query("update pengguna set status='1'where id_pengguna = $id ");
        redirect('admin/datapengguna');
    }

    public function tidaksetuju3($id)
    {
        $this->db->query("update pengguna set status='2'where id_pengguna = $id ");
        redirect('admin/datapengguna');
    }

    public function cancel3($id)
    {
        $this->db->query("update pengguna set status='0'where id_pengguna = $id ");
        redirect('admin/datapengguna');
    }

    // end approve pengguna


    public function permohonan()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data permohonan';
            $this->load->view('assets/atas');
            $this->load->view('assets/permohonan', $data);
            $this->load->view('assets/bawah');
        }
    }

    //opsi approve permohonan//

    public function setuju($id)
    {
        $this->db->query("update permohonan set status='1'where id_permohonan = $id ");
        redirect('admin/permohonan');
    }

    public function proses($id)
    {
        $this->db->query("update permohonan set status='2'where id_permohonan = $id ");
        redirect('admin/permohonan');
    }

    public function selesai($id)
    {
        $tanggal_admin = date('d-m-Y');
        $this->db->query("update permohonan set status='3' , tanggal_admin='" . $tanggal_admin . "' where id_permohonan = $id ");
        redirect('admin/permohonan');
    }

    public function tidaksetuju($id)
    {
        $this->db->query("update permohonan set status='4' where id_permohonan = $id ");
        redirect('admin/permohonan');
    }

    public function cancel($id)
    {
        $tanggal_admin = null;
        $this->db->query("update permohonan set status='0' , tanggal_admin='" . $tanggal_admin . "' where id_permohonan = $id ");
        redirect('admin/permohonan');
    }

    // end approve permohonan

    public function pengaduan()
    {
        if ($this->session->userdata('role') == '1') {
            $data['title'] = 'Data Laporan Gangguan';
            $this->load->view('assets/atas');
            $this->load->view('assets/pengaduan', $data);
            $this->load->view('assets/bawah');
        }
    }

    //opsi approve permohonan//

    public function setuju2($id)
    {
        $this->db->query("update pengaduan set status='1'where id_pengaduan = $id ");
        redirect('admin/pengaduan');
    }

    public function proses2($id)
    {
        $this->db->query("update pengaduan set status='2'where id_pengaduan = $id ");
        redirect('admin/pengaduan');
    }

    public function selesai2($id)
    {
        $tanggal_admin = date('d-m-Y');
        $this->db->query("update pengaduan set status='3' , tanggal_admin='" . $tanggal_admin . "' where id_pengaduan = $id ");
        redirect('admin/pengaduan');
    }

    public function tidaksetuju2($id)
    {
        $this->db->query("update pengaduan set status='4' where id_pengaduan = $id ");
        redirect('admin/pengaduan');
    }

    public function cancel2($id)
    {
        $tanggal_admin = null;
        $this->db->query("update pengaduan set status='0' , tanggal_admin='" . $tanggal_admin . "' where id_pengaduan = $id ");
        redirect('admin/pengaduan');
    }

    // In Admin.php controller
    public function resetNotificationCount()
    {
        // Update the database to set the notification count to 0
        $this->db->set('is_read', 1);
        $this->db->update('komentar'); // Adjust this query based on your database structure

        // Return a JSON response
        echo json_encode(['status' => 'success']);
    }

    public function getUnreadMessages()
    {
        $query = $this->db->query("SELECT * FROM komentar WHERE is_read = 0");
        return $query->result();
    }

    public function markAllAsRead()
    {
        // Update the database to mark all notifications as read
        $this->db->set('is_read', 1);
        $this->db->update('komentar');

        // Redirect to the "View All" page
        redirect('admin/pesan');
    }


    public function markAllAsReadAndRedirect()
    {
        // Update the database to mark all notifications as read
        $this->db->set('is_read', 1);
        $this->db->update('komentar');

        // Return a JSON response indicating success
        echo json_encode(['status' => 'success']);
    }

    public function apidashboard()
    {
        // Check user role
        if ($this->session->userdata('role') == '1') {
            // Array of API URLs and corresponding API keys
            $apis = [
                [
                    'url' => 'https://api-splp.layanan.go.id:443/t/kaltaraprov.go.id/API_Web_Dishut_Kaltara/1.0/getberita',
                    'key' => 'eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhZG1pbkBrYWx0YXJhcHJvdi5nby5pZCIsImFwcGxpY2F0aW9uIjp7Im93bmVyIjoiYWRtaW5Aa2FsdGFyYXByb3YuZ28uaWQiLCJ0aWVyUXVvdGFUeXBlIjpudWxsLCJ0aWVyIjoiVW5saW1pdGVkIiwibmFtZSI6IkFQSSBXZWIgRGluYXMgS2VodXRhbmFuIFByb3ZpbnNpIEthbGltYW50YW4gVXRhcmEiLCJpZCI6NDA5OCwidXVpZCI6ImE1MGNlMzZiLTFiZjQtNGExOC05NGIwLWZjZGYzYjJlYWZhMCJ9LCJpc3MiOiJodHRwczpcL1wvc3BscC5sYXlhbmFuLmdvLmlkOjQ0M1wvb2F1dGgyXC90b2tlbiIsInRpZXJJbmZvIjp7IlVubGltaXRlZCI6eyJ0aWVyUXVvdGFUeXBlIjoicmVxdWVzdENvdW50IiwiZ3JhcGhRTE1heENvbXBsZXhpdHkiOjAsImdyYXBoUUxNYXhEZXB0aCI6MCwic3RvcE9uUXVvdGFSZWFjaCI6dHJ1ZSwic3Bpa2VBcnJlc3RMaW1pdCI6MCwic3Bpa2VBcnJlc3RVbml0IjpudWxsfX0sImtleXR5cGUiOiJQUk9EVUNUSU9OIiwicGVybWl0dGVkUmVmZXJlciI6IiIsInN1YnNjcmliZWRBUElzIjpbeyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia2FsdGFyYXByb3YuZ28uaWQiLCJuYW1lIjoiQVBJX1dlYl9EaXNodXRfS2FsdGFyYSIsImNvbnRleHQiOiJcL3RcL2thbHRhcmFwcm92LmdvLmlkXC9BUElfV2ViX0Rpc2h1dF9LYWx0YXJhXC8xLjAiLCJwdWJsaXNoZXIiOiJhZG1pbkBrYWx0YXJhcHJvdi5nby5pZCIsInZlcnNpb24iOiIxLjAiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn1dLCJ0b2tlbl90eXBlIjoiYXBpS2V5IiwicGVybWl0dGVkSVAiOiIiLCJpYXQiOjE3MjI5MjE5ODEsImp0aSI6IjlhYzdiNTAyLTQ5OGUtNGYwOC05Y2YxLTU4Y2M4NzRjNjlhOSJ9.m78caEFLF0toSI3O3yZjElnmnwj_8FTPPMp7Co6iBAMNmJn9IMUikaG9GPcF_XngBqtj3j3d_9dyRJbx3GV4dl4G7jZYAHgTZjxxJkfnVLkZ05VSzXhV-5inJvDqO_5xkMGUxBgJIQmxYyzSdEQTC7kI5AHJfhPBEdMVjXSy5IIQJiCNKhN_qRe0DFgKbrUZ9L4K5loVpw0mwFjCbNyFo0-4XAjuMkrO912_olk4Qu8TH9HKSz87jHkv4l4VTBpuTf3x1zeaTzlrCypy89E7fgyYElU5zkvG2BUT4YWuYzL_-6OMyvtULS-SMNTuxzvYjUO__3CMC3TO5kPfBVwQOA=='
                ],
                [
                    'url' => 'https://api-splp.layanan.go.id:443/t/kaltaraprov.go.id/API_Web_KPH_Tarakan/1.0/getberita',
                    'key' => 'eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhZG1pbkBrYWx0YXJhcHJvdi5nby5pZCIsImFwcGxpY2F0aW9uIjp7Im93bmVyIjoiYWRtaW5Aa2FsdGFyYXByb3YuZ28uaWQiLCJ0aWVyUXVvdGFUeXBlIjpudWxsLCJ0aWVyIjoiMTBQZXJNaW4iLCJuYW1lIjoiQVBJIFdlYiBLUEggVGFyYWthbiIsImlkIjo0MTAwLCJ1dWlkIjoiOGE4ZWQwYzItZTRjOS00YmFiLWE4NzUtMDU1NTQwNWI3MDA5In0sImlzcyI6Imh0dHBzOlwvXC9zcGxwLmxheWFuYW4uZ28uaWQ6NDQzXC9vYXV0aDJcL3Rva2VuIiwidGllckluZm8iOnsiVW5saW1pdGVkIjp7InRpZXJRdW90YVR5cGUiOiJyZXF1ZXN0Q291bnQiLCJncmFwaFFMTWF4Q29tcGxleGl0eSI6MCwiZ3JhcGhRTE1heERlcHRoIjowLCJzdG9wT25RdW90YVJlYWNoIjp0cnVlLCJzcGlrZUFycmVzdExpbWl0IjowLCJzcGlrZUFycmVzdFVuaXQiOm51bGx9fSwia2V5dHlwZSI6IlBST0RVQ1RJT04iLCJwZXJtaXR0ZWRSZWZlcmVyIjoiIiwic3Vic2NyaWJlZEFQSXMiOlt7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJrYWx0YXJhcHJvdi5nby5pZCIsIm5hbWUiOiJBUElfV2ViX0tQSF9UYXJha2FuIiwiY29udGV4dCI6IlwvdFwva2FsdGFyYXByb3YuZ28uaWRcL0FQSV9XZWJfS1BIX1RhcmFrYW5cLzEuMCIsInB1Ymxpc2hlciI6ImFkbWluQGthbHRhcmFwcm92LmdvLmlkIiwidmVyc2lvbiI6IjEuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifV0sInRva2VuX3R5cGUiOiJhcGlLZXkiLCJwZXJtaXR0ZWRJUCI6IiIsImlhdCI6MTcyMjkyMzE0NCwianRpIjoiNDA3MmY1YmYtMGY0OS00ZGJkLTg2MzYtMjJkYTM1OGVjOTdiIn0=.uKtyasIH-Sm0Ezt7LXNKmxssbNlqK8dbciUJYHewOM5D5ZPOlQ4953VA5tBTKwHeskGpzGpnFjpwTMEOQ_i1wbUzgUcy4dfvk9rJFUcrP1FQLpex3jVcIUj9GLn0JhLW5HEI-W5UThXyH0XYNPNmqtm7HTT_cSGsXy8BFAWnUR14Xhhl-4kdJwXXGeh63oVsvHP53fRu8ZIrYbsZ24GJfAepUCxN9hiB7t1AnzhcDeCqMCmcazZZIx6RzlDtaBZrIGJprqhACRNfHOe9fA_WQ8tl3k40cdIJ0wr_pf0aNc9z1c_EZc7XdDlZBkH8Ykcs0QF4uVUd7A90XWhj1I-5-w=='
                ]
                // Add more APIs as needed
            ];

            foreach ($apis as $api) {
                // Fetch data from API
                $api_data = $this->Api_model->fetch_data($api['url'], $api['key']);

                // Check if data was fetched successfully
                if ($api_data === false) {
                    log_message('error', 'Failed to fetch data from API: ' . $api['url']);
                    continue; // Skip to the next API if fetching fails
                }

                // Save the fetched data into the database
                $save_status = $this->Api_model->save_data($api_data, $api['url']);
                if (!$save_status) {
                    log_message('error', 'Failed to save data into the database for URL: ' . $api['url']);
                    continue; // Skip to the next API if saving fails
                }
            }

            // Fetch all saved data for display
            $this->load->model('Api_model');
            $data['data'] = $this->db->get('api_data')->result_array();

            // Load the views
            $this->load->view('assets/atas');
            $this->load->view('assets/api_dashboard', $data);
            $this->load->view('assets/bawah');
        } else {
            // Redirect to home if user role is not '1'
            redirect('home');
        }
    }









    // end approve

}

/* End of file  */
