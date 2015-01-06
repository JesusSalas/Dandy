<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promociones extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		setlocale(LC_ALL,"es_MX","es_MX","esp");
		$this->load->model('model_promociones');
		$this->load->model('model_empresas');
		
	}
	
	public function index(){ 
		$idEmpresa	= $this->uri->segment(3);
		
		$empresa = $this->model_empresas->getByID($idEmpresa)->result();
		foreach($empresa as $value){
			$data['empresa'] = $value->idEmpresa;
		}
		$this->load->view('view_promociones',$data);
	}
	
	public function add(){
		
		$idEmpresa	= $this->uri->segment(3);
		
		$data['empresa'] = $this->model_empresas->getByID($idEmpresa)->result();
		
		//Receive data
		$data['Fecha']	='';
		$data['idEmpresa'] ='';
		$data['Puntos'] ='';
		$data['Descripcion'] ='';
		$data['Slogan'] ='';
		$data['Foto'] ='';
		
		//recover data from th form
		$data['Fecha'] = $this->input->post('Fecha', TRUE);
		$data['idEmpresa'] = $idEmpresa;
		$data['Puntos'] = $this->input->post('Puntos', TRUE);
		$data['Descripcion'] = $this->input->post('Descripcion', TRUE);;
		$data['Slogan'] = $this->input->post('Slogan', TRUE);
		$data['Foto'] = $this->input->post('promoname', TRUE);
		
		
		$this->model_promociones->insert($data['Fecha'], $data['idEmpresa'], $data['Puntos'],
		                             $data['Descripcion'], $data['Slogan'], $data['Foto']);
		
		$this->load->view('view_admon_main', $data);
			
	}
	
	public function modify(){
		
		//identificar empresa
		$data['idPromociones']	= $this->uri->segment(3);
		
		$data['promociones'] = $this->model_promociones->getByID($data['Folio'])->result();
		
		//Receive data
		$data['Fecha']	='';
		$data['idEmpresa'] ='';
		$data['Puntos'] ='';
		$data['Descripcion'] ='';
		$data['Slogan'] ='';
		$data['Foto'] ='';
		
		//recover data from th form
		$data['Fecha'] = $this->input->post('Fecha', TRUE);
		$data['idEmpresa'] = $this->input->post('idEmpresa', TRUE);
		$data['Puntos'] = $this->input->post('Puntos', TRUE);
		$data['Descripcion'] = $this->input->post('Descripcion', TRUE);;
		$data['Slogan'] = $this->input->post('Slogan', TRUE);
		$data['Foto'] = $this->input->post('promoname', TRUE);
			
		$this->model_promociones->update($data['Fecha'], $data['idEmpresa'], $data['Puntos'],
		                                 $data['Descripcion'], $data['Slogan'], $data['Foto']);
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
