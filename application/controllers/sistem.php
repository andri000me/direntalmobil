<?php

class sistem extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('sistem_model');
	}

	public function index () {

			$data['tentang_kami'] = $this->sistem_model->TentangKami();
			$this->load->view('sistem/login',$data);

	}

	public function login() {
		$this->form_validation->set_rules('username_user','Username','required');
		$this->form_validation->set_rules('password_user','Password','required');

		if ($this->form_validation->run()==FALSE) {

			$data['tentang_kami'] = $this->sistem_model->TentangKami();
			$this->load->view('sistem/login',$data);

		}
		else {


			$username_user = $this->input->post('username_user');
			$password_user = md5($this->input->post('password_user'));

			$this->sistem_model->CekLogin($username_user,$password_user);

		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect("sistem");
	} 

	public function home() {

		if($this->session->userdata("id_user")!=="") {

			$data['new_rental'] 	= $this->sistem_model->NewReservasiBaru();
			$data['mobil']			= $this->sistem_model->KamarKosong();
			$this->template_system->load('template_system','sistem/data/index',$data);
		}
		else{
			redirect('sistem');

		}
	}

	//Awal Category Gallery	

	public function kategori_galeri() {

		if($this->session->userdata("id_user")!=="" ) {
			$data['kategori_galeri']	= $this->sistem_model->KategoriGaleri();
			$this->template_system->load('template_system','sistem/data/kategori_galeri/index',$data);
		}
		else{
			redirect('sistem');

		}
	} 

	public function kategori_galeri_tambah () {

		if($this->session->userdata("id_user")!=="" ) {
			
			$this->template_system->load('template_system','sistem/data/kategori_galeri/add');
		}
		else{
			redirect('sistem');

		}

	}

	public function kategori_galeri_simpan () {

		if($this->session->userdata("id_user")!=="" ) {

			$this->form_validation->set_rules('nama_kategori_galeri', 'Category Gallery', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_system->load('template_system','sistem/data/kategori_galeri/add');

			}
			else {

				$in['nama_kategori_galeri'] = $this->input->post('nama_kategori_galeri');
								
				$this->db->insert("tbl_kategori_galeri",$in);

				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/kategori_galeri");	
			}
			
			
		}
		else{
			redirect('sistem');

		}

	}

	public function kategori_galeri_delete() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteKategoriGaleri($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/kategori_galeri");

		}
		else{
			redirect('sistem');

		}

	}

	public function kategori_galeri_edit() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->EditKategoriGaleri($id);

			foreach ($query->result_array() as $value) {
				$data['id_kategori_galeri'] 	=  $value['id_kategori_galeri'];
				$data['nama_kategori_galeri'] =  $value['nama_kategori_galeri'];
				
			}

			$this->template_system->load('template_system','sistem/data/kategori_galeri/edit',$data);
		


		}
		else{
			redirect('sistem');

		}

	}


	public function kategori_galeri_update() {

		if($this->session->userdata("id_user")!=="" ) {

			$id['id_kategori_galeri'] 	=  $this->input->post("id_kategori_galeri");
			$up['nama_kategori_galeri'] 	=  $this->input->post("nama_kategori_galeri");

			$this->db->update("tbl_kategori_galeri",$up,$id);

			$this->session->set_flashdata('update','ok');
			redirect("sistem/kategori_galeri");

		}
		else{
			redirect('sistem');

		}

	}


	//Akhir Category Gallery 

	//Awal galeri 
	public function galeri () {

		if($this->session->userdata("id_user")!=="" ) {

			$data['galeri'] =  $this->sistem_model->GetGaleri();

			$this->template_system->load('template_system','sistem/data/galeri/index',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function galeri_tambah() {

		if($this->session->userdata("id_user")!=="" ) {

			$data['kategori'] = $this->sistem_model->KategoriGaleri();

			$this->template_system->load('template_system','sistem/data/galeri/add',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function galeri_simpan() {

		if($this->session->userdata("id_user")!=="" ) {

			$this->form_validation->set_rules('kategori_galeri_id','Category Gallery','required');
			$this->form_validation->set_rules('nama_galeri','Gallery Name','required');
			
		

		if ($this->form_validation->run()==FALSE) {

			$data['kategori'] = $this->sistem_model->KategoriGaleri();

			$this->template_system->load('template_system','sistem/data/galeri/add',$data);

		}
		else {

			if(empty($_FILES['userfile']['name']))
				{
					
					$data['kategori'] = $this->sistem_model->KategoriGaleri();

					$this->template_system->load('template_system','sistem/data/galeri/add',$data);

				}
				else
				{

			
					$config['upload_path'] = './images/galeri/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';
					
			 
					$this->load->library('upload', $config);
	 				if ($this->upload->do_upload("userfile")) {
					
						$data	 	= $this->upload->data();
			 
						
						$source             = "./images/galeri/".$data['file_name'] ;
						
						chmod($source, 0777) ;
						
						$in['nama_galeri'] 			= $this->input->post('nama_galeri');
						$in['gambar'] 				= $data['file_name'];
						$in['kategori_galeri_id'] 	= $this->input->post('kategori_galeri_id');
						
						
						
						$this->db->insert("tbl_galeri",$in);
						
						$this->session->set_flashdata('berhasil','OK');
						redirect("sistem/galeri");
						
					}

					else 
					{
						$data['kategori'] = $this->sistem_model->KategoriGaleri();

						$this->template_system->load('template_system','sistem/data/galeri/add',$data);
					}

				}
				

		}
		

		}
		else{
			redirect('sistem');

		}

	}

	public function galeri_edit() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);

			$query =  $this->sistem_model->EditGaleri($id);

			foreach ($query->result_array() as $value) {
				$data['id_galeri'] 			=  $value['id_galeri'];
				$data['nama_galeri'] 		=  $value['nama_galeri'];
				$data['gambar'] 			=  $value['gambar'];
				$data['kategori_galeri_id'] =  $value['kategori_galeri_id'];
			}

			$data['kategori'] =  $this->sistem_model->KategoriGaleri();

			$this->template_system->load('template_system','sistem/data/galeri/edit',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function galeri_update() {

		if($this->session->userdata("id_user")!=="" ) {

			$id['id_galeri'] = $this->input->post("id_galeri");

		if(empty($_FILES['userfile']['name']))
				{
					
						$up['nama_galeri'] 			= $this->input->post('nama_galeri');
						$up['kategori_galeri_id'] 	= $this->input->post('kategori_galeri_id');
						
						$this->db->update("tbl_galeri",$up,$id);

					$this->session->set_flashdata('update','ok');
					redirect("sistem/galeri");
				}
				else
				{
					$config['upload_path'] = './images/galeri/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						
						$source             = "./images/galeri/".$data['file_name'] ;
					
			 
						
						chmod($source, 0777) ;
			 
						
						
						$in_data['nama_galeri'] 		= $this->input->post('nama_galeri');
						$in_data['kategori_galeri_id'] 	= $this->input->post('kategori_galeri_id');
						$in_data['gambar'] 				= $data['file_name'];
						
						$this->db->update("tbl_galeri",$in_data,$id);
				
						
						$this->session->set_flashdata('update','OK');
						redirect("sistem/galeri");
						
					}
					else 
					{
						$id = $this->uri->segment(3);

						$query =  $this->sistem_model->EditGaleri($id);

						foreach ($query->result_array() as $value) {
							$data['id_galeri'] 			=  $value['id_galeri'];
							$data['nama_galeri'] 		=  $value['nama_galeri'];
							$data['gambar'] 			=  $value['gambar'];
							$data['kategori_galeri_id'] =  $value['kategori_galeri_id'];
						}

						$data['kategori'] =  $this->sistem_model->KategoriGaleri();

						$this->template_system->load('template_system','sistem/data/galeri/edit',$data);
					}
				}

		}
		else{
			redirect('sistem');

		}

	}

	public function galeri_delete() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteGaleri($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/galeri");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Galeri



	//Awal Kelas Mobil

	public function kelas_mobil() {

		if($this->session->userdata("id_user")!=="" ) {
			$data['kelas_mobil']	= $this->sistem_model->KelasMobil();
			$this->template_system->load('template_system','sistem/data/kelas_mobil/index',$data);
		}
		else{
			redirect('sistem');

		}
	} 

	public function kelas_kamar_tambah () {

		if($this->session->userdata("id_user")!=="" ) {
			
			$this->template_system->load('template_system','sistem/data/kelas_mobil/add');
		}
		else{
			redirect('sistem');

		}

	}

	public function kelas_kamar_simpan () {

		if($this->session->userdata("id_user")!=="" ) {

			$this->form_validation->set_rules('nama_kelas_mobil', 'Category Gallery', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_system->load('template_system','sistem/data/kelas_mobil/add');

			}
			else {

				$in['nama_kelas_mobil'] = $this->input->post('nama_kelas_mobil');
								
				$this->db->insert("tbl_kelas_mobil",$in);

				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/kelas_mobil");	
			}
			
			
		}
		else{
			redirect('sistem');

		}

	}

	public function kelas_kamar_delete() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteKelasMobil($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/kelas_mobil");

		}
		else{
			redirect('sistem');

		}

	}

	public function kelas_kamar_edit() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->EditKelasMobil($id);

			foreach ($query->result_array() as $value) {
				$data['id_kelas_mobil'] 	=  $value['id_kelas_mobil'];
				$data['nama_kelas_mobil'] =  $value['nama_kelas_mobil'];
				
			}

			$this->template_system->load('template_system','sistem/data/kelas_mobil/edit',$data);
		


		}
		else{
			redirect('sistem');

		}

	}


	public function kelas_kamar_update() {

		if($this->session->userdata("id_user")!=="" ) {

			$id['id_kelas_mobil'] 	=  $this->input->post("id_kelas_mobil");
			$up['nama_kelas_mobil'] 	=  $this->input->post("nama_kelas_mobil");

			$this->db->update("tbl_kelas_mobil",$up,$id);

			$this->session->set_flashdata('update','ok');
			redirect("sistem/kelas_mobil");

		}
		else{
			redirect('sistem');

		}

	}


	//Akhir Kelas Mobil

	//Awal mobil 
	public function mobil () {

		if($this->session->userdata("id_user")!=="" ) {

			$data['mobil'] =  $this->sistem_model->Mobil();

			$this->template_system->load('template_system','sistem/data/mobil/index',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function mobil_tambah() {

		if($this->session->userdata("id_user")!=="" ) {

			
			$data['kelas_mobil']	= $this->sistem_model->KelasMobil();
			$this->template_system->load('template_system','sistem/data/mobil/add',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function kamar_simpan() {

		if($this->session->userdata("id_user")!=="" ) {

			
			$this->form_validation->set_rules('kelas_mobil_id','Kelas Mobil','required');
			$this->form_validation->set_rules('nama_mobil','Nama Mobil','required');
			$this->form_validation->set_rules('harga_mobil','Harga Mobil','required');
			$this->form_validation->set_rules('spesifikasi_mobil','Fasilitas Mobil','required');
			
		

			if ($this->form_validation->run()==FALSE) {

				
				$data['kelas_mobil']	= $this->sistem_model->KelasMobil();
				$this->template_system->load('template_system','sistem/data/mobil/add',$data);

			}
			else {

					$in['nama_mobil'] 		= $this->input->post('nama_mobil');
					$in['harga_mobil'] 		= $this->input->post('harga_mobil');
					$in['spesifikasi_mobil'] 	= $this->input->post('spesifikasi_mobil');
					$in['kelas_mobil_id'] 	= $this->input->post('kelas_mobil_id');
									
							
					$this->db->insert("tbl_mobil",$in);
							
					$this->session->set_flashdata('berhasil','OK');
					redirect("sistem/mobil");
							
			}

		}
		else{
			redirect('sistem');

		}

	}

	public function kamar_edit() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);

			$query =  $this->sistem_model->EditKamar($id);

			foreach ($query->result_array() as $value) {
				$data['id_mobil'] 			=  $value['id_mobil'];
				$data['nama_mobil'] 		=  $value['nama_mobil'];
				$data['harga_mobil'] 		=  $value['harga_mobil'];
				$data['spesifikasi_mobil'] 	=  $value['spesifikasi_mobil'];
				$data['kelas_mobil_id'] 	=  $value['kelas_mobil_id'];
				
			}

			$data['kelas_mobil']	= $this->sistem_model->KelasMobil();
			$this->template_system->load('template_system','sistem/data/mobil/edit',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function kamar_update() {

		if($this->session->userdata("id_user")!=="" ) {

			$id['id_mobil'] = $this->input->post("id_mobil");

		
			$in_data['nama_mobil'] 	= $this->input->post('nama_mobil');
			$in_data['harga_mobil'] 	= $this->input->post('harga_mobil');
			$in_data['spesifikasi_mobil'] 	= $this->input->post('spesifikasi_mobil');
			$in_data['kelas_mobil_id'] 	= $this->input->post('kelas_mobil_id');
						
			$this->db->update("tbl_mobil",$in_data,$id);
				
						
			$this->session->set_flashdata('update','OK');
			redirect("sistem/mobil");
						
					
		}
		else{
			redirect('sistem');

		}

	}

	public function kamar_delete() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteKamar($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/mobil");


		}
		else{
			redirect('sistem');

		}

	}

	public function mobil_gambar () {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);

			$data['mobil_gambar'] = $this->sistem_model->KamarGambar($id);

			$query =  $this->sistem_model->KamarId($id);

			foreach ($query->result_array() as $value) {
				$data['id_mobil'] 			=  $value['id_mobil'];
				$data['nama_mobil'] 		=  $value['nama_mobil'];
				$data['harga_mobil'] 		=  $value['harga_mobil'];
				$data['spesifikasi_mobil'] 	=  $value['spesifikasi_mobil'];
				$data['kelas_mobil_id'] 	=  $value['kelas_mobil_id'];
				$data['nama_kelas_mobil'] 	=  $value['nama_kelas_mobil'];
				
			}

			$this->template_system->load('template_system','sistem/data/mobil_gambar/index',$data);


		}
		else{
			redirect('sistem');

		}

	}

	public function kamar_gambar_simpan () {

		if($this->session->userdata("id_user")!=="" ) {


					$config['upload_path'] = './images/mobil_gambar/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';
					
			 
					$this->load->library('upload', $config);
	 				if ($this->upload->do_upload("userfile")) {
					
						$data	 	= $this->upload->data();
			 
						
						$source             = "./images/mobil_gambar/".$data['file_name'] ;
						
						chmod($source, 0777) ;
						
						
						$in['nama_mobil_gambar'] 	= $data['file_name'];
						$in['mobil_id'] 			= $this->input->post('mobil_id');
						
						
						
						$this->db->insert("tbl_mobil_gambar",$in);
						
						$this->session->set_flashdata('berhasil','OK');
						
						$id = $this->input->post('mobil_id');
						redirect('sistem/mobil_gambar/'.$id);

						
					}

					else 
					{
						$id = $this->input->post('mobil_id');

						$this->session->set_flashdata('gagal','OK');

						redirect('sistem/mobil_gambar/'.$id);
					}

				
				

		

		}
		else{
			redirect('sistem');

		}

	}

	public function kamar_gambar_delete () {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);
			$id2 = $this->uri->segment(4);
			$this->sistem_model->DeleteKamarGambar($id);

			$this->session->set_flashdata('hapus','ok');
			redirect('sistem/mobil_gambar/'.$id2);


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Mobil

	//Awal Ganti Password

	public function ganti_password() {
		if($this->session->userdata("logged_in")!=="" ) {


			$this->template_system->load('template_system','sistem/data/ganti_password/index');


		}
		else{
			redirect('sistem/logout');

		}
	}

	public function ganti_password_update () {

		if($this->session->userdata("logged_in")!=="" ) {

			$this->form_validation->set_rules('password_lama','Password Lama','required');
			$this->form_validation->set_rules('password_baru','Password Baru','required');
			$this->form_validation->set_rules('password_konfirmasi','Confirmasi Password','required');
			
		

			if ($this->form_validation->run()==FALSE) {


				$this->template_system->load('template_system','sistem/data/ganti_password/index');

			}
			else {

				$id_user = $this->session->userdata("id_user");
				$password_lama =  md5($this->input->post('password_lama'));

				$query = $this->sistem_model->GetUserId($id_user);

				// echo $this->db->last_query();
				// die();

				foreach ($query->result_array() as $value) {
					$password = $value['password_user'];
				}

				if ($password_lama!=$password) {

					$this->session->set_flashdata('salah','ok');
					redirect('sistem/ganti_password');

				}
				else {

					$password_baru 			= $this->input->post('password_baru');
					$password_konfirmasi 	= $this->input->post('password_konfirmasi');

					if ($password_baru!=$password_konfirmasi) {

						$this->session->set_flashdata('tidaksama','ok');
						redirect('sistem/ganti_password');

					}
					else {

						$id_user 		= $this->session->userdata("id_user");
						$password 		= md5($this->input->post('password_baru'));

						$this->sistem_model->UpdateUser($id_user,$password);

						$this->session->set_flashdata('sukses','ok');
						redirect('sistem/ganti_password');


					}

				}

			}



		}
		else{
			redirect('sistem/logout');

		}

	}


	//Akhir Ganti Password

	//Awal User Group	

	public function user_group() {

		if($this->session->userdata("id_user")!=="" ) {
			$data['user_group']	= $this->sistem_model->UserGroup();
			$this->template_system->load('template_system','sistem/data/user_group/index',$data);
		}
		else{
			redirect('sistem');

		}
	} 

	public function user_group_tambah () {

		if($this->session->userdata("id_user")!=="" ) {
			
			$this->template_system->load('template_system','sistem/data/user_group/add');
		}
		else{
			redirect('sistem');

		}

	}

	public function user_group_simpan () {

		if($this->session->userdata("id_user")!=="" ) {

			$this->form_validation->set_rules('nama_user_group', 'Category Gallery', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_system->load('template_system','sistem/data/user_group/add');

			}
			else {

				$in['nama_user_group'] = $this->input->post('nama_user_group');
								
				$this->db->insert("tbl_user_group",$in);

				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/user_group");	
			}
			
			
		}
		else{
			redirect('sistem');

		}

	}

	public function user_group_delete() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteUserGroup($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/user_group");

		}
		else{
			redirect('sistem');

		}

	}

	public function user_group_edit() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->EditUserGroup($id);

			foreach ($query->result_array() as $value) {
				$data['id_user_group'] 	=  $value['id_user_group'];
				$data['nama_user_group'] =  $value['nama_user_group'];
				
			}

			$this->template_system->load('template_system','sistem/data/user_group/edit',$data);
		


		}
		else{
			redirect('sistem');

		}

	}


	public function user_group_update() {

		if($this->session->userdata("id_user")!=="" ) {

			$id['id_user_group'] 	=  $this->input->post("id_user_group");
			$up['nama_user_group'] 	=  $this->input->post("nama_user_group");

			$this->db->update("tbl_user_group",$up,$id);

			$this->session->set_flashdata('update','ok');
			redirect("sistem/user_group");

		}
		else{
			redirect('sistem');

		}

	}


	//Akhir User Group

	//Awal User 
	public function user () {

		if($this->session->userdata("id_user")!=="" ) {

			$data['user']	= $this->sistem_model->User();

			$this->template_system->load('template_system','sistem/data/user/index',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function user_tambah() {

		if($this->session->userdata("id_user")!=="" ) {

			$data['user_group']	= $this->sistem_model->UserGroup();

			$this->template_system->load('template_system','sistem/data/user/add',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function user_simpan() {

		if($this->session->userdata("id_user")!=="" ) {

			$this->form_validation->set_rules('nama_user','Nama User','required');
			$this->form_validation->set_rules('email_user','Email','required');
			$this->form_validation->set_rules('telp_user','Telp','required');
			$this->form_validation->set_rules('username_user','Username','required');
			$this->form_validation->set_rules('password_user','Password','required');
			$this->form_validation->set_rules('user_group_id','User Group','required');
			
		

			if ($this->form_validation->run()==FALSE) {

				$data['user_group']	= $this->sistem_model->UserGroup();

				$this->template_system->load('template_system','sistem/data/user/add',$data);

			}
			else {

		
					$in['nama_user'] 		= $this->input->post('nama_user');
					$in['email_user'] 		= $this->input->post('email_user');
					$in['telp_user'] 		= $this->input->post('telp_user');
					$in['username_user'] 	= $this->input->post('username_user');
					$in['password_user'] 	= md5($this->input->post('password_user'));
					$in['user_group_id'] 	= $this->input->post('user_group_id');	
							
					$this->db->insert("tbl_user",$in);
							
					$this->session->set_flashdata('berhasil','OK');
					redirect("sistem/user");
			}
		

		}
		else{
			redirect('sistem');

		}

	}

	public function user_edit() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);

			$query =  $this->sistem_model->EditUser($id);

			foreach ($query->result_array() as $value) {
				$data['id_user'] 		=  $value['id_user'];
				$data['nama_user'] 		=  $value['nama_user'];
				$data['email_user'] 	=  $value['email_user'];
				$data['telp_user'] 		=  $value['telp_user'];
				$data['username_user'] 	=  $value['username_user'];
				$data['password_user'] 	=  $value['password_user'];
				$data['user_group_id'] 	=  $value['user_group_id'];
			}

			$data['user_group']	= $this->sistem_model->UserGroup();

			$this->template_system->load('template_system','sistem/data/user/edit',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function user_update() {

		if($this->session->userdata("id_user")!=="" ) {

			$password = $this->input->post('password_user');

			if ($password=="") {

				$id['id_user'] = $this->input->post("id_user");
								
				$in_data['nama_user'] 		= $this->input->post('nama_user');
				$in_data['email_user'] 		= $this->input->post('email_user');
				$in_data['telp_user'] 		= $this->input->post('telp_user');
				$in_data['username_user'] 	= $this->input->post('username_user');
				$in_data['user_group_id'] 	= $this->input->post('user_group_id');
				
							
				$this->db->update("tbl_user",$in_data,$id);
					
							
				$this->session->set_flashdata('update','OK');
				redirect("sistem/user");
			}
			else {


				$id['id_user'] = $this->input->post("id_user");
								
				$in_data['nama_user'] 		= $this->input->post('nama_user');
				$in_data['email_user'] 		= $this->input->post('email_user');
				$in_data['telp_user'] 		= $this->input->post('telp_user');
				$in_data['username_user'] 	= $this->input->post('username_user');
				$in_data['password_user'] 	= md5($this->input->post('password_user'));
				$in_data['user_group_id'] 	= $this->input->post('user_group_id');
				
							
				$this->db->update("tbl_user",$in_data,$id);
					
							
				$this->session->set_flashdata('update','OK');
				redirect("sistem/user");
			}

						
					


		}
		else{
			redirect('sistem');

		}

	}

	public function user_delete() {

		if($this->session->userdata("id_user")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteUser($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/user");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir User


	//Awal Tentang Kami
	public function tentang_kami() {
		if($this->session->userdata("id_user")!=="" ) {

			$data['tentang_kami'] = $this->sistem_model->TentangKami();

			$this->template_system->load('template_system','sistem/data/tentang_kami/index',$data);


		}
		else{
			redirect('sistem');

		}

	}

	public function tentang_kami_update () {

		if($this->session->userdata("id_user")!=="" ) {

			

		if(empty($_FILES['userfile']['name']))
				{
					$id['id_tentang_rental'] = $this->input->post("id_tentang_rental");
					
						$up['nama_rental'] 			= $this->input->post('nama_rental');
						$up['alamat_tentang_rental'] = $this->input->post('alamat_tentang_rental');
						$up['email_tentang_rental'] 	= $this->input->post('email_tentang_rental');
						$up['telp_tentang_rental'] 	= $this->input->post('telp_tentang_rental');
						$up['isi_tentang_rental'] 	= $this->input->post('isi_tentang_rental');
						$up['fb'] 					= $this->input->post('fb');
						$up['tw'] 					= $this->input->post('tw');
						$up['gp'] 					= $this->input->post('gp');
						
						$this->db->update("tbl_tentang_rental",$up,$id);

					$this->session->set_flashdata('update','ok');
					redirect("sistem/tentang_kami");
				}
				else
				{
					$config['upload_path'] = './images/tentang_kami/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						
						$source             = "./images/tentang_kami/".$data['file_name'] ;
					
			 
						
						chmod($source, 0777) ;
			 
						$id['id_tentang_rental'] 	= $this->input->post("id_tentang_rental");
						
						$up['nama_rental'] 			= $this->input->post('nama_rental');
						$up['alamat_tentang_rental'] = $this->input->post('alamat_tentang_rental');
						$up['email_tentang_rental'] 	= $this->input->post('email_tentang_rental');
						$up['telp_tentang_rental'] 	= $this->input->post('telp_tentang_rental');
						$up['isi_tentang_rental'] 	= $this->input->post('isi_tentang_rental');
						$up['fb'] 					= $this->input->post('fb');
						$up['tw'] 					= $this->input->post('tw');
						$up['gp'] 					= $this->input->post('gp');
						$up['logo'] 				= $data['file_name'];
						
						$this->db->update("tbl_tentang_rental",$up,$id);
				
						
						$this->session->set_flashdata('update','OK');
						redirect("sistem/tentang_kami");
						
					}
					else 
					{
						$data['tentang_kami'] = $this->sistem_model->TentangKami();

						$this->template_system->load('template_system','sistem/data/tentang_kami/index',$data);
					}
				}

		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Tentang Kami


	//Awal saran


	public function saran() {

		if($this->session->userdata("id_user")!=="" ) {

			$data['saran'] = $this->sistem_model->Saran();

			$this->template_system->load('template_system','sistem/data/saran/index',$data);


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Saran

	//Awal rental

	public function rental() {

		if($this->session->userdata("id_user")!=="" ) {

			$data['rental'] = $this->sistem_model->rental();

			$this->template_system->load('template_system','sistem/data/rental/index',$data);

		}
		else{
			redirect('sistem');

		}
	}

	public function new_rental () {

		if($this->session->userdata("id_user")!=="" ) {

			$data['new_rental'] = $this->sistem_model->NewReservasi();

			$this->template_system->load('template_system','sistem/data/new_rental/index',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function new_reservasi_in () {

		if($this->session->userdata("id_user")!=="" ) {

			$id['id_rental'] 		= $this->uri->segment(3);
			$up['status_rental'] 	= $this->uri->segment(4);


			$this->db->update("tbl_rental",$up,$id);

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->ReservasiId($id);

			foreach ($query->result_array() as $value) {
				$id_mobil['id_mobil'] = $value['mobil_id'];
			}

			$up2['status_mobil'] 	= $this->uri->segment(4);


			$this->db->update("tbl_mobil",$up2,$id_mobil);


				
						
			$this->session->set_flashdata('in','OK');
			redirect("sistem/new_rental");



		}
		else{
			redirect('sistem');

		}

	}

	public function new_reservasi_out () {

		if($this->session->userdata("id_user")!=="" ) {

			// $id['id_rental'] 		= $this->uri->segment(3);
			// $up['status_rental'] 	= $this->uri->segment(4);


			// $this->db->update("tbl_rental",$up,$id);

			// $id = $this->uri->segment(3);

			// $query = $this->sistem_model->ReservasiId($id);

			// foreach ($query->result_array() as $value) {
			// 	$id_mobil['id_mobil'] = $value['mobil_id'];
			// }

			// $up2['status_mobil'] 	= 0;


			// $this->db->update("tbl_mobil",$up2,$id_mobil);
				
						
			// $this->session->set_flashdata('out','OK');
			// redirect("sistem/new_rental");

			$id		= $this->uri->segment(3);

			$query						=  $this->sistem_model->ReservasiId($id);

			foreach ($query->result_array() as $value) {
				$data['id_rental'] 			= $value['id_rental'];
				$data['nama_rental']	 		= $value['nama_rental'];
				$data['telp_rental'] 		= $value['telp_rental'];
				$data['alamat_rental'] 		= $value['alamat_rental'];
				$data['tgl_rental_masuk']	= $value['tgl_rental_masuk'];
				$data['tgl_rental_kembali'] 	= $value['tgl_rental_kembali'];
				$data['id_mobil'] 				= $value['id_mobil'];
				$data['nama_mobil'] 			= $value['nama_mobil'];
				$data['harga_mobil'] 			= $value['harga_mobil'];
				$data['status_mobil'] 			= $value['status_mobil'];
				$data['waktu'] 					= $value['waktu'];
			}
			$data['status_rental']	= $this->uri->segment(4);

			$this->template_system->load('template_system','sistem/data/new_rental/out',$data);



		}
		else{
			redirect('sistem');

		}

	}

	public function new_reservasi_out_simpan () {

		if($this->session->userdata("id_user")!=="" ) {

			//Update Status rental
			$id['id_rental'] 		= $this->input->post("id_rental");
			$up['status_rental'] 	= $this->input->post("status_rental");
			$this->db->update("tbl_rental",$up,$id);


			//Update Status Mobil
			$id_mobil['id_mobil'] 	= $this->input->post("id_mobil");
			$up2['status_mobil'] 	= 0;
			$this->db->update("tbl_mobil",$up2,$id_mobil);


			//Insert into rental pembayaran
			$in['tgl_pembayaran'] 		= date('Y-m-d');
			$in['nominal_pembayaran'] 	= $this->input->post("total_bayar");
			$in['uang_bayar'] 			= $this->input->post("uang_bayar");
			$in['kembalian'] 			= $this->input->post("kembalian");
			$in['rental_id'] 		= $this->input->post("id_rental");
			$this->db->insert("tbl_rental_pembayaran",$in);
				
						
			$this->session->set_flashdata('out','OK');
			redirect("sistem/new_rental");

		}
		else{
			redirect('sistem');

		}

	}

	public function new_reservasi_perpanjang () {

		if($this->session->userdata("id_user")!=="" ) {

			$id		= $this->uri->segment(3);

			$query						=  $this->sistem_model->ReservasiId($id);

			foreach ($query->result_array() as $value) {
				$data['id_rental'] 			= $value['id_rental'];
				$data['nama_rental']	 		= $value['nama_rental'];
				$data['telp_rental'] 		= $value['telp_rental'];
				$data['alamat_rental'] 		= $value['alamat_rental'];
				$data['tgl_rental_masuk']	= tgl_balik($value['tgl_rental_masuk']);
				$data['tgl_rental_kembali'] 	= tgl_balik($value['tgl_rental_kembali']);
				$data['id_mobil'] 				= $value['id_mobil'];
				$data['nama_mobil'] 			= $value['nama_mobil'];
				$data['harga_mobil'] 			= $value['harga_mobil'];
				$data['status_mobil'] 			= $value['status_mobil'];
				$data['waktu'] 					= $value['waktu'];
			}

			

			$this->template_system->load('template_system','sistem/data/new_rental/edit',$data);


		}
		else{
			redirect('sistem');

		}

	}

	public function new_reservasi_perpanjang_simpan () {
		if($this->session->userdata("id_user")!=="" ) {

			$id['id_rental'] 		= $this->input->post("id_rental");
			$up['tgl_rental_masuk'] 	= tgl_luar($this->input->post("tgl_rental_masuk"));
			$up['tgl_rental_kembali'] = tgl_luar($this->input->post("tgl_rental_kembali"));
			$this->db->update("tbl_rental",$up,$id);

			$this->session->set_flashdata('perpanjang','OK');
			redirect("sistem/new_rental");


		}
		else{
			redirect('sistem');

		}

	}

	public function new_reservasi_tambah() {

		if($this->session->userdata("id_user")!=="" ) {

			$data['mobil']	= $this->sistem_model->KamarKosong();

			$this->template_system->load('template_system','sistem/data/new_rental/add',$data);


		}
		else{
			redirect('sistem');

		}

	}

	public function new_reservasi_simpan () {

		if($this->session->userdata("id_user")!=="" ) {

			$this->form_validation->set_rules('tgl_rental_masuk','Tanggal Rental','required');
			$this->form_validation->set_rules('tgl_rental_kembali','Tanggal Kembali','required');
			$this->form_validation->set_rules('mobil_id','Mobil','required');
			$this->form_validation->set_rules('nama_rental','Nama','required');
			$this->form_validation->set_rules('telp_rental','Telprequired');
			$this->form_validation->set_rules('alamat_rental','Alamat','required');
			
		

			if ($this->form_validation->run()==FALSE) {

				$data['mobil']	= $this->sistem_model->KamarKosong();

				$this->template_system->load('template_system','sistem/data/new_rental/add',$data);

			}
			else {

		
					$in['tgl_rental_masuk'] 		= tgl_luar($this->input->post('tgl_rental_masuk'));
					$in['tgl_rental_kembali'] 	= tgl_luar($this->input->post('tgl_rental_kembali'));
					$in['mobil_id'] 				= $this->input->post('mobil_id');
					$in['nama_rental'] 			= $this->input->post('nama_rental');
					$in['telp_rental'] 			= $this->input->post('telp_rental');
					$in['alamat_rental'] 		= $this->input->post('alamat_rental');
					
							
					$this->db->insert("tbl_rental",$in);
							
					$this->session->set_flashdata('berhasil','OK');
					redirect("sistem/new_rental");
			}


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir rental

	
}