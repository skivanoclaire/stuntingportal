<?php
class M_pengumuman extends CI_Model{

	function get_all_pengumuman(){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
	}
	function simpan_pengumuman($judul,$deskripsi,$file){
		$author=$this->session->userdata('nama');
		$hsl=$this->db->query("INSERT INTO tbl_pengumuman(pengumuman_judul,pengumuman_deskripsi,pengumuman_author,pengumuman_file) VALUES ('$judul','$deskripsi','$author','$file')");
		return $hsl;
	}
	function update_pengumuman($kode,$judul,$deskripsi,$file){
		$author=$this->session->userdata('nama');
		$hsl=$this->db->query("UPDATE tbl_pengumuman SET pengumuman_judul='$judul',pengumuman_deskripsi='$deskripsi',pengumuman_file='$file' where pengumuman_id='$kode'");
		return $hsl;
	}
	
		function update_file_tanpa_file($kode,$judul,$deskripsi){

		$hsl=$this->db->query("UPDATE tbl_pengumuman SET pengumuman_judul='$judul',pengumuman_deskripsi='$deskripsi' WHERE pengumuman_id='$kode'");

		return $hsl;

	}
	
	function hapus_pengumuman($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengumuman WHERE pengumuman_id='$kode'");
		return $hsl;
	}
	

	//Front-end
	function get_pengumuman_home(){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit 3");
		return $hsl;
	}

	function pengumuman(){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
	}
	function pengumuman_perpage(){
		$hsl=$this->db->query("SELECT * FROM pengumuman ORDER BY pengumuman_id DESC limit $offset,$limit");
		return $hsl;
	}
	
	function get_file_byid($id){

		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author,pengumuman_file FROM tbl_pengumuman WHERE pengumuman_id='$id'");

	return $hsl;

	}


}
