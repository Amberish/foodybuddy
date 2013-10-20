<?php

$url = $_GET['url'];
switch ($url) {
	#Main link on manager dashboard...
	case 'home':
		# code...
		homeUrl();
		break;

	case 'fans':
		#code...
		fansUrl();
		break;

	case 'makeMoreFans':
		#code....
		makeMoreFansUrl();
		break;

	case 'profile':
		#code....
		profileUrl();
		break;

	case 'contact':
		#code....
		contactUrl();
		break;	

	#Supporting page functioning goes here...
	#supporting page for 'home'
	case 'pageAfterHome':
		#code...
		$id = $_GET['id'];
		pageAfterHomeUrl($id);
		break;
	#--------------------------------------------------=

	#supporting page for 'fans'
	case 'searchFanByNameOrID':
		#code..
		$nameOrID = $_GET['nameOrID'];
		searchFanByNameOrID($nameOrID);
		break;

	case 'searchAllFans':
		#code..
		searchAllFans();
		break;

	#supporting page for 'make more fans'
	case 'selectPoster':
		selectPoster();
		break;

	case 'customPoster':
		customPoster();
		break;

	#suporting page for 'custom poster'
	case 'createPoster':
		#code goes here...
		createPoster();
		break;
	#---------------------------------------------------

	default:
		# code...
		homeUrl();
		break;
}



function homeUrl(){
	?>

	<div id="homeContent">
		<input type="text" placeholder="Enter Unique Id | Enter Email Id" required/>
	</div>

	<?php
}

function pageAfterHomeUrl($id){
	?>
	<div id="pageAfterHomeUrl">
		<center><h3>Customer Information</h3></center><br/><br/>
		<div id="inlineIdAndImage">
			<div>
				<table>
					<tr>
						<td>ID No.</td>
						<td>: .........</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>: .........</td>
					</tr>
					<tr>
						<td>ID Proof</td>
						<td>: .........</td>
					</tr>
					<tr>
						<td>Address</td>
						<td>: .........</td>
					</tr>
				</table>
			</div>
			<div >
				<img width="130" height="200" src="img/glyphicons-halflings.png"/>
			</div>
		</div>
		<div id="previousBilling">
		<h5>Previous Billing Info.: </h5>
		<table>
			<tr>
				<td>Accumulate Bill </td>
				<td>: .........</td>
			</tr>
			<tr>
				<td>Discount Avail </td>
				<td>: .........</td>
			</tr>
		</table>
		</div>
		<div id="currentBilling">
		<h5>Current Billing Info.: </h5>
		<table>
			<tr>
				<td>Bill Amount </td>
				<td>: .........</td>
			</tr>
			<tr>
				<td>Discount </td>
				<td>: .........</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td><input type="text" placeholder="Calculate Discount" style="text-align:right;"></td>
			</tr			<tr>
				<td><input type="button" value="Update" class="btn btn-success"></td>
			</tr>
		</table>
		</div>
	</div>
	<?php
}

#page for 'fans' and supporting page for fans---------------------------------------------
function fansUrl(){
?>
	<div id="fanSearchOptions">
		<ul>
			<li><a href="#search_by_fan_name_or_ID" class="btn">Search By Fan Name/ID </a><br/><span><input type="text" id="fanNameOrID" placeholder="Enter Fan Name/ID"></span></li>
			<li><a href="#search_all_fans" class="btn">Search All Fans</a></li>
		</ul>
	</div>
	<script type="text/javascript" src="js/fansPage.js"></script>
<?php
}

function searchFanByNameOrID($nameOrID){
	if(is_numeric($nameOrID)){
		#coding for id...
		?>
		
		<?php
	}else{
		#coding for name..
		?>
		
		<?php
	}
}

function searchAllFans(){
?>
	<div id="searchAllFansContent">
		<div id="fansLeftPanel" class="fansPage">
			<h4>Filter Search</h4>
			<h5>City</h5>
			<select>
				<option>Select city..</option>
			</select>

			<h5>Area</h5>
			<select>
				<option>Select area..</option>
			</select>

			<h5>Accum. Amt.</h5>
			<div id="accuAmt">
				<table>
				<tr>
					<td><input type="checkbox"></td><td> 0 - 1000</td>
				</tr>
				<tr>
					<td><input type="checkbox"></td><td> 1000 - 2000</td>
				</tr>
				<tr>
					<td><input type="checkbox"></td><td> 2000 - 3000</td>
				</tr>
				<tr>
					<td><input type="checkbox"></td><td> 3000 &amp; above</td>
				</tr>
				</table>
			</div>
		</div>
		<div id="fansRightPanel" class="fanspage">
			<div id="stripForAlphabeticalSearch">
			<?php
				for($i='A'; $i<'Z'; $i++){
					echo '<a href="#'.$i.'">'.$i.'</a> &nbsp;&nbsp;&nbsp;';
				}
				echo '<a href="#Z">Z</a>';
			?>
			</div>
			<br/>
			<div id="resultContainer">
			<table>
				<tr>
					<th>S.No.</th>
					<th>Name of Fan</th>
					<th></th>
				</tr>
				<tr>
					<td>1.) </td>
					<td>
					Arjun Gupta
					<br/><br/>
					<div class="well accuAmtAndDisc">
					Accu. Amt. : 23000<br>
					Discount : 16%
					</div>
					</td>
					<td><input type="button" value="Send Offer/Contact Info" class="btn btn-success btn-small"></td>
				</tr>
				<tr>
					<td>2.) </td>
					<td>
					Akash Saxena
					<br/><br/>
					<div class="well accuAmtAndDisc">
					Accu. Amt. : 20000<br>
					Discount : 13%
					</div>
					</td>
					<td><input type="button" value="Send Offer/Contact Info" class="btn btn-success btn-small"></td>
				</tr>
			</table>
			</div>
		</div>
	</div>
<?php

}

#-------------------------------------------------------------------------------------------------------

function makeMoreFansUrl(){
		?>
			<div id="makeMoreFans" class="well">
				<ul>
					<li><a href="#create_poster" value="createPoster">Create Poster</a></li>
					<li><a href="#promote_offer" value="promoteOffer">Promote Offer</a></li>
					<li><a href="#promote_speciality" value="promoteSpeciality">Promote Speciality</a></li>
					<li><a href="#create_event" value="createEvent">Create Event</a></li>
				</ul>
			</div>

			<script type="text/javascript" src="js/makeMorefans.js"></script>
		<?php
}

function profileUrl(){

	

}

function contactUrl(){

	

}



function createPoster(){
	?>
		<div id="createPosterContainer" class="well">
			<ul>
				<li><a href="#select_from_poster" value="selectPoster">Select from Poster</a></li>
				<li><a href="#custom_poster" value="customPoster">Custom Poster(upload poster)</a></li>
			</ul>
		</div>

		<script type="text/javascript" src="js/createPoster.js"></script>
	<?php
}

function selectPoster(){
	?>
	<div style="display:none">
		<div id="fancyboxData">
					
		</div>
	</div>
	<div id="selectPosterContainer">
	<h5>Choose from the following templates:</h5>
		<br/>
		<div id="posterListContainer">
			<div class="well">
				<img id="img1" src="img/posters/size_300x400/1.jpg" >
				<input type="radio" id="1" class="potraitPoster" href="#fancyboxData" name="posterSelect">
			</div>
			<div class="well">
				<img src="img/posters/size_300x400/2.jpg" >
				<input type="radio" id="2" class="potraitPoster" href="#fancyboxData" name="posterSelect">
			</div>
			<div class="well">
				<img src="img/posters/size_300x400/3.jpg" >
				<input type="radio" id="3" class="potraitPoster"  href="#fancyboxData" name="posterSelect">
			</div>
			<br>
			<div class="well">
				<img src="img/posters/size_300x400/4.jpg" >
				<input type="radio" class="potraitPoster"  href="#fancyboxData" name="posterSelect">
			</div>
			<div class="well">
				<img src="img/posters/size_300x400/5.jpg" >
				<input type="radio" class="potraitPoster" href="#fancyboxData" name="posterSelect">
			</div>
			<div class="well">
				<img src="img/posters/size_300x400/6.jpg" >
				<input type="radio" class="potraitPoster" href="#fancyboxData" name="posterSelect">
			</div>
			<br/>
			<div class="well">
				<img src="img/posters/size_300x400/7.jpg" >
				<input type="radio" class="potraitPoster"  href="#fancyboxData" name="posterSelect">
			</div>
			<div class="well">
				<img src="img/posters/size_300x400/8.jpg" >
				<input type="radio" class="potraitPoster" href="#fancyboxData" name="posterSelect">
			</div>
			<div class="well">
				<img src="img/posters/size_300x400/9.jpg" >
				<input type="radio" class="potraitPoster" href="#fancyboxData" name="posterSelect">
			</div>
			<script type="text/javascript" src="js/portraitPoster.js"></script>
		</div><br/>
		<div id="pages" style="text-align:center; margin-top: 20px; border:1px solid; background: #EEE; width: 100%; padding:10px 0px;">
		<?php
		$posterDir = 'img/posters/size_300x400/';
		$posterFilesArray = scandir($posterDir);
		$length = count($posterFilesArray);
		$pages = ceil($length/9);
		for($i = 1; $i<=$pages; $i++){
			if($i == 1){
				echo " <a href='#$i' class='stylingPagination' value='$i'>".$i."</a> &nbsp;&nbsp;";
			}else{
				echo " <a href='#$i' value='$i'>".$i."</a> &nbsp;&nbsp;";	
			}			
		}
		?>
		</div>
	</div>
	<script type="text/javascript">
	$('#pages a').click(function(){
		var pageNo = $(this).attr('value');
		for(var i = 0 ; i < $('#pages a').length; i++) {
			$('#pages a').removeClass('stylingPagination');
		}
		$(this).addClass('stylingPagination');
		$.get('./scripts/fetchPostersToSelect.php', {pageNo : pageNo}, function(data){
			$('#posterListContainer').html(data);
		});	
	});
	</script>


	<?php
}

function customPoster(){
?>
	<form id="data" action="scripts/createPosterDetails.php" method="POST" enctype="multipart/form-data">
		<div id="customPoster" class="well">
			<label>Select the Poster</label>
			<div id="posterContainer">
				<div id="posterImage" class="posterImage">	
					<span>- - - - - - - - - - - - - - - - - - - - &nbsp;&nbsp;&nbsp;800 x 250 (click to add poster) &nbsp;&nbsp;&nbsp;- - - - - - - - - - - - - - - - - - - - </span>
				</div>
			</div>			
				<input type="file" id="poster" name="poster" hidden>
			<br/><br/>
			<div id="titleAndDesc">
				<label>Title</label>
				<input type="text" name="title" placeholder="title for the poster..."><br/>
				<label>Description</label>
				<textarea name="description" rows="10"></textarea>
			</div><br/>
			<input type="submit" class="btn btn-success" value="Submit">
		</div>
	</form>

	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/customPoster.js"></script>
<?php
}
?>