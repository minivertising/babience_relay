<?
	include_once "config.php";

	//unset($media);
	$media	= $_REQUEST['media'];

	$_SESSION['ss_media'] = $media;

	BR_InsertTrackingInfo($media, $gubun);

	if($gubun == "MOBILE")
	{
		Header("Location:http://www.babience-giveandtake.com/MOBILE/index.php");
		exit;
	}else{
		Header("Location:http://www.babience-giveandtake.com/PC/index.php");
		exit;
	}

?>
