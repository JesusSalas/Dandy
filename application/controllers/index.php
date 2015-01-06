<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		setlocale(LC_ALL,"es_MX","es_MX","esp");
		$this->load->model('model_categoria');
		$this->load->model('model_empresas');
		$this->load->model('model_promociones');
		$this->load->model('qlink_emp');
		
	}
	
	public function index()
	{
		$data['fondo'] = ''; 
		$data['categorias'] = $this->model_categoria->get()->result();
		$this->load->view('main',$data);
	}
	
	public function select()
	{
		$idCategoria = $_REQUEST['idCategoria'];
		$data['fondo'] = ''; 
		
		$data['links'] = $this->qlink_emp->getByCategoria($idCategoria)->result();
		$data['empresas'] = $this->model_empresas->get()->result();
		$data['idCategoria'] = $idCategoria;
			
		$this->load->view('view_logos',$data);
	}
	
	public function selectOne()
	{
		$idEmpresa = $_REQUEST['idEmpresa'];
		$idCategoria = $_REQUEST['idCategoria'];
		$data['fondo'] = 'bg1.png'; 
		
		$data['empresa'] = $this->model_empresas->getByID($idEmpresa)->result();
		$data['promociones'] = $this->model_promociones->getByEmpresa($idEmpresa)->result();
		
		if($idCategoria == 1)
			$data['header'] = 'headerAlimentos.png';
		if($idCategoria == 2)
			$data['header'] = 'headerVidaNocturna.png';
		if($idCategoria == 3)
			$data['header'] = 'headerShopping.png';
		if($idCategoria == 4)
			$data['header'] = 'headerEntretenimiento.png';
		if($idCategoria == 5)
			$data['header'] = 'headerActividades.png';
		
		$this->load->view('view_lugar',$data);
	}
	
	public function add(){
				
		//Receive data
		$data['idCategoria']	='';
		$data['Nombre'] ='';
		$data['Direccion'] ='';
		$data['Telefono'] ='';
		$data['Contacto'] ='';
		$data['Facebook'] ='';
		$data['Twitter'] ='';
		$data['Foto']	='';
		$data['Mapa'] ='';
		$data['Menu'] ='';
		$data['Informacion']	='';
		$data['Logo'] ='';
		$data['Patrocinio'] ='';
		$data['PV'] ='';	
		$data['Imagen1'] ='';	
		$data['Imagen2'] ='';	
		$data['Imagen3'] ='';	
		$data['Imagen4'] ='';	
		$data['Imagen5'] ='';	
		$data['Horario'] ='';
		$data['Web'] = '';
		$data['opcion1'] = '';
		$data['opcion2'] = '';
		$data['opcion3'] = '';
		$data['opcion4'] = '';
		$data['opcion5'] = '';
		$data['opcion6'] = '';	
		
		//recover data from th form
		$data['idCategoria'] = 1; //$this->input->post('idCategoria', TRUE);
		$data['Nombre'] = $this->input->post('Nombre', TRUE);
		$data['Direccion'] = $this->input->post('Direccion', TRUE);
		$data['Referencia'] = $this->input->post('Referencia', TRUE);
		$data['Telefono'] = $this->input->post('Telefono', TRUE);
		$data['Contacto'] = $this->input->post('Contacto', TRUE);
		$data['Facebook'] = $this->input->post('Facebook', TRUE);
		$data['Twitter'] = $this->input->post('Twitter', TRUE);
		$data['Foto'] = $this->input->post('Foto', TRUE);
		$data['Mapa'] = $this->input->post('Mapa', TRUE);
		$data['Menu'] = 'menu';//$this->input->post('Menu', TRUE);
		$data['Informacion'] = $this->input->post('Informacion', TRUE);
		$data['Logo'] = $this->input->post('Logo', TRUE);
		$data['PV'] = $this->input->post('PV', TRUE);
		$data['Imagen1'] = $this->input->post('Imagen1', TRUE);
		$data['Imagen2'] = $this->input->post('Imagen2', TRUE);
		$data['Imagen3'] = $this->input->post('Imagen3', TRUE);
		$data['Imagen4'] = $this->input->post('Imagen4', TRUE);
		$data['Imagen5'] = $this->input->post('Imagen5', TRUE);
		$data['Horario'] = $this->input->post('Horario', TRUE);
		$data['Web'] = $this->input->post('Web', TRUE);
		$data['Usuario'] = $this->input->post('Usuario', TRUE);
		$data['Password'] = $this->input->post('Password', TRUE);
		$data['opcion1'] = $this->input->post('option1', TRUE);
		$data['opcion2'] = $this->input->post('option2', TRUE);
		$data['opcion3'] = $this->input->post('option3', TRUE);
		$data['opcion4'] = $this->input->post('option4', TRUE);
		$data['opcion5'] = $this->input->post('option5', TRUE);
		$data['opcion6'] = $this->input->post('option6', TRUE);
			
		$information  = nl2br(htmlspecialchars(stripslashes($data['Informacion'])));
		
		if($data['PV'] == 'YES'){
			$data['PV'] = 1;
		}else{
			$data['PV'] = 0;
		}
		
		$this->model_empresas->insert($data['Nombre'], $data['Direccion'], $data['Referencia'],
		                             $data['Telefono'], $data['Contacto'], $data['Facebook'], $data['Twitter'], 
									 $data['Foto'], $data['Mapa'], $data['Informacion'],$data['Logo'], 
									 $data['PV'], $data['Imagen1'], $data['Imagen2'],
									 $data['Imagen3'], $data['Imagen4'], $data['Imagen5'], $data['Horario'], $data['Web'],
									 $data['Usuario'], $data['Password'], $data['Menu']);
									 		
		$data['empresa'] = $this->model_empresas->getLast()->result();	
		
		foreach($data['empresa'] as $value){
			
			if($data['opcion1'] == 1){
				$this->qlink_emp->insert($value->idEmpresa, 1);
			}
			
			if($data['opcion2'] == 1){
				$this->qlink_emp->insert($value->idEmpresa, 2);
			}
			
			if($data['opcion3'] == 1){
				$this->qlink_emp->insert($value->idEmpresa, 3);
			}
			
			if($data['opcion4'] == 1){
				$this->qlink_emp->insert($value->idEmpresa, 4);
			}
			
			if($data['opcion5'] == 1){
				$this->qlink_emp->insert($value->idEmpresa, 5);
			}
			
			if($data['opcion6'] == 1){
				$this->qlink_emp->insert($value->idEmpresa, 6);
			}
				
		}
			
	}
	
	public function modify(){
		
		//identificar empresa
		$data['idEmpresa']	= $this->uri->segment(3);
		
		$data['empre'] = $this->model_empresa->getSpecific($data['idEmpresa'])->result();
		
		//create variables
		$data['idEmpresa']	='';
		$data['idCategoria'] ='';
		$data['Nombre']	='';
		$data['Direccion'] ='';
		$data['Telefono'] ='';
		$data['Contacto'] ='';
		$data['FaceBook'] ='';
		$data['Twitter'] ='';
		$data['Foto'] ='';
		$data['Mapa'] ='';
		$data['Menu'] ='';
		$data['Informacion'] ='';
		$data['Logo'] ='';
		$data['Patrocinio'] ='';
		$data['PV'] ='';
		
		$data['idEmpresa'] = $this->input->post('idEmpresa', TRUE);
		$data['idCategoria'] = $this->input->post('idCategoria', TRUE);
		$data['Nombre'] = $this->input->post('Nombre', TRUE);
		$data['Direccion'] = $this->input->post('Direccion', TRUE);
		$data['Telefono'] = $this->input->post('Telefono', TRUE);
		$data['Contacto'] = $this->input->post('Contacto', TRUE);
		$data['FaceBook'] = $this->input->post('FaceBook', TRUE);
		$data['Twitter'] = $this->input->post('Twitter', TRUE);
		$data['Foto'] = $this->input->post('Foto', TRUE);
		$data['Mapa'] = $this->input->post('Mapa', TRUE);
		$data['Menu'] = $this->input->post('Menu', TRUE);
		$data['Informacion'] = $this->input->post('Informacion', TRUE);
		$data['Logo'] = $this->input->post('Logo', TRUE);
		$data['Patrocinio'] = $this->input->post('Patrocinio', TRUE);
		$data['PV'] = $this->input->post('PV', TRUE);
		
		$data['idEmpresa'] = $this->input->post('idEmpresa', TRUE);
		$data['idCategoria'] = $this->input->post('idCategoria', TRUE);
		$data['Nombre'] = $this->input->post('Nombre', TRUE);
		$data['Direccion'] = $this->input->post('Direccion', TRUE);
		$data['Telefono'] = $this->input->post('Telefono', TRUE);
		$data['Contacto'] = $this->input->post('Contacto', TRUE);
		$data['FaceBook'] = $this->input->post('FaceBook', TRUE);
		$data['Twitter'] = $this->input->post('Twitter', TRUE);
		$data['Foto'] = $this->input->post('Foto', TRUE);
		$data['Mapa'] = $this->input->post('Mapa', TRUE);
		$data['Menu'] = $this->input->post('Menu', TRUE);
		$data['Informacion'] = $this->input->post('Informacion', TRUE);
		$data['Logo'] = $this->input->post('Logo', TRUE);
		$data['Patrocinio'] = $this->input->post('Patrocinio', TRUE);
		$data['PV'] = $this->input->post('PV', TRUE);
			
		$empre = $this->model_empresa->getSpecific($data['idEmpresa'])->result();
		
		$information  = nl2br(htmlspecialchars(stripslashes($data['Informacion'])));
			
		$this->model_empresa->update($data['idEmpresa'], $data['idCategoria'], $data['Nombre'], $data['Direccion'],
		                             $data['Telefono'], $data['Contacto'], $data['FaceBook'], $data['Twitter'], 
									 $data['Foto'], $data['Mapa'], $data['Menu'], $information, $data['Logo'], 
									 $data['Patrocinio'], $data['PV']);
		}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */