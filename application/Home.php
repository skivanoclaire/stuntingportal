<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
		$this->load->library('pagination');
    }
    
    public function index()
    {
        $this->load->view('home/atas');
        $this->load->view('home/index');
        $this->load->view('home/bawah');
        
    }
    public function about()
    {
        $data['title'] = 'Tentang Kami';
        $this->load->view('home/atas');
        $this->load->view('home/about',$data);
        $this->load->view('home/bawah');
    }
    public function standarpelayanan()
    {
        $data['title'] = 'Standar Pelayanan';
        $this->load->view('home/atas');
        $this->load->view('home/standarpelayanan',$data);
        $this->load->view('home/bawah');
    }

	public function struktural()
    {
        $data['title'] = 'Pegawai';
        $this->load->view('home/atas');
        $this->load->view('home/struktural',$data);
        $this->load->view('home/bawah');
    }

    public function galeri()
    {
        $data['title'] = 'Galeri';
        $this->load->view('home/atas');
        $this->load->view('home/galeri',$data);
        $this->load->view('home/bawah');
    }

    public function video()
    {
		
		$jum=$this->main_model->get_all_video();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=6;
        $config['base_url'] = base_url() . 'home/video/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
						//Tambahan untuk styling
	          $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	          $config['full_tag_close']   = '</ul></nav></div>';
	          $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['num_tag_close']    = '</span></li>';
	          $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	          $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	          $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['prev_tagl_close']  = '</span>Next</li>';
	          $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	          $config['first_tagl_close'] = '</span></li>';
	          $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['last_tagl_close']  = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $data['page'] =$this->pagination->create_links();
						$data['datavideo']=$this->main_model->video_perpage($offset,$limit);
		
		
		
		
		$data['title'] = 'Video';
        $this->load->view('home/atas');
        $this->load->view('home/video',$data);
        $this->load->view('home/bawah');
    }

    public function berita()
    {
        $data['title'] = 'Berita';
        $this->load->view('home/atas');
        $this->load->view('home/berita',$data);
       
    }
    public function detail($id='')
    {
        $data['id'] = $id;
        $data['title'] = 'Detail Berita';
        $this->load->view('home/atasdetail', $data);
        $this->load->view('home/detail',$data);
        $this->load->view('home/bawah');
    }
    public function kategori_berita($id_kategori)
    {
        $kategori = $this->main_model->kategoriBerita($id_kategori);
        $data['berita']  = $kategori;
        $data['title'] = 'Detail Berita';
        $this->load->view('home/atas');
        $this->load->view('home/kategori',$data);
        $this->load->view('home/bawah');
    }

    public function kontak()
    {
        $data['title'] = 'Kontak, Alamat, Peta Lokasi';
        $this->load->view('home/atas');
        $this->load->view('home/kontak',$data);
        $this->load->view('home/bawah');
    }

    function hubungi()
    {
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

 

        $userIp=$this->input->ip_address();

     

        $secret = "6LfffwsfAAAAAA2w41z9UFCue-h056Hq5Dx-QrwQ";

   

        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

 

        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_URL, $url); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        $output = curl_exec($ch); 

        curl_close($ch);      

         

        $status= json_decode($output, true);

 

        if ($status['success']) {

		
		
        $data = array(
            'nama'      => htmlspecialchars($this->input->post('nama', TRUE),ENT_QUOTES),
            'email'     => htmlspecialchars($this->input->post('email', TRUE),ENT_QUOTES),
			'nomorkontak' => htmlspecialchars($this->input->post('nomorkontak', TRUE),ENT_QUOTES),
            'subjek'    => htmlspecialchars($this->input->post('subjek', TRUE),ENT_QUOTES),
            'tanggal_post'  => htmlspecialchars($this->input->post('tanggal', TRUE),ENT_QUOTES),
        );
        $this->db->insert('komentar', $data);
        $this->session->set_flashdata('msg', 'berhasil');
        redirect('home/kontak','refresh');
		
		
		        }else{

            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');

        }
    }

    public function struktur()
    {
        $data['title'] = 'Struktur Organisasi';
        $this->load->view('home/atas');
        $this->load->view('home/struktur',$data);
        $this->load->view('home/bawah');
    }
	    public function visimisi()
    {
        $data['title'] = 'Visi Misi';
        $this->load->view('home/atas');
        $this->load->view('home/visimisi',$data);
        $this->load->view('home/bawah');
    }
	
		public function sejarah()
    {
        $data['title'] = 'Sejarah';
        $this->load->view('home/atas');
        $this->load->view('home/sejarah',$data);
        $this->load->view('home/bawah');
    }
		public function pengumuman()
    {
        $data['title'] = 'Pengumuman';
        $this->load->view('home/atas');
        $this->load->view('home/pengumuman',$data);
        $this->load->view('home/bawah');
    }
	 
		public function sop()
    {
        $data['title'] = 'SOP';
        $this->load->view('home/atas');
        $this->load->view('home/sop',$data);
        $this->load->view('home/bawah');
    }
	
		public function surveypelayananpublik()
    {
        $data['title'] = 'Survey Pelayanan Publik';
        $this->load->view('home/atas');
        $this->load->view('home/surveypelayananpublik',$data);
        $this->load->view('home/bawah');
    }
	
		public function tugasfungsi()
    {
        $data['title'] = 'Tugas & Fungsi';
        $this->load->view('home/atas');
        $this->load->view('home/tugasfungsi',$data);
        $this->load->view('home/bawah');
    }
	
		public function get_file()
	{		
			$id=$this->uri->segment(3);		
			$get_db=$this->main_model->get_file_byid($id);		
			$q=$get_db->row_array();		
			$file=$q['pengumuman_file'];		
			$path='./assets/files/'.$file;		
			$data = file_get_contents($path);		
			$name = $file;		
			force_download($name, $data);	
	
	}

}

/* End of file Home.php */
