<?
	include_once "../config.php";
	
	$gift = "cash";
	for ($i=0; $i < 100000;$i++)
	{
		$serial = PHPRandom::getHexString("10");
		$query 	= "INSERT INTO serial_info_(serial_code,gift) values('tm".$serial."','".$gift."')";
		$result 	= mysqli_query($my_db, $query);
	}
?>
