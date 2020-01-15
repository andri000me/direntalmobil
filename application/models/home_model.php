<?php

class home_model extends CI_Model {


	//Awal tentang Kami
	function TentangKami() {
		return $this->db->query("select * from tbl_tentang_rental");
	}
	//Akhir Tentang Kami

	//Awal Mobil
	function Mobil() {
		return $this->db->query("select a.*,b.*,c.*
			from tbl_mobil a join tbl_kelas_mobil b on a.kelas_mobil_id=b.id_kelas_mobil
			join tbl_mobil_gambar c on a.id_mobil=c.mobil_id
			group by c.mobil_id
			order by a.id_mobil desc
			limit 0,15");
	}

	function mobilAll () {

		return $this->db->query("select a.*,b.*,c.*
			from tbl_mobil a join tbl_kelas_mobil b on a.kelas_mobil_id=b.id_kelas_mobil
			join tbl_mobil_gambar c on a.id_mobil=c.mobil_id
			group by c.mobil_id
			order by a.id_mobil desc");

	}

	function KamarKelasMobil($id) {

		return $this->db->query("select a.*,b.*,c.*
			from tbl_mobil a join tbl_kelas_mobil b on a.kelas_mobil_id=b.id_kelas_mobil
			join tbl_mobil_gambar c on a.id_mobil=c.mobil_id
			where b.id_kelas_mobil='$id'
			group by c.mobil_id
			order by a.id_mobil desc");

	}

	function KamarDetail($id) {
		return $this->db->query("select a.*,b.* from tbl_mobil a
		join tbl_kelas_mobil b on a.kelas_mobil_id=b.id_kelas_mobil
		where a.id_mobil='$id' ");
	}

	function KamarGambarId($id) {
		return $this->db->query("select * from tbl_mobil_gambar where mobil_id='$id'");
	}
	//Akhir Mobil

	//Awal Kelas Mobil
	function KelasMobil () {
		return $this->db->query("select * from tbl_kelas_mobil order by id_kelas_mobil");
	}
	//Akhir Kelas Mobil


	//Awal Galeri
	function GaleriKategori() {
		return $this->db->query("select a.*,b.*
			from tbl_kategori_galeri a join tbl_galeri b on a.id_kategori_galeri=b.kategori_galeri_id
			group by a.id_kategori_galeri
			order by a.id_kategori_galeri asc
			");
	}

	function GaleriDetail($id) {
		return $this->db->query("select a.*,b.* from tbl_galeri a
		join tbl_kategori_galeri b on a.kategori_galeri_id=b.id_kategori_galeri
		where a.kategori_galeri_id='$id' ");
	}
	//Akhir galeri


}