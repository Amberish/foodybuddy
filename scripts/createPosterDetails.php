<?php

	move_uploaded_file($_FILES['poster']['tmp_name'], '../tmp/'.$_FILES['poster']['name']);
	$name = $_FILES['poster']['name'];
?>
	<img src="tmp/<?php echo $name;?>">
