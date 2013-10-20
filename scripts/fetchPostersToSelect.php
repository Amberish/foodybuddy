<?php
	$pageNo = $_GET['pageNo'];
	if($pageNo == 1){
		$startLimit = 1;
	}else{
		$startLimit = (($pageNo - 1)*10) - ($pageNo - 2);
	}
	$endLimit = $startLimit + 9;
	for($i = $startLimit; $i< $endLimit; $i++){
		
		$imageFile = "../img/posters/size_300x400/".$i.".jpg";
		
		if(file_exists($imageFile)){
			$relativeLocation = "./img/posters/size_300x400/".$i.".jpg"
?>
<div class="well">
	<img id="img<?php echo $multiplier;?>" src="<?php echo $relativeLocation;?>" >
	<input type="radio" id="<?php echo $multiplier;?>" class="potraitPoster" href="#fancyboxData" name="posterSelect">
</div>
<?php
		}
		if($i%3 == 0){
			echo '<br/>';
		}
	}
?>
<script type="text/javascript" src="js/portraitPoster.js"></script>