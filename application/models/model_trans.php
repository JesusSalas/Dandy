<?php
class Model_trans extends CI_Model {
    function __construct(){
        parent::__construct();
    }
	
    function begin(){
		$this->db->trans_start();
	}
	function commit(){
		$this->db->trans_complete();
	}
	function checkTrans(){
		if ($this->db->trans_status() === FALSE)
		{
			return false;// generate an error... or use the log_message() function to log your error
		}else {
			return true;
		}
	}
}
?>
