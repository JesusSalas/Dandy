<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		setlocale(LC_ALL,"es_MX","es_MX","esp");
		$this->load->model('model_clientes');
		
	}
	
	public function index()
	{
		$data['fondo'] = ''; 
		$data['categorias'] = $this->model_categoria->get()->result();
		$this->load->view('main',$data);
	}
	
	public function add(){
				
		//Receive data
		$data['Folio']	='';
		$data['Puntos'] ='';
		$data['Fecha'] ='';
		$data['FechaV'] ='';
		$data['Nombre'] ='';
		$data['Telefono'] ='';
		$data['Direccion'] ='';
		$data['Correo']	='';
		$data['idMembrecia'] ='';
		
		//recover data from th form
		$data['Folio'] = $this->input->post('Folio', TRUE);
		$data['Puntos'] = $this->input->post('Puntos', TRUE);
		$data['Fecha'] = date('Y-m-d');
		$data['FechaV'] = date('Y-m-d', mktime(0, 0, 0, date('m') + 1, date('d') , date('Y')));
		$data['Nombre'] = $this->input->post('Nombre', TRUE);
		$data['Telefono'] = $this->input->post('Telefono', TRUE);
		$data['Direccion'] = $this->input->post('Direccion', TRUE);
		$data['Correo'] = $this->input->post('Correo', TRUE);
		$data['idMembresia'] ='10989';
		
		
		$this->model_clientes->insert($data['Folio'], $data['Puntos'], $data['Fecha'],
		                             $data['FechaV'], $data['Nombre'], $data['Telefono'], $data['Direccion'], $data['Correo'], 
									 $data['idMembresia']);
		
		$this->load->view('view_inicio');
			
	}
	
	public function modify(){
		
		//identificar empresa
		$data['idFolio']	= $this->uri->segment(3);
		
		$data['cliente'] = $this->model_empresa->getByFolio($data['Folio'])->result();
		
		//Receive data
		$data['Folio']	='';
		$data['Puntos'] ='';
		$data['Fecha'] ='';
		$data['FechaV'] ='';
		$data['Nombre'] ='';
		$data['Telefono'] ='';
		$data['Direccion'] ='';
		$data['Correo']	='';
		$data['idMembrecia'] ='';
		
		
		//recover data from th form
		$data['Folio'] = $this->input->post('Folio', TRUE);
		$data['Puntos'] = $this->input->post('Puntos', TRUE);
		$data['Fecha'] = $this->input->post('Fecha', TRUE);
		$data['FechaV'] = $this->input->post('FechaV', TRUE);
		$data['Nombre'] = $this->input->post('Nombre', TRUE);
		$data['Telefono'] = $this->input->post('Telefono', TRUE);
		$data['Direccion'] = $this->input->post('Direccion', TRUE);
		$data['Correo'] = $this->input->post('Correo', TRUE);
		$data['idMembresia'] = $this->input->post('idMembresia', TRUE);
			
		$this->model_clientes->update($data['Folio'], $data['Puntos'], $data['Fecha'],
		                             $data['FechaV'], $data['Nombre'], $data['Direccion'], $data['Correo'], 
									 $data['idMembresia']);
		}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */