<?php

class dbStudent
{
	function dbconnectModel()
	{
		$servername 	= "localhost";
		$username 		= "root";
		$password		= "";
		$dbname 		= "db_school";
		
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		
		return $conn;
	}
	
	function getAllStudentData($id)
	{
		$conn = $this->dbconnectModel( ) ;

		$qry = " SELECT "
					. " nGRNO, "
					. " tFname, "
					. " tMname, "
					. " tLname, "
					. " bGender, "
					. " dBirthDate, "
					. " bStaysAtHostel "
				. " FROM "
					. " tblstudent " 
				."WHERE"
					." bGender = " . $id ;
		
		$result = mysqli_query( $conn, $qry ) ;
		
		return $result ;
	}
	function getAllStudentDatas()
	{
		$conn = $this->dbconnectModel( ) ;

		$qry = " SELECT "
					. " nGRNO, "
					. " tFname, "
					. " tMname, "
					. " tLname, "
					. " bGender, "
					. " dBirthDate, "
					. " bStaysAtHostel "
				. " FROM "
					. " tblstudent "  ;
		
		$result = mysqli_query( $conn, $qry ) ;
		
		return $result ;
	}

	function deleteStudent($nGRNO)
	{
		$conn = $this->dbconnectModel( ) ;

		$qry  = " DELETE FROM tblstudent where nGRNO = $nGRNO " ;

		mysqli_query($conn , $qry);
		
		echo "Data Deleted";
	}

	// author : AAKASH
	function fetchStudentAsPerStandard( $nStandardId )
	{
		$conn = $this->dbconnectModel( ) ;

		$qry = "SELECT * FROM "
			. " tblstudent "
			. " WHERE "
			. " nGRNO in "
			. " ( "
				. " SELECT nGRNO FROM "
				. " tblstudentstandard "
				. " WHERE "
				. " nStandardId = "
				. " ( "
					. " SELECT nStandardId FROM "
					. " tblstandard "
					. " WHERE "
					. " tStandardName = " .  $nStandardId 
				. " ) "
			. " ) " ;

		$result = mysqli_query( $conn, $qry ) ;

		return $result ;
	}

	function checkDate( $atdDate )
	{
		$conn = $this->dbconnectModel( ) ;

		$toDate = strtotime( $atdDate ) ;

		$qry = " SELECT dDay FROM  "
				. " tblattendence "
				. " WHERE " 
				. " dDay = $toDate " ;

		$result = mysqli_query( $conn, $qry ) ;

		return mysqli_num_rows( $result ) ;

	}

	function getAllFromStudentRoomAllocation()
	{
		$conn = $this->dbconnectModel( ) ;
		$qry = "SELECT * FROM tblstudentroomallocation";
		return mysqli_query($conn,$qry);
	}

	// author : AAKASH
	function fetchDataForAllocation( $nHostelId, $nRoomId )
	{
		$conn = $this->dbconnectModel();
	
		$qry = " SELECT "
					. " nGRNO, "
					. " tFname, " 
					. " tLname " 
				. " FROM "
					. " tblstudent "
				. " WHERE " 
					. " nGRNO "
						. " IN "
							. "( SELECT "
								. " nGRNO "
							. " FROM "
								." tblstudentroomallocation "
							. " WHERE " 
									. " nRoomId =  $nRoomId "
								. "AND " 
									. " nHostelId =  $nHostelId "
								. " AND "
									." isAllocated = 1 "
							. " ) " ;	
	
		$result = mysqli_query( $conn, $qry ) ;  
	
		return $result;
	}	

	//author : AAKASH
	function retriveSubjectList($nForStandard)
	{
		$conn = $this->dbconnectModel( ) ;
		$qry = "SELECT tSubjectName FROM tblsubject WHERE nForStandard =  $nForStandard" ;

		$result = mysqli_query($conn , $qry);
		return $result;
	}

	function checkStudentExistence( $tblName, $nGRNO )
	{
		$conn = $this->dbconnectModel( ) ;
		$qry = " SELECT * FROM $tblName WHERE nGRNO = $nGRNO " ;
		//$qry = "SELECT COUNT(nGRNO) from $tblName WHERE nGRNO = $nGRNO";
		$result = mysqli_query( $conn, $qry ) ;
		if ( $result === FALSE )
		{
			die(mysql_error());
		}

		return mysqli_num_rows( $result ) ;
		//return $result;
	}
	
	function insertData($tablename,$field,$valuesArray)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "INSERT INTO "
					. $tablename 
					. " ( "
						. implode ( ",", $field )
					." ) "
					. " VALUES "
						. " ( ' " 
							. implode ( "','", $valuesArray ) 
						. " ' ) " ;
		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
		echo "Data Inserted successfully";
		
	}
	function deleteData($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "DELETE FROM "
					. " tblCountries "
				. " WHERE "
					. " nCountryId = '$id' " ;
	
		mysqli_query($conn,$qry);
		
		echo "Data Deleted";
	}
	function getCountryData($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "SELECT "
					. " * "
				. " FROM "
					. " tblCountries "
				. " WHERE "
					. " nCountryId = '$id' " ;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}
	function editData($tablename,$values,$id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "UPDATE "
					. $tablename 
				. " SET "
					. implode (" , ", $values ) 
				. " WHERE "
					. " nCountryId = '$id' " ;
		
		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
	}



	function getnGRNOFromStandard( $nStandardId ) 
	{
		$conn = $this->dbconnectModel( ) ;
		$qry = " SELECT "
				. " nGRNO " 
				. " FROM tblstudentstandard "
				. " where nStandardId = $nStandardId " ; 		

		return 	mysqli_query( $conn, $qry ) ;
	}

	function getStandardId( $stdNm )
	{
		$conn = $this->dbconnectModel( ) ;
		
		$qry = " SELECT "
				. " nStandardId " 
				. " FROM tblstandard " 
				. " where tStandardName = $stdNm ";		

		$result = mysqli_query( $conn, $qry ) ;
		return $result ;
	}

	function setAttendenceForDate( $atdDate, $nStandardId, $allStudentnGRNO, $status , $tSubjectName )
	{
		$conn = $this->dbconnectModel( ) ;

		//$arrayValues = implode(" " , (array)$tSujectName);
		//$thisDate = STR_TO_DATE($atdDate,'%d/%m/%Y');
		
		$thisDate = strtotime( $atdDate ) ;

		while( $stud = mysqli_fetch_assoc( $allStudentnGRNO ) )
		{
			extract( $stud ) ;

			$qry = " INSERT INTO "
					. " tblattendence "
						. " ( dDay, nGRNO, nStandardId, isPresent , tSubjectName ) " 
					. " VALUES "
						. " (  '$thisDate' , $nGRNO, $nStandardId, $status , '$tSubjectName' ) " ;
			
			mysqli_query( $conn, $qry ) ;
		}
	}

	function checkDateFromAttendence( $atdDate, $nStandardId )
	{
		$conn = $this->dbconnectModel( ) ;

		$atdDate = strtotime( $atdDate ) ;

		$qry = " SELECT dDay FROM  "
				. " tblattendence "
				. " WHERE " 
				. " dDay = $atdDate AND "
				. " nStandardId = $nStandardId " ;

		$result = mysqli_query( $conn, $qry ) ;

		return mysqli_num_rows( $result ) ;

	}

	function updateAttendenceForDate( $atdDate, $nStandardId, $allStudentnGRNO, $forStatus , $tSubjectName)
	{
		$conn = $this->dbconnectModel( ) ;

		$atdDate = strtotime( $atdDate ) ;

		while( $stud = mysqli_fetch_assoc( $allStudentnGRNO ) )
		{
			extract( $stud ) ;

			$qry = " UPDATE "
					. " tblattendence "
						. " SET "
							. " isPresent = $forStatus , "
							. " tSubjectName = '$tSubjectName' "
							. " dDay = $atdDate "
							. " nStandardId = $nStandardId "
						. " WHERE "
							. " nGRNO = $nGRNO ";

			mysqli_query( $conn, $qry ) ;
		}
	}

	function updateExistAttendence( $atdDate, $nStandardId, $nGRNO, $forStatus )
	{
		$conn = $this->dbconnectModel( ) ;

		$atdDate = strtotime( $atdDate ) ;

		$qry = " UPDATE "
				. " tblattendence "
					. " SET "
						. " isPresent = $forStatus "
					. " WHERE "
						. " dDay = $atdDate "
						. " AND nGRNO = $nGRNO " ;

		mysqli_query( $conn, $qry ) ;
	}

	function getAllPredentStudentOn($atdDate)
	{
		$conn = $this->dbconnectModel( ) ;

		$toDate = strtotime($atdDate);

		$qry = "SELECT nGRNO FROM tblattendence WHERE dDay = $toDate AND isPresent = 1 ";

		$result = mysqli_query($conn , $qry);

		return $result;
	}

	function insertStudentData($tablename,$valuesArray)
	{
		$conn = $this->dbconnectModel();

		extract($valuesArray);
		echo "<br>$FirstName";
		echo "<br>$MiddleName";
		echo "<br>$LastName";
		echo "<br>$Gender";
		echo "<br>$DOB";
		echo "<br>$HostelStay";
		echo "<br>$IsActive";
		// echo "<br>$Standard";

		// $toDate = date("Y-m-d",strtotime($DOB));

		$qry = "INSERT INTO $tablename VALUES ( '' , '' , '$FirstName' , '$MiddleName' , '$LastName' , $Gender , CAST('". $DOB ."' AS DATE) , '' ,$HostelStay , $IsActive , $Standard)";

		mysqli_query($conn,$qry);

		echo "Data Inserted Succesfully";
	}

	function insertIntoStudentStandard($tablename , $nGRNO , $nStandardId)
	{
		$conn = $this->dbconnectModel();

		//extract($values);

		$qry = "INSERT INTO $tablename VALUES ( '',$nGRNO , $nStandardId )  ";

		mysqli_query($conn,$qry);

		echo "data inserted in student standard";
	}

	function studentViewSingle($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "SELECT "
					. " * "
				. " FROM "
					. " tblstudent "
				. " WHERE "
					. " nGRNO = '$id' " ;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}

	/*function editAnyData($tablename,$values,$id)
	{
		$conn = $this->dbconnectModel();

		extract($values);
		// echo "$firstname, $middlename, $lastname, $sex, $dateOfBirth, $hostelStay, $isActive, $Stream";
		$qry = "UPDATE $tablename SET `tFname` = $firstname, `tMname`=$middlename,`tLname`= $lastname, `bGender`= $bGender, `dBirthDate`=$dateOfBirth, `bStaysAtHostel`=$hostelStay, `bIsActive`=$isactive, `btStreamGroup`= $stream' WHERE 'nGRNO' = $id";
		

		
		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
	}*/
	function studentStandard($id){
		$conn = $this->dbconnectModel();
		$qry = "SELECT nStandardId FROM tblstudentstandard WHERE nGRNO = $id";
		$result = mysqli_query($conn, $qry);
		return $result;
	}
	function getSingleStudentView($id){
		$conn = $this->dbconnectModel( ) ;

		$qry = " SELECT * FROM tblstudent WHERE nGRNO = $id";
		
		$result = mysqli_query( $conn, $qry ) ;
		
		return $result ;
	}

	function editAnyData($tablename,$values,$id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = " UPDATE $tablename SET ".implode(" , ",$values)." WHERE nGRNO = '$id' ";
	
		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
	}

	function getAllStudentView()
	{
		$conn = $this->dbconnectModel( ) ;

		$qry = " SELECT "
					. " nGRNO, "
					. " tFname, "
					. " tMname, "
					. " tLname, "
					. " bGender, "
					. " dBirthDate, "
					. " bStaysAtHostel, "
					. "IsActive,"
					. "Stream Group"
				. " FROM "
					. " tblstudent " ;
		
		$result = mysqli_query( $conn, $qry ) ;
		
		return $result ;
	}

}



	// function checkDate( $atdDate )
	// {
	// 	$conn = $this->dbconnectModel( ) ;

	// 	$toDate = strtotime( $atdDate ) ;

	// 	$qry = " SELECT dDay FROM  "
	// 			. " tblattendence "
	// 			. " WHERE " 
	// 			. " dDay = $toDate " ;

	// 	$result = mysqli_query( $conn, $qry ) ;

	// 	return mysqli_num_rows( $result ) ;

	// }	

?>
