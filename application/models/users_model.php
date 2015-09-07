<?php

class users_model extends MY_Model {

	public static $tb_admin = 'admin';
	public static $tb_session = 'ci_sessions';
	
	/**
	 * @return bool
	 */
	public function login($email, $password)
	{
		$this->_db->where('email', $email);
		$user = $this->_db->get(static::$tb_admin)->row_array();
		if($user && $user['password'] == md5($password))
		{
			return $user;
		}
		return false;
	}
	
	/**
	 * @return bool
	 */
	public function create($email, $password, $username)
	{
		$insert_data = array(
			'email' => $email,
			'username' => $username,
			'password' => md5($password)
		);
		return $this->_db->insert(static::$tb_admin, $insert_data);
	}

    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['username'] = $udata['username']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}
	

}

