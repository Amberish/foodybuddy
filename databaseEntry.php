<?php
	//Execute for database entry of fonts...
	$fontDir = 'fonts';
	$fontFiles = scandir($fontDir);
	foreach ($fontFiles as $key => $font) {
		# code...
		if($font == '.' || $font == '..'){
			#nothing goes here...
		}else{
			$fontAndExt = explode('.', $font);
			$fontName = ucwords(strtolower($fontAndExt[0]));
			if(!mysql_connect('182.50.133.146', 'mrityunjay', '') || !mysql_select_db('foodybuddy')){
				die('Connection not made!');
			}
			$query = "INSERT INTO `fonts` VALUES ('', '".$fontName."', 'fonts/".$font."')";
			if($queryRun = mysql_query($query)){
				echo 'done';
			}
		}	
	}

?>