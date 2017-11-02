<?php
	class adminModel{
		public $_table = 'admin';

		function findOne_by_username($username){
			$sql = 'select * from '.$this->_table.' where username = "'.$username.'"';
			return DB::findOne($sql);
		}

		public function new_user($data){
			extract($data);
			if(empty($username) || empty($password) || empty($email)){
				return false;
			}
			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);
			$email = addslashes($_POST['email']);
			$type = 'member';
			$data = array(
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'type' => $type
				);
			return DB::insert($this->_table,$data);
		}
    }	
?>