<?php
	class dataModel{
		public $_table = 'machine_data';

		// function findAll_by_uid_today($uid){
		// 	$today = date("Y-m-d",time());
		// 	$sql = 'select * from '.$this->_table.' where uid = "'.$uid.'" and date>'.strtotime($today).' order by date asc';
		// 	$data = DB::findAll($sql);
		// 	return $this->json($data);
		// }

		function findAll_by_uid($uid,$date){
			$date_min = strtotime(date("Y-m-d",$date));
			$date_max = strtotime(date("Y-m-d",$date+24*60*60));
			$sql = 'select * from '.$this->_table.' where uid = "'.$uid.'" and date>'.$date_min.' and date<'.$date_max.' order by date asc';
			$data = DB::findAll($sql);
			return $this->json($data);
		}

		function json($data){
			 return $json = json_encode($data);
		}



		
    }	
?>