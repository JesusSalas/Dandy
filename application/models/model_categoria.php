<?php
class Model_categoria extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
	
    function get(){
        $consulta = $this->db->get('Categorias');
        return $consulta;
    }
    
}
?>
