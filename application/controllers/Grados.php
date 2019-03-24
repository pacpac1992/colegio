<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Grados_model');

		$this->menu = array("menu" => $this->Home_model->menu_lateral());
	}

	public function index($offset = 0){
		$search = '';
		if ($this->input->post('search')) {
			$search = $this->input->post('search');
		}

		$config['base_url'] = base_url('grados/index');
		$config['per_page'] = 5;
		$config['total_rows'] = count($this->Grados_model->count_grados());
		$this->pagination->initialize($config);

		$this->vistas('Grados','grados/index',array('grados'=> $this->Grados_model->get_all($config['per_page'],$offset,$search)));
	}

	public function new(){
		$this->vistas('Nuevo Grado','grados/new');
	}

	public function create(){
		$nombre = $this->input->post('nombre',TRUE);
		$inicio = $this->input->post('inicio',TRUE);
		$fin = $this->input->post('fin',TRUE);
		$tipo = $this->input->post('tipo');

		// Validaciones
		$this->form_validation->set_rules('nombre','Nombre','required|is_unique[grados.nombre]');
		$this->form_validation->set_rules('tipo','Tipo','required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nombre' => $nombre,
				'inicio' => $inicio,
				'fin' => $fin,
				'tipo' => $tipo,
				'status' => 'Inactivo'
			);

			if ($this->Grados_model->store($data)) {
				$this->session->set_flashdata('Success','Registro guardado');
				redirect(base_url().'grados/index');
			}else{
				$this->session->set_flashdata('Error','Registro no guardado');
				redirect(base_url().'grados/new');
			}
		} else {
			$this->new();
		}
	}
	
	public function show($id){
		$this->vistas('Nuevo Grado','grados/show',array('grado'=>$this->Grados_model->show($id)));
	}

	public function edit($id){
		$this->vistas('Editar Grado','grados/edit',array('grado'=>$this->Grados_model->show($id)));
	}

	public function update(){
		$id= $this->input->post('id',TRUE);
		$nombre = $this->input->post('nombre',TRUE);
		$inicio = $this->input->post('inicio',TRUE);
		$fin = $this->input->post('fin',TRUE);
		$tipo = $this->input->post('tipo',TRUE);

		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('tipo','Tipo','required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nombre' => $nombre,
				'inicio' => $inicio,
				'fin' => $fin,
				'tipo' => $tipo,
			);

			if ($this->Grados_model->update($id,$data)) {
				$this->session->set_flashdata('Success','Registro guardado');
				redirect(base_url().'grados/index');
			}else{
				$this->session->set_flashdata('Error','Registro no guardado');
				redirect(base_url().'grados/edit/'.$id);
			}
		} else {
			$this->edit($id);
		}
	}

	public function delete($id){
		if($this->Grados_model->delete($id)){
			$this->session->set_flashdata('Success','Registro eliminado');
			redirect(base_url().'grados/index'); 
		}else{
			$this->session->set_flashdata('Error','Registro no eliminado');
			redirect(base_url().'grados/index');
		}
	}

	/* Metodos privados */
	private function vistas($title='Dashboard',$vista='home/index',$data=null){
		$this->load->view('layouts/header',array('title'=>$title));
		$this->load->view($vista,$data);
		$this->load->view('layouts/footer',$this->menu);
	}

}

/* End of file Grados.php */
/* Location: ./application/controllers/Grados.php */