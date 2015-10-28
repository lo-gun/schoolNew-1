
<?php
session_start();
?><!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/schoolNew/View/dashboard.php"><span>School</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<!-- end: Message Dropdown -->
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>
								<?php echo $_SESSION['username']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="/schoolNew/Controller/users/userLogoutCon.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
		
		<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
				
					<ul class="nav nav-tabs nav-stacked main-menu">
						
						<li>
							<a class="dropmenu"><i class="icon-download"></i><span class="hidden-tablet"><span class="caret"></span>&nbsp;Navigation</span></a>
							
						</li>
						<li>
							<a class="dropmenu"></i></i></span></a>
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">&nbsp;&nbsp;&nbsp;Hostel</span></a>
							<ul>
								<li><a class="submenu" href="/schoolNew/View/hostels/hostelList.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Hostel List</span></a></li>
								<li><a class="submenu" href="/schoolNew/View/hostels/hostelStudentEntry.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Student Entry</span></a></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">&nbsp;&nbsp;&nbsp;Student</span></a>
							<ul>
								<li><a class="submenu" href="/schoolNew/View/students/studentList.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Student List</span></a></li>
								<li><a class="submenu" href="/schoolNew/View/students/studentAttendance.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Attandance</span></a></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">&nbsp;&nbsp;&nbsp;Subject</span></a>
							<ul>
								<li><a class="submenu" href="/schoolNew/View/subjects/subjectList.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Subject List</span></a></li>
								
								
							</ul>	
						</li>
						<li>
						
					</ul>
				</div>
			</div>
<!-- end: Main Menu -->

			