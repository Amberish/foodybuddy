<?php
	$selected = $_GET['familySelected'];
	$deselected = $_GET['familyDeselected'];
	if(!mysql_connect('182.50.133.146', 'mrityunjay', 'Mrityunjay@1') || !mysql_select_db('mrityunjay')){
		die('Connection not made!');
	}

	$query = "SELECT * FROM `fonts` WHERE `font_name` in ('$selected', '$deselected')";
	$fontArray = array();
	if($queryRun = mysql_query($query)){
		while($result = mysql_fetch_assoc($queryRun)){
			if($result['font_name'] == $selected){
				$fontArray[$selected] = $result['font_loc'];
			}else if($result['font_name'] == $deselected){
				$fontArray[$deselected] = $result['font_loc'];
			}
		}		
	}
	echo "{
		\"$selected\" : \"".$fontArray[$selected]."\",
		\"$deselected\" : \"".$fontArray[$deselected]."\"
	}";
?>