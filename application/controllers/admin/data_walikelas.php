<?php

class data_walikelas extends CI_Controller{

    public function index()
    {
       $data['guru'] = $this->model_guru->tampil_data()->result();
	   $data['walikelas'] = $this->model_guru->tampil_data()->result();
	   $data['list_guru']    = $this->model_guru->list_guru();
	   $data['list_walikelas']    = $this->model_guru->list_walikelas();
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('admin/walikelas', $data);
       $this->load->view('templates_admin/footer');
    }
    public function tambah_guru(){
        $nama_lengkap 	= $this->input->post('nama_guru');
		$domisili	    = $this->input->post('dom_guru');
		$no_hp	        = $this->input->post('nope_guru');
    
		
		
        $data = array(
			'nama_guru' 		=> $nama_lengkap,
			'dom_guru' 		    => $domisili,
			'nope_guru' 		=> $no_hp,
			
        );
       // print_r($data);
        //exit;
        $this->db->insert('guru', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" style="width: 90%;" role="alert"><i class="fas fa-check-circle"></i>
			  Data berhasil ditambahkan!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>');
		redirect('admin/data_walikelas');
        }
        
    public function edit($id)
	{ 
		$where = array('id_guru' =>$id);
		$data['guru'] = $this->model_guru->edit_walikelas($where, 'guru')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_walikelas', $data);
		$this->load->view('templates_admin/footer');

	}
	public function detail_walikelas($id){
		$data['guru'] = $this->model_guru->tampil_data()->result();
		
		$this->load->model('model_guru');
		$detail_walikelas = $this->model_guru->detail_walikelas($id);
		$data['detail_walikelas'] = $detail_walikelas;
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_walikelas' , $data);
		$this->load->view('templates_admin/footer');
	}
}