<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Puntos extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		setlocale(LC_ALL,"es_MX","es_MX","esp");
	    $this->load->model('model_clientes');
		$this->load->model('model_empresas');
	}
	
	public function index(){ 
		$idEmpresa	= $this->uri->segment(3);
		
		$empresa = $this->model_empresas->getByID($idEmpresa)->result();
		foreach($empresa as $value){
			$data['empresa'] = $value->idEmpresa;
		}
		
		$this->load->view('view_otorgar_puntos',$data);
	}
	
	public function add(){ 

		$this->load->view('view_otorgar_puntos');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
