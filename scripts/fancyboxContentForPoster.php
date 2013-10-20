<?php
	$imageLocation = $_GET['imageLoc'];
	$fontSize = $_GET['fontSize'];	
?>
<div id="imgParent"><div id="imgContainer"><img src="<?php echo $imageLocation;?>"></div><div id="contentContainer"></div></div>
<div id="settingsDiv">
	<table>
		<tr>
			<td><h5>Opacity :</h5></td> <td><div id="h-slider"></div></td>
		</tr>
		<tr>
			<td><h5>Title :</h5></td><td><input type="text" id="titleText" placeholder="type your title here.."></td>
		</tr>
		<tr>
			<td><h5>Options :</h5></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					    <a id="textBold"  class="btn"><i class="icon-bold"></i></a>
					    <a id="textItalic" class="btn"><i class="icon-italic"></i></a>
					    <a id="textFont" class="btn"><i class="icon-font"></i><span id="selectFontSpan" style="position:relative; display:none;"> &nbsp;
					    <select id="selectFont" style=" margin-top:10px;width: 100px;">
					    <option>Select a font</option>
					    <?php
					    	$fontDir = '../fonts';
							$fontFiles = scandir($fontDir);
					    	foreach ($fontFiles as $key => $font) {
								# code...
								if($font == '.' || $font == '..'){
									#nothing goes here...
								}else{
									$fontAndExt = explode('.', $font);
									$fontName = ucwords(strtolower($fontAndExt[0]));
							?>
								<option <?php if($fontName === 'Tahoma'){ echo 'selected';}?> value=<?php echo $fontName;?>>
								<?php 									
									echo $fontName;
								?>
								</option>
							<?php
								}	
							}
						?>
					    </select></span></a>
					    <a id="textSize" class="btn"><i class="icon-text-width"></i><span id="setTextSize" style="display:none;"> &nbsp;<select id="textSizeValue" style="margin-top:10px;width: 60px"><?php for($i=6; $i<=100; $i++){ ?><option <?php if($i == $fontSize){ echo 'selected';}?> value="<?php echo $i?>"><?php echo $i;?></option><?php }?></select></span></a>
					    <a id="colorPicker" class="btn"><i class="icon-tint"></i></a>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<h5>Description :</h5>
			</td>
			<td>
				<textarea id="posterDesc" placeholder="description goes here.."></textarea>
			</td>
		</tr>
	</table>
	<td><input id="createImageButton" type="button" class="btn btn-primary" value="Create Poster"/><span id="result"></span></td>
</div>	
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="js/colorpicker.js"></script>
<script type="text/javascript" src="js/imageEditing.js"></script>