<?php
    header('Content-Type:text/plain;charset=utf-8');
    
    $j = -1;
    $machine = array();
    $arr_today = array();
    $arr_week = array();
    $now = date("Y-m-d",time());
    $date_1 = date("Y-m-d",time());
    $date_7 = date("Y-m-d",time()-7*24*60*60);
    
    $con = mysql_connect("localhost","root","root");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }
    // mysql_query("set names utf-8");

    //连接设备名数据表获取设备名
    mysql_select_db("hqu", $con);
    $query = "SELECT * FROM examine"; 
    $result =mysql_query($query,$con);
    while($row=mysql_fetch_array($result)){
        $j++;
        $machine[$j]= $row['machine'];
    }

    foreach ($machine as $key => $value) {
        $w = 0;
        $t = 0;
        unset($arr_week);
        unset($arr_today);
        mysql_select_db("machine_data", $con);
        $query = "SELECT * FROM `$value`"; 
        $result =mysql_query($query,$con);

        while($row =mysql_fetch_array($result)){
            if(strtotime($row['date'])>strtotime($date_7) && strtotime($row['date'])<strtotime($date_1)){
                $arr_week[$w]=array($row['id'],$row['date'],$row['wind_speed'],$row['temperature'],$row['humidity']);
                $w++;
            }
            else if(strtotime($row['date'])>strtotime($date_1)){
                $arr_today[$t]=array($row['id'],$row['date'],$row['wind_speed'],$row['temperature'],$row['humidity']);
                $t++;
            }
        }
        //生成最近七天json
        $json_string_week = json_encode($arr_week);
        file_put_contents('./hqu/'.$value.'/history.json', $json_string_week);
        //生成本日json
        $json_string_today = json_encode($arr_today);
        file_put_contents('./hqu/'.$value.'/'.$now.'.json', $json_string_today);
    }

    print_r ($machine);


    mysql_close($con);






?>