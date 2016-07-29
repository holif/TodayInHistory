<?php
	//判断请求参数是否存在
	if(isset($_GET['month'])&&isset($_GET['day'])&&isset($_GET['callback']){
		$month = $_GET['month'];
		$day = $_GET['day'];
		$url="http://api.juheapi.com/japi/toh?v=1.0&month=".$month."&day=".$day."&key=YourKey";
	
		$file = $month.$day.".txt";
		
		//判断所请求的数据是否已存在 存在则直接读取
		if(file_exists($file)){
			$myfile = fopen($file, "r");
			$json = fread($myfile,filesize($file));
			fclose($myfile);
			echo $_GET['callback'] . '(' . $json . ');';
		} else {
			//若文件不存在则请求并写到目录下以便下次请求
			$json = file_get_contents($url);
			$myfile = fopen($file, "w");
			fwrite($myfile, $json);
			fclose($myfile);			
			echo $_GET['callback'] . '(' . $json . ');';
		}
	} else {
		echo '{"error_code":1}';
	}
?>