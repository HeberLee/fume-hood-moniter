<?php
	class authModel{
		private $auth = '';//存储当前登录账号信息

		public function __construct(){
			if(isset($_SESSION['auth'])&&(!empty($_SESSION['auth']))){
				$this->auth = $_SESSION['auth'];
			}
		}
		public function loginsubmit(){
			if(empty($_POST['username']) || empty($_POST['password'])){
				return false;
			}
			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);

			if($this->auth = $this->checkuser($username,$password)){
				$_SESSION['auth'] = $this->auth;
				if($this->auth['type'] == 'admin'){
					return 1;
				}
				else{
					return 2;
				}
				
			}else{
				return false;
			}
		}

		private function checkuser($username, $password){
			$adminobj = M('admin');
			$auth = $adminobj -> findOne_by_username($username);
			
			if((!empty($auth))&&$auth['password']==$password){
				return $auth;
			}else{
				return false;
			}
		}

		public function getauth(){
			return $this->auth;
		}

		public function logout(){
			unset($_SESSION['auth']);
			$this->auth='';
		}
	}
?>