<?php
$serverName = "10.1.0.151"; // your host ip address
$dbName = "testdb"; // Your Database name here
$userName = "Your SQL Server accout here"; // The typical is  "sa"
$userPassword = "Your SQL Server SA password";

try {
    $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $date = date('Y-m-d H:i:s');
    echo "<b>Connected successfully Server:{$serverName} Database:{$dbName} @{$date}}</b><br>";

    $tsql="SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE='BASE TABLE';";
    $getProducts = $conn->prepare($tsql);  
    $getProducts->execute();  
    $products = $getProducts->fetchAll(PDO::FETCH_ASSOC);  
    echo "<br>";
    echo "DATABASE\t\tSCHEMA\t\tTABLE <br>";
    foreach($products as $product){
	echo $product['TABLE_CATALOG']." ".$product['TABLE_SCHEMA']." ".$product['TABLE_NAME']."<br>";
    }
    
    echo "<hr>";
    phpinfo();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
