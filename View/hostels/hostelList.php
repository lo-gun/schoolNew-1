<?php
include '../../Model/dbHostel.php';
// $id 	= $_GET['id'];
?>

<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Hostel List</title>
	
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
				include '../../mainMenu.php';
			?>

			<!--
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
							<a href="#">
								<i class="icon-th-list"></i>
								<span class="hidden-tablet"> Hostel List</span>
							</a>
						</li>
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
				<li><a href="#">Hostel List</a></li>
			</ul>		
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
							<i class="halflings-icon list"></i>
							<span class="break"></span>
							<b>Hostels</b>
						</h2>
						<div class="box-icon">
						<a href="hostelEntry.php"><i class="halflings-icon plus"></i></a>
							<a href="#" class="btn-minimize">
								<i class="halflings-icon chevron-up"></i>
							</a>
						</div>
					</div>
					
					
					<?php
						$obj = new dbHostel;
						$result = $obj->getDataHostelModel1();
					?>
					
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Serial</th>
								  <th>Hostel Name</th>
								  <th>Hostel Address</th>
								  <th>Hostel For</th>
								  <th>Add Room</th>
								  <th style="text-align:center">Report View</th>
								  <th style="text-align:center">Edit</th>
								  <th style="text-align:center">Delete</th>
							  </tr>
						  </thead>
							
						  <tbody>
						 <?php
							$i = 1;
							while($row = mysqli_fetch_assoc($result))
							{
						?>
							<tr>
								<td>
									<?php //echo $i;?>
									<?php echo $row [ 'nHostelId' ] ;?>
								</td>
								<td class="center">
									<?php echo $row['tHostelName']; ?>
								</td>
								<td class="center">
									<?php echo $row['tHostelAddress']; ?>
								</td>
								<td class="center">
									<?php
										if ( $row['bHostelFor'] == 1 )
										{
									?>
											<b><font color="blue">M</font>
											<!-- <font color="blue"><i class="fa fa-check"></i></font> -->
											
									<?php
										}
										else
										{
									?>
											<b><font color="magenta">F</font>
											
									<?php
										}
									?>
								</td>
								<td class="center" style="text-align:center">
								<a href="hostelRoomEntry.php?id=<?php echo $row[ 'nHostelId']; ?> & cap=<?php echo $row['nMaxCapacity']; ?>" >
									<i class="halflings-icon plus"></i></a>
								</td>
								<td class="center" style="text-align:center">
									<a href="hostelReport.php?id=<?php echo $row['nHostelId']; ?>">
										<font color="green"><i class="fa fa-list-alt"></i></font>
									</a>
								</td>
								<td class="center" style="text-align:center">
									<a href="hostelEdit.php?id=<?php echo $row['nHostelId']; ?>">
										<font color="blue"><i class="fa fa-pencil-square-o"></i></font>
									</a>
								</td>
								<td class="center" style="text-align:center">
									<a href="hostelDelete.php?id=<?php echo $row['nHostelId']; ?>" onClick="return confirm('Are you sure to delete this data ?');">
										<font color="red"><i class="fa fa-trash-o"></i></font> 
									</a>
								</td>
							</tr>
						<?php
							$i++;
							}
						?>
						  </tbody>
					  </table>            
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
