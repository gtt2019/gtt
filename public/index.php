<?php
$serverName = "188.121.44.212"; //serverName\instanceName

$connectionInfo = array( "Database"=>"GTT_CPOS", "UID"=>"cposUser", "PWD"=>"b!Ska798");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {						
echo "Connection established.<br />";
$sql = "SELECT * FROM [role]";
$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt) ) {
      echo $row[0].", ".$row[1]."<br />";
}

sqlsrv_free_stmt( $stmt);	
	
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>