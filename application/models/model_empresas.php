<?php
class Model_empresas extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
	
    function get(){
        $consulta = $this->db->get('Empresas');
        return $consulta;
    }
	
    function getLast(){
		$this->db->order_by("idEmpresa","desc");
		$this->db->limit(1);
        $consulta = $this->db->get('Empresas');
        return $consulta;
    }
	
	function getByCategoria($idCategoria){
        $consulta = $this->db->get_where('Empresas', array('idCategoria' => $idCategoria));
        return $consulta;
    }
	
	function getByUsuario($Usuario){
        $consulta = $this->db->get_where('Empresas', array('Usuario' => $Usuario));
        return $consulta;
    }
	
	function getByID($idEmpresa){
        $consulta = $this->db->get_where('Empresas', array('idEmpresa' => $idEmpresa));
        return $consulta;
    }
	
	function getPuntoVenta(){
        $consulta = $this->db->get_where('Empresas', array('PV' => 1));
        return $consulta;
    }

    function insert($Nombre, $Direccion, $Referencia, $Telefono, $Contacto, $Facebook, $Twitter, $Foto,
					$Mapa, $Informacion, $Logo, $PV, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Horario, 
					$Web, $Usuario, $Password, $Menu){
        
		$dato = array('Nombre' => $Nombre, 'Direccion' => $Direccion, 'Referencia' => $Referencia, 
					'Telefono' => $Telefono, 'Contacto' => $Contacto, 'Horario' => $Horario, 'Web' => $Web,
					 'Facebook' => $Facebook, 'Twitter' => $Twitter, 'Foto' => $Foto, 'Mapa' => $Mapa, 
					 'Menu' => $Menu, 'Informacion' => $Informacion, 'Logo' => $Logo, 'PV' => $PV, 
					'Imagen1' => $Imagen1, 'Imagen2' => $Imagen2, 'Imagen3' => $Imagen3, 'Imagen4' => $Imagen4, 
					'Imagen5' => $Imagen5, 'Usuario' => $Usuario, 'Password' => $Password);
					  
        $str = $this->db->insert_string('Empresas', $dato);
        $this->db->query($str);
		
		return true;
    }
	
	
	function update($idEmpresa, $idCategoria, $Nombre, $Direccion, $Telefono, $Contacto, $Facebook, $Twitter, $Foto,
					$Mapa, $Informacion, $Logo){
		
       
        $data = array('idCategoria' => $idCategoria, 'Nombre' => $Nombre, 'Direccion' => $Direccion, 'Telefono' => $Telefono, 
					  'Contacto' => $Contacto, 'Facebook' => $Facebook, 'Twitter' => $Twitter,'Foto' => $Foto, 'Mapa' => $Mapa,
					  'Informacion' => $Informacion, 'Logo' => $Logo);
					  
        $condicion =  "idEmpresa = '$idEmpresa'";
        
        $str = $this->db->update_string('Empresas', $data, $condicion);
        
        if($this->db->query($str))
		return TRUE;
    }

    function delete($idEmpresa){
        $this->db->where(array('idEmpresa' => $idEmpresa));
		$this->db->delete('Empresas'); 
    }
}
?>
