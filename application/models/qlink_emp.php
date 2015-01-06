<?php
class Qlink_emp extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
	
    function get(){
        $consulta = $this->db->get('Empresa_Categoria');
        return $consulta;
    }
	
	function getByCategoria($idCategoria){
        $consulta = $this->db->get_where('Empresa_Categoria', array('idCategoria' => $idCategoria));
        return $consulta;
    }

    function insert($idEmpresa, $idCategoria){
        
		$dato = array('idEmpresa' => $idEmpresa, 'idCategoria' => $idCategoria,);
					  
        $str = $this->db->insert_string('Empresa_Categoria', $dato);
        $this->db->query($str);
		
		return true;
    }

    function delete($idEmpresa){
        $this->db->where(array('idEmpresa' => $idEmpresa));
		$this->db->delete('Empresa_Categoria'); 
    }
}
?>