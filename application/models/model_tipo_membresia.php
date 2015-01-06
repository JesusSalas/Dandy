<?php
class Model_empresas extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
	
    function get(){
        $consulta = $this->db->get('TipoMembresia');
        return $consulta;
    }
	
	
	
	function getByID($idEmpresa){
        $consulta = $this->db->get_where('TipoMembresia', array('idMembresia' => $idMembresia));
        return $consulta;
    }
    

    function insert($Nombre, $Precio){
        
		$dato = array('Nombre' => $Nombre, 'Precio' => $Precio);
					  
        $str = $this->db->insert_string('TipoMembresia', $dato);
        $this->db->query($str);
		
		return true;
    }
	
	
	function update($idMembresia,$Nombre, $Precio){
		
       
        $data = array('idMembresia' => $idMembresia, 'Nombre' => $Nombre, 'Precio' => $Precio);
					  
        $condicion =  "idMembresia = '$idMembresia'";
        
        $str = $this->db->update_string('TipoMembresia', $data, $condicion);
        
        if($this->db->query($str))
		return TRUE;
    }

    function delete($idEmpresa){
        $this->db->where(array('idMembresia' => $idEmpresa));
		$this->db->delete('TipoMembresia'); 
    }
}
?>
