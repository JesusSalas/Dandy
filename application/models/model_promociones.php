<?php

class Model_promociones extends CI_Model {

   

    function __construct(){

        parent::__construct();

    }

	

    function get(){

        $consulta = $this->db->get('Promociones');

        return $consulta;

    }

	

	function getByEmpresa($idEmpresa){

        $consulta = $this->db->get_where('Promociones', array('idEmpresa' => $idEmpresa));

        return $consulta;

    }

	

	function getByID($idPromociones){

        $consulta = $this->db->get_where('Promociones', array('idPromociones' => $idPromociones));

        return $consulta;

    }

    



    function insert($Fecha, $idEmpresa, $Puntos, $Descripcion, $Slogan, $Foto){

        

		$dato = array('Fecha' => $Fecha, 'idEmpresa' => $idEmpresa, 'Puntos' => $Puntos, 'Descripcion' => $Descripcion, 

					  'Slogan' => $Slogan, 'Foto' => $Foto);

					  

        $str = $this->db->insert_string('Promociones', $dato);

        $this->db->query($str);

		

		return true;

    }

	

	

	function update($idPromociones, $Fecha, $idEmpresa, $Puntos, $Descripcion, $Slogan, $Foto){

		

       

        $data = array('Fecha' => $Fecha, 'idEmpresa' => $idEmpresa, 'Puntos' => $Puntos, 'Descripcion' => $Descripcion, 

					  'Slogan' => $Slogan, 'Foto' => $Foto);

					  

        $condicion =  "idPromociones = '$idPromociones'";

        

        $str = $this->db->update_string('Promociones', $data, $condicion);

        

        if($this->db->query($str))

		return TRUE;

    }



    function delete($idPromociones){

        $this->db->where(array('idPromociones' => $idPromociones));

		$this->db->delete('Promociones'); 

    }

}

?>

