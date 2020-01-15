<?php 

class home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

	
	public function index()
	{
		$data['tentang_kami'] 	= $this->home_model->TentangKami();
		$data['mobil'] 			= $this->home_model->Mobil();

		$this->template_home->load('template_home','home/data/index',$data);
	}

	//Awal Tentang Kami
	public function tentang_kami() {

		$data['tentang_kami'] = $this->home_model->TentangKami();

		$this->template_home->load('template_home','home/data/tentang_kami',$data);

	}
	//Akhir Tentang Kami


	//Awal Saran
	public function saran() {

		$data['tentang_kami'] = $this->home_model->TentangKami();

		$this->template_home->load('template_home','home/data/saran',$data);

	}

	public function saran_kirim () {

		$this->form_validation->set_rules('nama_saran','Nama','required');
		$this->form_validation->set_rules('email_saran','Email','required');
		$this->form_validation->set_rules('telp_saran','Telp','required');
		$this->form_validation->set_rules('isi_saran','Isi Kritik/Saran','required');

		if ($this->form_validation->run()==FALSE) {

			$data['tentang_kami'] = $this->home_model->TentangKami();

			$this->template_home->load('template_home','home/data/saran',$data);

		}
		else {

			$in['nama_saran']  	= $this->input->post('nama_saran');
			$in['email_saran']  = $this->input->post('email_saran');
			$in['telp_saran']  	= $this->input->post('telp_saran');
			$in['isi_saran']  	= $this->input->post('isi_saran');

			$this->db->insert('tbl_saran',$in);

			$this->session->set_flashdata('sukses','OK');
			redirect("home/saran");

		}



	}
	//Akhir Saran

	//Awal Mobil
	// edit
	public function mobil() {

		$data['tentang_kami'] 	= $this->home_model->TentangKami();
		// edit
		$data['mobil'] 			= $this->home_model->mobilAll();
		$data['kelas_mobil'] 	= $this->home_model->KelasMobil();

		// edit
		$this->template_home->load('template_home','home/data/mobil',$data);

	}

	// edit-3
	public function mobil_kelas_mobil () {

		$id = $this->input->post('kelas_mobil_id');

		$data['tentang_kami'] 	= $this->home_model->TentangKami();
		$data['mobil'] 			= $this->home_model->KamarKelasMobil($id);
		$data['kelas_mobil'] 	= $this->home_model->KelasMobil();

		// edit-3
		$this->template_home->load('template_home','home/data/mobil_kelas_mobil',$data);

	}

	// edit-2
	public function mobil_detail () {

		$id = $this->uri->segment(3);

		$data['tentang_kami'] 	= $this->home_model->TentangKami();
		$data['mobil'] 			= $this->home_model->KamarDetail($id);
		$data['mobil_gambar'] 	= $this->home_model->KamarGambarId($id);
		$data['kelas_mobil'] 	= $this->home_model->KelasMobil();

		// edit-2
		$this->template_home->load('template_home','home/data/mobil_detail',$data);

	}

	public function rental() {
			$this->form_validation->set_rules('tgl_rental_masuk','Tanggal Rental','required');
			$this->form_validation->set_rules('tgl_rental_kembali','Tanggal Kembali','required');
			$this->form_validation->set_rules('nama_rental','Nama','required');
			$this->form_validation->set_rules('telp_rental','Telp','required');
			$this->form_validation->set_rules('alamat_rental','Alamat','required');
			
		

			if ($this->form_validation->run()==FALSE) {

				$id = $this->input->post('id_mobil');

				$data['tentang_kami'] 	= $this->home_model->TentangKami();
				$data['mobil'] 			= $this->home_model->KamarDetail($id);
				$data['mobil_gambar'] 	= $this->home_model->KamarGambarId($id);
				$data['kelas_mobil'] 	= $this->home_model->KelasMobil();

				// edit-2
				$this->template_home->load('template_home','home/data/mobil_detail',$data);

			}
			else {

		
					$in['tgl_rental_masuk'] 		= tgl_luar($this->input->post('tgl_rental_masuk'));
					$in['tgl_rental_kembali'] 	= tgl_luar($this->input->post('tgl_rental_kembali'));
					$in['mobil_id'] 				= $this->input->post('id_mobil');
					$in['nama_rental'] 			= $this->input->post('nama_rental');
					$in['telp_rental'] 			= $this->input->post('telp_rental');
					$in['alamat_rental'] 		= $this->input->post('alamat_rental');
					$in['status_rental'] 		= 0;
					
							
					$this->db->insert("tbl_rental",$in);
							
					$this->session->set_flashdata('berhasil','OK');
					$id = $this->input->post('id_mobil');
					
					// edit-2
					redirect("home/mobil_detail/".$id);
			}
	}
	//Akhir Mobil

	//Awal Galeri

	public function galeri() {

		$data['tentang_kami'] 		= $this->home_model->TentangKami();
		$data['galeri_kategori'] 	= $this->home_model->GaleriKategori();

		$this->template_home->load('template_home','home/data/galeri',$data);

	}

	public function galeri_detail () {

		$id = $this->uri->segment(3);

		$data['tentang_kami'] 	= $this->home_model->TentangKami();
		$data['galeri'] 		= $this->home_model->GaleriDetail($id);
		

		$this->template_home->load('template_home','home/data/galeri_detail',$data);

	}

	//Akhir Galeri
}

