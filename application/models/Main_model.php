<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {
	

    
    public function get_stunting_data()
    {
        $query = $this->db->query("SELECT region_name, total_balita, stunting_pendek, stunting_sangat_pendek, prevalensi FROM stunting_data");
        return $query->result();
    }


    function kategoriBerita($id_kategori)
    {
        $this->db->select('berita.*,user.nama,kategori.nmkat');
        $this->db->join('user', 'user.id_user = berita.id_user', 'left');
        $this->db->join('kategori', 'kategori.idkat = berita.idkat', 'left');
        $this->db->from('berita');
        $this->db->where('berita.idkat', $id_kategori);
        $this->db->where('status_berita', 'Publish');
        $this->db->order_by('id_berita', 'desc');
        return $this->db->get()->result();
    }

    public function cari($keyword)
    {
        
    }		
	function get_all_pengumuman(){		
	$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman ORDER BY pengumuman_id DESC");		return $hsl;	
	}	
	
	function simpan_pengumuman($judul,$deskripsi,$file){		
	$author=$this->session->userdata('nama');		$hsl=$this->db->query("INSERT INTO tbl_pengumuman(pengumuman_judul,pengumuman_deskripsi,pengumuman_author,pengumuman_file) VALUES ('$judul','$deskripsi','$author','$file')");		return $hsl;	}	function update_pengumuman($kode,$judul,$deskripsi,$file){		$author=$this->session->userdata('nama');		$hsl=$this->db->query("UPDATE tbl_pengumuman SET pengumuman_judul='$judul',pengumuman_deskripsi='$deskripsi',pengumuman_file='$file' where pengumuman_id='$kode'");		return $hsl;	
	}			
	function update_file_tanpa_file($kode,$judul,$deskripsi){		
	$hsl=$this->db->query("UPDATE tbl_pengumuman SET pengumuman_judul='$judul',pengumuman_deskripsi='$deskripsi' WHERE pengumuman_id='$kode'");		return $hsl;	
	}		
	function hapus_pengumuman($kode){		
	$hsl=$this->db->query("DELETE FROM tbl_pengumuman WHERE pengumuman_id='$kode'");		return $hsl;	
	}		
	//Front-end	function get_pengumuman_home(){		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit 3");		return $hsl;	}	function pengumuman(){		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman ORDER BY pengumuman_id DESC");		return $hsl;	}	function pengumuman_perpage($offset,$limit){		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,pengumuman_tanggal,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author, pengumuman_file FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit $offset,$limit");		return $hsl;	}		function get_file_byid($id){		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman WHERE pengumuman_id='$id'");	return $hsl;	}


	
	function get_all_video(){

		$hsl=$this->db->query("SELECT video.link_video FROM video ORDER BY id_video ASC");

		return $hsl;

	}

	function video_perpage($offset,$limit){

		$hsl=$this->db->query("SELECT video.link_video FROM video ORDER BY id_video ASC limit $offset,$limit");

		return $hsl;

	}	

	function get_all_galeri(){

		$hsl=$this->db->query("SELECT * FROM galeri ORDER BY id_galeri DESC");

		return $hsl;

	}

	function galeri_perpage($offset,$limit){

		$hsl=$this->db->query("SELECT * FROM galeri ORDER BY id_galeri DESC limit $offset,$limit");

		return $hsl;

	}
	
	function get_all_berita(){

		$hsl=$this->db->query("SELECT * FROM berita ORDER BY id_berita DESC");

		return $hsl;

	}

	function berita_perpage($offset,$limit){

		$hsl=$this->db->query("select berita.*,user.nama,kategori.nmkat from berita inner join user on user.id_user = berita.id_user left join kategori on kategori.idkat=berita.idkat where status_berita='Publish' order by id_berita desc limit $offset,$limit");
 
		return $hsl;

	}	
	

	}
/* End of file Main_model.php */
