<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patrocinadores extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		setlocale(LC_ALL,"es_MX","es_MX","esp");
		$this->load->model('model_categoria');
		$this->load->model('model_empresas');
		
	}
	
	public function index()
	{
		$data['fondo'] = 'bg1.png'; 
		$this->load->view('view_patrocinadores',$data);
	}
	
	public function pv()
	{
		$data['fondo'] = 'bg1.png'; 
		$data['empresas'] = $this->model_empresas->getPuntoVenta()->result();
		$this->load->view('view_pv',$data);
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */