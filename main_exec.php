<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "insert_share_info" :
		$media	= $_REQUEST['media'];

		$query 		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, sns_regdate) values('".$media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".date("Y-m-d H:i:s")."')";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag = "Y";
		else
			$flag = "N";

		echo $flag;

	break;

	case "total_member" :
		$query 		= "SELECT * FROM ".$_gl['member_info_table']."";
		$result 	= mysqli_num_rows(mysqli_query($my_db, $query));

		echo $result;
	break;

	case "insert_info" :
		$mb_name			= $_REQUEST['mb_name'];
		$mb_phone			= $_REQUEST['mb_phone'];
		$mb_baby_name	= $_REQUEST['mb_baby_name'];
		$blogger_num		= $_REQUEST['blogger_num'];

		$serial = PHPRandom::getHexString("10");
		
		$giftcode		= BR_winner_draw();
		$query 	= "INSERT INTO ".$_gl['member_info_table']."(mb_ipaddr, mb_name, mb_phone, baby_name, mb_regdate, mb_gubun, mb_media, mb_serialnumber, mb_winner) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_baby_name."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$serial."','".$giftcode."')";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag = "Y";
		else
			$flag = "N";

		echo $flag;
	break;
	//case "insert_recom" :

	//$query 		= "INSERT INTO ".$_gl['member_info_table']."(sns_media, sns_ipaddr, sns_gubun, sns_regdate) values('".$media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".date("Y-m-d H:i:s")."')";
	//$result 	= mysqli_query($my_db, $query);

	//break;
}
?>