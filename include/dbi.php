<?
    /******************************************************************************
     *
     * dbi.php
     *
     * Configuration file
     *
     * Created : 2014
     *
     ******************************************************************************/
	$my_db = new mysqli("218.54.46.7", "root", "m!nv#Rtisin9", "babience_relay");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
?>
