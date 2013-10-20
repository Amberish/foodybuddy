<?php
//Set the Content Type
header('Content-type: image/jpeg');
ini_set("memory_limit","256M");

$imgFile = $_GET['imgFile'];

#firstly writing title on image...
$titleFontUsed = $_GET['titleFontUsed'];
$titleLocation = array($_GET['titleX'], $_GET['titleY']);
$titleColor = $_GET['titleColor'];
$titleText = $_GET['titleText'];
$opacity = ceil($_GET['opacity']*127);

if(!mysql_connect('182.50.133.146', 'mrityunjay', 'Mrityunjay@1') || !mysql_select_db('mrityunjay')){
	die('Connection not made!');
}

$query = "SELECT * FROM `fonts` WHERE `font_name`= '$titleFontUsed'";
$queryRun = mysql_query($query);
$result = mysql_fetch_assoc($queryRun);
$titleFontUsed = "../".$result['font_loc'];

$titleFontSize = (int) $_GET['titleFontSize'];
if($titleFontSize>16){
	$titleFontSize = $titleFontSize - 6;
}


$positionX = $_GET['titleX'];

$string ="djhakshdkjhasfuhqwnkjer nknsjdnisdfhioasjdfkmsdfkl4712983712738909";
$imageName = (substr(str_shuffle($string.$titleText.$string), 0, 10)).".png";

$jpgImage = imagecreatefromjpeg($imgFile);
imagefilter ( $jpgImage , IMG_FILTER_COLORIZE , 255, 255, 255, $opacity);

//setting color
$titleTextColor = imagecolorallocate($jpgImage, $titleColor[0], $titleColor[1], $titleColor[2]);

$stringArray = adjustString($positionX, $titleText, $titleFontUsed, $titleFontSize);

$lineHeight = 0;
foreach ($stringArray as $line) {
	# code...
	// Print Text On Image
	imagettftext($jpgImage, $titleFontSize, 0, $titleLocation[0], $titleLocation[1]+$titleFontSize+$lineHeight, $titleTextColor, $titleFontUsed, $line);
	$lineHeight += ($titleFontSize + 5);
}

// Send Image to Browser
imagejpeg($jpgImage, '../posters/'.$imageName);


#writing title on image completed..


#writing description on image created...
$imgForDescription = '../tmp/'.$imageName;

$descFontUsed = $_GET['descFontUsed'];

if(!mysql_connect('182.50.133.146', 'mrityunjay', 'Mrityunjay@1') || !mysql_select_db('mrityunjay')){
	die('Connection not made!');
}

$query = "SELECT * FROM `fonts` WHERE `font_name`= '$descFontUsed'";
$queryRun = mysql_query($query);
$result = mysql_fetch_assoc($queryRun);
$descFontUsed = "../".$result['font_loc'];

$descFontSize = (int) $_GET['descFontSize'];
if($descFontSize>16){
	$descFontSize = $descFontSize - 6;
}else{
	$descFontSize = $descFontSize - 4;
}
$descLocation = array($_GET['descX'], $_GET['descY']);
$descColor = $_GET['descColor'];
$descText = $_GET['descText'];
$positionX = $_GET['descX'];

//setting color
$descTextColor = imagecolorallocate($jpgImage, $descColor[0], $descColor[1], $descColor[2]);

$stringArray = adjustString($positionX, $descText, $descFontUsed, $descFontSize);

$lineHeight = 0;
foreach ($stringArray as $line) {
	# code...
	// Print Text On Image
	imagettftext($jpgImage, $descFontSize, 0, $descLocation[0], $descLocation[1]+$descFontSize+$lineHeight, $descTextColor, $descFontUsed, $line);
	$lineHeight += ($descFontSize + 5);
}

// Send Image to Browser
imagepng($jpgImage, '../posters/'.$imageName);

// Clear Memory
imagedestroy($jpgImage);

#final image created with title and description.

?>
&nbsp; &nbsp;<a id="viewImage" href="#" class="btn btn-success"  value="<?php echo './posters/'.$imageName;?>" class="btn-btn-success">View Image</a>
<?php
function adjustString($positionX, $text, $font, $fontSize){

	$titleWords = explode(' ', $text);
	$titleWordCount = count($titleWords);
	$string = '';
	$count = 0;
	$stringCreated = array();
	$x = $positionX;
	$widthAvailable = 300 - $x;

	for($i = 0; $i < $titleWordCount; $i++){
		$prevString = $string;
		if($i == 0){
			$string .= $titleWords[$i];	
		}else{
			$string .= ' '.$titleWords[$i];
		}		 
		$bbox = imagettfbbox($fontSize, 0, $font, $string);
		$contentWidth = $bbox[4] - $bbox[6];
		
		if($widthAvailable < $contentWidth){
			$stringCreated[$count] = $prevString;
			$count++;
			$string = $titleWords[$i]; 
		}
	}
	if(count($stringCreated) == 0){
		$stringCreated[0] = $text;
	}else{
		$stringCreated[$count] = $string;
	}
	return $stringCreated;
}

?>