<?php
	
	$id = $_GET['id'];
	$cap = $_GET['cap'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Hostel Entry</title>
	
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="../../Theme/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../Theme/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../../Theme/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../../Theme/css/style-responsive.css" rel="stylesheet">
	<link id="font-awesome" href="../../Theme/css/font-awesome.css" rel="stylesheet">
	<link id="font-awesomemin" href="../../Theme/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../../Theme/img/favicon.ico">
	<!-- end: Favicon -->
	
</head>

<body>
	
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->

			<?php
				include '../../mainMenu.html';
			?>

			<!--
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="hostelList.php"><i class="icon-th-list"></i><span class="hidden-tablet"> Hostel List</span></a></li>
						<li><a href="hostelEntry.php"><i class="icon-plus"></i><span class="hidden-tablet"> Add Hostel</span></a></li>	
					</ul>
				</div>
			</div>
			-->
			
			<!-- end: Main Menu -->
			
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
			<li>
					<i class="icon-home"></i>
					<a href="../dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="hostelList.php">Hostel List</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Add Rooms</a></li>
			</ul>		
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon plus"></i><span class="break"></span>Add Rooms</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="../../Controller/hostels/hostelRoomEntryCon.php" method="POST">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Room Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="tRoomNo" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Floor Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="nFloorNo" type="number">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Hostel Id</label>
								<!-- <label class="control-label" for="focusedInput"><?php echo $id ;?></label>
								 -->
								 <div class = "controls">
								 	<input class="input-xlarge-focused" disabled="true" name="nHostelId" type="number" value="<?php echo $id ;?>">
								 </div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Max Capacity</label>
								<!-- <label class="control-label" for="focusedInput"><?php echo $cap ;?></label>
								 -->
								 <div class = "controls">
								 	<input class="input-xlarge-focused" disabled="true" name="nMaxCapacity" type="number" value="<?php echo $cap ;?>">
								 </div>
							  
								 <div class="control-group">
								<label class="control-label" for="focusedInput"></label>
								</div>
							  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="hostelList.php"><button type="button" class="btn">Cancel</button></a>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			
		
			</div><!--/.fluid-container-->
				
				
			
	
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 School</span>
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<?php
			include '../../allJS.html' ;
		?>
		
	<!-- end: JavaScript-->
	
</body>
</html>