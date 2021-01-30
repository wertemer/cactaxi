<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	$w1=$_POST['s1'];
	$l1=$_POST['d1'];
	$w2=$_POST['s2'];
	$l2=$_POST['d2'];
	if(isset($w1)&&isset($l1)&&isset($w2)&&isset($l2)){
		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	        header('Access-Control-Allow-Origin: *');
	        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
	        header('Access-Control-Allow-Headers: token, Content-Type');
	        header('Access-Control-Max-Age: 1728000');
	        header('Content-Length: 0');
	        header('Content-Type: text/plain');
	        die();
	    }
	    header('Access-Control-Allow-Origin: *');
	    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
	    header('Access-Control-Allow-Headers: token, Content-Type');
	    header('Access-Control-Max-Age: 1728000');
	    header('Content-Length: 0');
	    header('Content-Type: application/json');
	    $url = 'http://routes.maps.sputnik.ru/osrm/router/viaroute?loc='.$w1.','.$l1.'&loc='.$w2.','.$l2;
		$result = file_get_contents($url);
		$data = json_decode($result, true);
	    $ret = [
	        'result' => 'OK',
	        'res'=>$data,
	        //'params'=>http_build_query($params),
	        'url'=>$url
	    ];
	}
	else{
		$ret = [
	        'result' => 'Bad'
	    ];
	}
    echo json_encode($ret);
?>