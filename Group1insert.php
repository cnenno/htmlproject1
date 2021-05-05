<?php  

/* Connect to the Azure MS SQL 2019 Express server using AD DS Authentication  */  

$serverName = "SQLSERVER\SQLEXPRESS";
$connectionInfo = array("Database"=>"Group_1_Database","CharacterSet"=>"UTF-8");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection Established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}  
/* Define the query */  
$tsql1 = "INSERT INTO dbo.table1 (firstname, lastname, email, address, city, state, zipcode, phone)  
           VALUES (?, ?, ?, ?, ?, ?, ?, ?)";  

/* Construct the parameter array from HTML variable inputs */  
$firstname = $_POST ["firstname"];  
$lastname = $_POST ["lastname"];  
$email = $_POST ["email"];
$address = $_POST ["address"];  
$city = $_POST ["city"];
$state = $_POST ["state"];
$zipcode = $_POST ["zipcode"];
$phone = $_POST ["phone"];



$params1 = array(
	array ($firstname, null),
	array($lastname, null),
	array($email, null),
	array($address, null),
	array($city, null),
	array($state, null),
	array($zipcode, null),
	array($phone, null)  
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
     echo "Database updated by Webserver1.
     <br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

 
echo '<img src="iisstart.jpeg"/>';

//C:\inetpub\wwwroot\iisstart.png
?>