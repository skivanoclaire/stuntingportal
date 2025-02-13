<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
        $this->load->library('pagination');
        $this->load->model('Visitor_model');
    }

    public function index()
    {
        // Load model untuk mengambil data
        $this->load->model('Stunting_model');

        // Ambil data stunting dan data bulanan
        $data['stunting'] = $this->Stunting_model->get_stunting_data();
        $data['monthly_stunting'] = $this->Stunting_model->get_monthly_data();

        // Ambil data terbaru dari tabel sigizi
        $data['latest_sigizi'] = $this->Stunting_model->get_latest_sigizi_data(); // Mengambil data dari model Stunting_model
        $data['monthly_sigizi'] = $this->Stunting_model->get_monthly_sigizi_data();

        // Process data for the pie chart
        $data['total_balita'] = array_sum(array_column($data['stunting'], 'total_balita'));
        $data['stunting_pendek'] = array_sum(array_column($data['stunting'], 'stunting_pendek'));
        $data['stunting_sangat_pendek'] = array_sum(array_column($data['stunting'], 'stunting_sangat_pendek'));

        // Process data for the line chart
        $data['sasaran_balita'] = array_sum(array_column($data['monthly_sigizi'], 'sasaran_balita'));
        $data['jumlah_balita_diukur'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_diukur'));
        $data['jumlah_balita_ditemukan'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_ditemukan'));
        $data['persentase_balita_diukur'] = array_sum(array_column($data['monthly_sigizi'], 'persentase_balita_diukur'));
        $data['jumlah_balita_t'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_t'));
        $data['jumlah_balita_bb_kurang'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_bb_kurang'));
        $data['jumlah_balita_gizi_buruk'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_gizi_buruk'));
        $data['jumlah_balita_stunting'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_stunting'));
        $data['jumlah_balita_gizi_kurang'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_gizi_kurang'));
        $data['jumlah_balita_t_mendapat_mt'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_t_mendapat_mt'));
        $data['jumlah_balita_bb_kurang_mendapat_mt'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_bb_kurang_mendapat_mt'));
        $data['jumlah_balita_gizi_buruk_dirujuk_rs'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_gizi_buruk_dirujuk_rs'));
        $data['jumlah_balita_stunting_dirujuk'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_stunting_dirujuk'));
        $data['jumlah_balita_gizi_kurang_mendapat_mt'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_gizi_kurang_mendapat_mt'));
        $data['jumlah_balita_gizi_buruk_tatalaksana'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_balita_gizi_buruk_tatalaksana'));
        $data['jumlah_posyandu'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_posyandu'));
        $data['ketersediaan_alat_antropometri'] = array_sum(array_column($data['monthly_sigizi'], 'ketersediaan_alat_antropometri'));
        $data['alat_antropometri_terkalibrasi'] = array_sum(array_column($data['monthly_sigizi'], 'alat_antropometri_terkalibrasi'));
        $data['kader_terampil_antropometri'] = array_sum(array_column($data['monthly_sigizi'], 'kader_terampil_antropometri'));
        $data['jumlah_posyandu_eppgbm'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_posyandu_eppgbm'));
        $data['persentase_antropometri_standar'] = array_sum(array_column($data['monthly_sigizi'], 'persentase_antropometri_standar'));
        $data['persentase_alat_antropometri_terkalibrasi'] = array_sum(array_column($data['monthly_sigizi'], 'persentase_alat_antropometri_terkalibrasi'));
        $data['jumlah_kader_microsite'] = array_sum(array_column($data['monthly_sigizi'], 'jumlah_kader_microsite'));



        // Catat kunjungan
        $this->Visitor_model->record_visitor();

        // Ambil total pengunjung
        $data['total_visitors'] = $this->Visitor_model->get_total_visitors();

        // Load view dengan data yang dibutuhkan
        $this->load->view('home/atas');
        $this->load->view('home/index', $data); // Kirim data ke view
        $this->load->view('home/bawah');

    }




    public function about()
    {
        $data['title'] = 'Tentang Kami';
        $this->load->view('home/atas');
        $this->load->view('home/about', $data);
        $this->load->view('home/bawah');
    }
    public function standarpelayanan()
    {
        $data['title'] = 'Standar Pelayanan';
        $this->load->view('home/atas');
        $this->load->view('home/standarpelayanan', $data);
        $this->load->view('home/bawah');
    }

    public function struktural()
    {
        $data['title'] = 'Pegawai';
        $this->load->view('home/atas');
        $this->load->view('home/struktural', $data);
        $this->load->view('home/bawah');
    }

    public function galeri()
    {
        $jum = $this->main_model->get_all_galeri();
        $page = $this->uri->segment(3);
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit = 8;
        $config['base_url'] = base_url() . 'home/galeri/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        //Tambahan untuk styling
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['datavideo'] = $this->main_model->galeri_perpage($offset, $limit);

        $data['title'] = 'Galeri';
        $this->load->view('home/atas');
        $this->load->view('home/galeri', $data);
        $this->load->view('home/bawah');
    }

    public function video()
    {

        $jum = $this->main_model->get_all_video();
        $page = $this->uri->segment(3);
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit = 6;
        $config['base_url'] = base_url() . 'home/video/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        //Tambahan untuk styling
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['datavideo'] = $this->main_model->video_perpage($offset, $limit);




        $data['title'] = 'Video';
        $this->load->view('home/atas');
        $this->load->view('home/video', $data);
        $this->load->view('home/bawah');
    }

    public function berita()
    {

        $jum = $this->main_model->get_all_berita();
        $page = $this->uri->segment(3);
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit = 5;
        $config['base_url'] = base_url() . 'home/berita/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        //Tambahan untuk styling
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['databerita'] = $this->main_model->berita_perpage($offset, $limit);




        $data['title'] = 'Berita';
        $this->load->view('home/atas');
        $this->load->view('home/berita', $data);

    }

    public function beritaxx()
    {
        $data['title'] = 'Berita';
        $this->load->view('home/atas');
        $this->load->view('home/berita', $data);

    }
    public function detail($id = '')
    {
        $data['id'] = $id;
        $data['title'] = 'Detail Berita';
        $this->load->view('home/atas', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('home/bawah');
    }
    public function kategori_berita($id_kategori)
    {
        $kategori = $this->main_model->kategoriBerita($id_kategori);
        $data['berita'] = $kategori;
        $data['title'] = 'Detail Berita';
        $this->load->view('home/atas');
        $this->load->view('home/kategori', $data);
        $this->load->view('home/bawah');
    }

    public function trcpinterku()
    {
        $data['title'] = 'TRC PinterKU';
        $this->load->view('home/atas');
        $this->load->view('home/trcpinterku', $data);
        $this->load->view('home/bawah');
    }

    public function kontak()
    {
        $data['title'] = 'Kontak, Alamat, Peta Lokasi';
        $this->load->view('home/atas');
        $this->load->view('home/kontak', $data);
        $this->load->view('home/bawah');
    }

    function hubungi()
    {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));



        $userIp = $this->input->ip_address();



        $secret = "6LfffwsfAAAAAA2w41z9UFCue-h056Hq5Dx-QrwQ";



        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);



        $status = json_decode($output, true);



        if ($status['success']) {



            $data = array(
                'nama' => htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES),
                'email' => htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES),
                'nomorkontak' => htmlspecialchars($this->input->post('nomorkontak', TRUE), ENT_QUOTES),
                'subjek' => htmlspecialchars($this->input->post('subjek', TRUE), ENT_QUOTES),
                'tanggal_post' => htmlspecialchars($this->input->post('tanggal', TRUE), ENT_QUOTES),
            );
            $this->db->insert('komentar', $data);
            $this->session->set_flashdata('msg', 'berhasil');
            redirect('home/kontak', 'refresh');


        } else {

            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');

        }
    }

    public function struktur()
    {
        $data['title'] = 'Struktur Organisasi';
        $this->load->view('home/atas');
        $this->load->view('home/struktur', $data);
        $this->load->view('home/bawah');
    }
    public function visimisi()
    {
        $data['title'] = 'Visi Misi';
        $this->load->view('home/atas');
        $this->load->view('home/visimisi', $data);
        $this->load->view('home/bawah');
    }

    public function definisi()
    {
        $data['title'] = 'Definisi';
        $this->load->view('home/atas');
        $this->load->view('home/definisi', $data);
        $this->load->view('home/bawah');
    }
    public function penyebab()
    {
        $data['title'] = 'Penyebab';
        $this->load->view('home/atas');
        $this->load->view('home/penyebab', $data);
        $this->load->view('home/bawah');
    }
    public function dampak()
    {
        $data['title'] = 'Dampak';
        $this->load->view('home/atas');
        $this->load->view('home/dampak', $data);
        $this->load->view('home/bawah');
    }
    public function solusi()
    {
        $data['title'] = 'Solusi';
        $this->load->view('home/atas');
        $this->load->view('home/solusi', $data);
        $this->load->view('home/bawah');
    }

    public function panduan_anak()
    {
        $data['title'] = 'Panduan Anak';
        $this->load->view('home/atas');
        $this->load->view('home/panduan_anak', $data);
        $this->load->view('home/bawah');
    }

    public function panduan_ibu()
    {
        $data['title'] = 'Panduan Ibu';
        $this->load->view('home/atas');
        $this->load->view('home/panduan_ibu', $data);
        $this->load->view('home/bawah');
    }

    public function program()
    {
        $data['title'] = 'Program Pemerintah';
        $this->load->view('home/atas');
        $this->load->view('home/program', $data);
        $this->load->view('home/bawah');
    }

    public function regulasi()
    {
        $data['title'] = 'Kebijakan dan Regulasi';
        $this->load->view('home/atas');
        $this->load->view('home/regulasi', $data);
        $this->load->view('home/bawah');
    }

    public function publikasi()
    {
        $data['title'] = 'Publikasi';
        $this->load->view('home/atas');
        $this->load->view('home/publikasi', $data);
        $this->load->view('home/bawah');
    }

    public function sop()
    {
        $data['title'] = 'SOP';
        $this->load->view('home/atas');
        $this->load->view('home/sop', $data);
        $this->load->view('home/bawah');
    }

    public function surveypelayananpublik()
    {
        $data['title'] = 'Survey Pelayanan Publik';
        $this->load->view('home/atas');
        $this->load->view('home/surveypelayananpublik', $data);
        $this->load->view('home/bawah');
    }

    public function tugasfungsi()
    {
        $data['title'] = 'Tugas & Fungsi';
        $this->load->view('home/atas');
        $this->load->view('home/tugasfungsi', $data);
        $this->load->view('home/bawah');
    }

    public function get_file()
    {
        $id = $this->uri->segment(3);
        $get_db = $this->main_model->get_file_byid($id);
        $q = $get_db->row_array();
        $file = $q['pengumuman_file'];
        $path = './assets/files/' . $file;
        $data = file_get_contents($path);
        $name = $file;
        force_download($name, $data);

    }
    public function spbe()
    {
        $data['title'] = 'SPBE';
        $this->load->view('home/atas');
        $this->load->view('home/spbe', $data);
        $this->load->view('home/bawah');
    }

    public function arsitektur()
    {
        $data['title'] = 'Arsitektur SPBE';
        $this->load->view('home/atas');
        $this->load->view('home/arsitektur', $data);
        $this->load->view('home/bawah');
    }

    public function petarencana()
    {
        $data['title'] = 'Peta Rencana SPBE';
        $this->load->view('home/atas');
        $this->load->view('home/petarencana', $data);
        $this->load->view('home/bawah');
    }

    public function subdomainhosting()
    {
        $data['title'] = 'Layanan Subdomain dan Hosting';
        $this->load->view('home/atas');
        $this->load->view('home/subdomainhosting', $data);
        $this->load->view('home/bawah');
    }
    public function subdomain()
    {
        $data['title'] = 'Format Subdomain';
        $this->load->view('home/atas');
        $this->load->view('home/subdomain', $data);
        $this->load->view('home/bawah');
    }

    public function formataplikasi()
    {
        $data['title'] = 'Format Surat Permohonan Rekomendasi Pembangunan dan Pengembangan Aplikasi';
        $this->load->view('home/atas');
        $this->load->view('home/formataplikasi', $data);
        $this->load->view('home/bawah');
    }
    public function email()
    {
        $data['title'] = 'Format Email';
        $this->load->view('home/atas');
        $this->load->view('home/email', $data);
        $this->load->view('home/bawah');
    }
    public function jaringan()
    {
        $data['title'] = 'Jaringan';
        $this->load->view('home/atas');
        $this->load->view('home/jaringan', $data);
        $this->load->view('home/bawah');
    }

    public function pembangunanaplikasi()
    {
        $data['title'] = 'Pembangunan Aplikasi';
        $this->load->view('home/atas');
        $this->load->view('home/pembangunanaplikasi', $data);
        $this->load->view('home/bawah');
    }

    public function internet()
    {
        $data['title'] = 'Internet';
        $this->load->view('home/atas');
        $this->load->view('home/internet', $data);
        $this->load->view('home/bawah');
    }

    public function vidcon()
    {
        $data['title'] = 'Internet';
        $this->load->view('home/atas');
        $this->load->view('home/vidcon', $data);
        $this->load->view('home/bawah');
    }

    public function pendaftaran()
    {
        $data['title'] = 'Pendaftaran';
        $this->load->view('home/atas');
        $this->load->view('home/pendaftaran', $data);
        // $this->load->view('home/bawah');
    }

    public function savepengguna()
    {
        // Upload configuration
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
        $config['max_size'] = '500000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        // ReCAPTCHA verification
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp = $this->input->ip_address();
        $secret = "6LfffwsfAAAAAA2w41z9UFCue-h056Hq5Dx-QrwQ";
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $status = json_decode($output, true);

        if ($status['success']) {
            $username = htmlspecialchars($this->input->post('username'), ENT_QUOTES);
            $password = htmlspecialchars($this->input->post('password'), ENT_QUOTES);
            $email = htmlspecialchars($this->input->post('email'), ENT_QUOTES);
            $nohp = htmlspecialchars($this->input->post('nohp'), ENT_QUOTES);

            // Check if username, email, or phone number already exists
            $this->db->from('pengguna');
            $this->db->where('username', $username);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('msg', 'gagal');
                redirect('home/pendaftaran', 'refresh');
            } else {
                // Check if email or phone number already exists
                $this->db->from('pengguna');
                $this->db->where('email', $email);
                $query = $this->db->get();

                if ($query->num_rows() > 0) {
                    $this->session->set_flashdata('msg', 'gagal');
                    redirect('home/pendaftaran', 'refresh');
                }

                $this->db->from('pengguna');
                $this->db->where('nohp', $nohp);
                $query = $this->db->get();

                if ($query->num_rows() > 0) {
                    $this->session->set_flashdata('msg', 'gagal');
                    redirect('home/pendaftaran', 'refresh');
                }

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('msg', 'gagal');
                    redirect('home/pendaftaran', 'refresh');
                } else {
                    // Handle file upload and image compression
                    $gbr = $this->upload->data();
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

                    // Hash the password with bcrypt
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    // Prepare data for insertion
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'username' => $username,
                        'password' => $hashedPassword,
                        'email' => $email,
                        'nohp' => $nohp,
                        'gambar' => $gbr['file_name'],
                        'level' => '2',
                        'status' => '0'
                    ];

                    // Insert data into database
                    $this->db->insert('pengguna', $data);
                    $this->session->set_flashdata('msg', 'success');
                    redirect('welcomeuser', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect('home/pendaftaran', 'refresh');
        }
    }


    /* batas */
}

/* End of file Home.php */
