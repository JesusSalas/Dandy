<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		setlocale(LC_ALL,"es_MX","es_MX","esp");
		$this->load->model('model_empresas');	
	}

	public function index(){
		
		$data['Usuario'] = $this->input->post('Usuario', TRUE);
		$data['Password'] = $this->input->post('Password', TRUE);
		
		$data['empresa'] = $this->model_empresas->getByUsuario($data['Usuario'])->result();
		
		foreach($data['empresa'] as $value){
			if($value->Usuario == $data['Usuario']){
				if($value->Password == $data['Password']){
				   $this->load->view('view_admon_main',$data);
				}else{
				}
			}else{
			}
		}
		
	}
	

}
