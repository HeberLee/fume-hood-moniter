<?php
	class indexController{
		function index(){
		 	$newsobj = M('news');
		 	// $data = $newsobj->get_news_list();
		 	// $this->showabout();
		 	// VIEW::assign(array('data'=>$data));
		 	VIEW::display('index.html');
		}

		function register(){
			$adminobj = M('admin');
			$result = $adminobj->new_user($_POST);
			if($result){
				$this->showmessage('注册成功！','admin.php?controller=index&method=index');
			}
			else{
				$this->showmessage('注册失败！','admin.php?controller=index&method=index');
			}
		}

		function newsshow(){
			$data = M('news')->getnewsinfo(intval($_GET['id']));
			$this->showabout();
			VIEW::assign(array('data'=>$data));
			VIEW::display('index/show.html');
		}

		function showabout(){
			$data = M('about')->aboutinfo();
			VIEW::assign(array('about'=>$data));
		}

		private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}
	}
?>