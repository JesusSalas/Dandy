<?php
class Model_clientes extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
	
    function get(){
        $consulta = $this->db->get('Clientes');
        return $consulta;
    }
	
    function getLast(){
		$this->db->order_by("Folio","desc");
		$this->db->limit(1);
        $consulta = $this->db->get('Clientes');
        return $consulta;
    }
	
	function getByFolio($Folio){
        $consulta = $this->db->get_where('Clientes', array('Folio' => $Folio));
        return $consulta;
    }
	
	function getByNombre($Nombre){
        $consulta = $this->db->get_where('Clientes', array('Nombre' => $Nombre));
        return $consulta;
    }
	
	function getIdMembresia($idMembresia){
        $consulta = $this->db->get_where('Empresas', array('idMembresia' => $idMembresia));
        return $consulta;
    }

    function insert($Folio, $Puntos, $Fecha, $FechaV, $Nombre, $Telefono, $Direccion, $Correo,
					$idMembresia){
        
		$dato = array('Folio' => $Folio, 'Puntos' => $Puntos, 'Fecha' => $Fecha, 
					'FechaV' => $FechaV, 'Nombre' => $Nombre, 'Telefono' => $Telefono, 'Direccion' => $Direccion,
					 'Correo' => $Correo, 'idMembresia' => $idMembresia);
					  
        $str = $this->db->insert_string('Clientes', $dato);
        $this->db->query($str);
		
		return true;
    }
	
	
	function update($Puntos, $Fecha, $FechaV, $Nombre, $Telefono, $Direccion, $Correo, $idMembresia){
		
       
        $data = array('Puntos' => $Puntos, 'Fecha' => $Fecha, 'FechaV' => $FechaV, 'Telefono' => $Telefono, 
					  'Direccion' => $Direccion, 'Correo' => $Correo, 'idMembresia' => $idMembresia);
					  
        $condicion =  "Folio = '$Folio'";
        
        $str = $this->db->update_string('Clientes', $data, $condicion);
        
        if($this->db->query($str))
		return TRUE;
    }

    function delete($Folio){
        $this->db->where(array('Folio' => $Folio));
		$this->db->delete('Clientes'); 
    }
}
?>
