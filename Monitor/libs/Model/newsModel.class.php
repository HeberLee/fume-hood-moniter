<?php
	class newsModel{
		public $_table = 'news';

		function get_json(){
			
		}

		function count(){
			$sql = 'select count(*) from'.$this->_table;
			return DB::findResult($sql,0,0);
		}

		public function getnewsinfo($id){
			if(empty($id)){
				return array();
			}
			else{
				$id = intval($id);
				$sql = 'select * from '.$this->_table.' where id = '.$id;
				return DB::findOne($sql);
			}
		}

		function newssubmit($data){
			extract($data);
			if(empty($title) || empty($content)){
				return 0;
			}
			$title = addslashes($title);
			$content = addslashes($content);
			$author = addslashes($author);
			$from = addslashes($from);
			$data = array(
				'title' => $title,
				'content' => $content,
				'author' => $author,
				'from' => $from,
				'dateline' => time()
				);
			if($_POST['id']!=''){
				DB::update($this,$data,'id = '.$id);
				return 2;
			}
			else{
				DB::insert($this->_table,$data);
				return 1;
			}
		}

		function findAll_orderby_dateline(){
			$sql = 'select * from '.$this->_table.' order by dateline desc';
			return DB::findAll($sql);
		}

		function del_by_id($id){
			return DB::delete($this->_table,'id = '.$id);
		}

		function get_news_list(){
			$data = $this->findAll_orderby_dateline();
			foreach ($data as $k => $news) {
				$data[$k]['content'] =  mb_substr(strip_tags($data[$k]['content']), 0 , 200);
				$data[$k]['dateline'] = date('Y-m-d H:i:s',$data[$k]['dateline']);
			}
			return $data;
		}
	}
?>