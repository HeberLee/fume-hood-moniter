<?php
	class adminController{

		public $auth='';

		public function __construct(){
			$authobj = M('auth');
			$this->auth = $authobj->getauth();
			if(empty($this->auth)&&(PC::$method!='login')){
				$this->showmessage('请登录后操作！','admin.php?controller=admin&method=login');
			}
		}

		public function login(){
			if($_POST){
				$this->checklogin();
			}else{
				VIEW::display('index.html');
			}
			
		}

		private function checklogin(){
			$authobj = M('auth');
			if($authobj->loginsubmit() == '1'){
				$this->showmessage('管理员登录成功！','admin.php?controller=admin&method=admin');
			}
			else if($authobj->loginsubmit() == '2'){
				$this->showmessage('登录成功！','admin.php?controller=admin&method=member');
			}
			else{
				$this->showmessage('登录失败！','admin.php?controller=admin&method=login');
			}
		}

		public function admin(){
			$newsobj = M('news');
			// $newsnum = $newsobj->count();
			// VIEW::assign(array('newsnum'=>$newsnum));
			VIEW::display('admin.html');
		}


		public function member(){
			$dataobj = M('data');
			$date =  (!empty($_GET['date']))?daddslashes($_GET['date']):time();
			$data = $dataobj->findAll_by_uid($this->auth['id'],$date);
			// print_r($data);
			// echo $judge;
			// echo "<pre>";print_r($data);echo "<pre>";
			VIEW::assign(array('machine_data'=>$data));
			VIEW::display('member.html');
		}

		public function logout(){
			$authobj = M('auth');
			$authobj->logout();
			$this->showmessage('退出成功！','admin.php?controller=admin&method=login');
		}

		private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}

		public function newsadd(){
			if(empty($_POST)){
				if(isset($_GET['id'])){
					$data = M('news')->getnewsinfo($_GET['id']);
				}
				else{
					$data = array();
				}
				VIEW::assign(array('data'=>$data));
				VIEW::display('admin/newsadd.html');
			}else{
				$this->newssubmit();

			}
		}

		private function newssubmit(){
			$newsobj = M('news');
			$result = $newsobj->newssubmit($_POST);
			if($result == 0){
				$this->showmessage('操作失败！','admin.php?controller=admin&method=newsadd&id='.$_POST['id']);
			}
			if($result == 1){
				$this->showmessage('添加成功！','admin.php?controller=admin&method=newslist');
			}
			if($result == 2){
				$this->showmessage('修改成功！','admin.php?controller=admin&method=newslist');
			}
		}

		public function newslist(){
			$newsobj = M('news');
			$data = $newsobj->findAll_orderby_dateline();
			VIEW::assign(array('data'=>$data));
			VIEW::display('admin/newslist.html');
		}

		public function newsdel(){
			if(intval($_GET['id'])){
				$newsobj = M('news');
				$newsobj->del_by_id($_GET['id']);
				$this->showmessage('修改成功！','admin.php?controller=admin&method=newslist');
			}
		}
	}
?>