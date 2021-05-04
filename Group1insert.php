<?php  

/* Connect to the Azure MS SQL 2019 Express server using AD DS Authentication  */  

$serverName = "SQLServer";
$connectionInfo = array("Database"=>"Group1 Database","CharacterSet"=>"UTF-8");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection Established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}  
/* Define the query */  
$tsql1 = "INSERT INTO dbo.table1 (fname, lname, email, cell, address, city, state, zip)  
           VALUES (?, ?, ?, ?, ?, ?, ?, ?)";  

/* Construct the parameter array from HTML variable inputs */  
$fname = $_POST ["fname"];  
$lname = $_POST ["lname"];  
$email = $_POST ["email"];  
$cell = $_POST ["cell"];
$address = $_POST ["address"];
$city = $_POST ["city"];
$state = $_POST ["state"];
$zip = $_POST ["zip"];



$params1 = array(
	array ($fName, null),
	array($lname, null),
	array($email, null),
	array($cell, null),
	array($address, null),
	array($city, null),
	array($state, null),
	array($zip, null)   
           );    

/* Execute the INSERT query. */  
$stmt1 = sqlsrv_query($conn, $tsql1, $params1);  
if( $stmt1 === false )  
{  
     echo "Error in execution of INSERT.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
if( $stmt1 ) 
{
     echo "Database updated.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>