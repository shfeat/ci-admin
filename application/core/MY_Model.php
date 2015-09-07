<?php
class MY_Model extends CI_Model {

	/**
	 * @var CI_DB_mysqli_driver
	 */
	var $_db;
	
	public function __construct()
	{
		parent::__construct();
		$this->_db = $this->db;
	}
	
	/**
	 * @return CI_DB_mysqli_driver
	 */
	public function db()
	{
		return $this->db;
	}
	

}