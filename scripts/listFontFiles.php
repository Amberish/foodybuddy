<option>Select a font</option>
<?php
	$dir = '../fonts';
	$fontFiles = scandir($dir);
	foreach ($fontFiles as $key => $font) {
		# code...
		if($font == '.' || $font == '..'){
			#nothing goes here...
		}else{
	?>
		<option value=<?php echo $dir."/".$font;?>>
		<?php 
			$fontAndExt = explode('.', $font);
			$fontName = ucwords(strtolower($fontAndExt[0]));
			echo $fontName;
		?>
		</option>
	<?php
		}	
	}
?>