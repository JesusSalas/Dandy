<?php
class Model_empresas extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
	
    function get(){
        $consulta = $this->db->get('Usuarios');
        return $consulta;
    }
	
	
	
	function getByID($Folio){
        $consulta = $this->db->get_where('Usuarios', array('Folio' => $Folio));
        return $consulta;
    }
    

    function insert($Puntos, $Fecha, $FechaV, $Nombre, $Telefono, $Direccion, $Correo){
        
		$dato = array('Puntos' => $Puntos, 'Fecha' => $Fecha, 'FechaV' => $FechaV, 'Nombre' => $Nombre, 'Telefono' => $Telefono, 
					  'Direccion' => $Direccion, 'Correo' => $Correo);
					  
        $str = $this->db->insert_string('Usuarios', $dato);
        $this->db->query($str);
		
		return true;
    }
	
	
	function update($Folio, $Puntos, $Fecha, $FechaV, $Nombre, $Telefono, $Direccion, $Correo){
		
       
        $data = array('Puntos' => $Puntos, 'Fecha' => $Fecha, 'FechaV' => $FechaV, 'Nombre' => $Nombre, 'Telefono' => $Telefono, 
					  'Direccion' => $Direccion, 'Correo' => $Correo);
					  
        $condicion =  "Folio = '$Folio'";
        
        $str = $this->db->update_string('Usuarios', $data, $condicion);
        
        if($this->db->query($str))
		return TRUE;
    }

    function delete($Folio){
        $this->db->where(array('Folio' => $Folio));
		$this->db->delete('Usuarios'); 
    }
}
?>
