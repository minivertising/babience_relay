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

		$giftcode		= BR_winner_draw();
		$serial = BR_getSerial($giftcode);

		$query 	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_name='".$mb_name."' AND mb_phone='".$mb_phone."' AND mb_blogger='".$blogger_num."' AND mb_regdate like '%".date("Y-m-d")."%'";
		$result 	= mysqli_query($my_db, $query);
		$dupli_cnt	= mysqli_num_rows($result);

		if ($dupli_cnt == 0)
		{
			/*
			// 네이버 api 이용하여 짧은 URL 만들기
			$key			= "b37ad805616f32a4da00557c89b21dd9"; // 사용자가 발급받은 단축 URL KEY를 입력 하세요
			$longurl		= "http://www.babience-giveandtake.com/MOBILE/certificate.php?serial=".$serial;
			$url = sprintf("%s?url=%s&key=%s", "http://openapi.naver.com/shorturl.xml", $longurl, $key);
			$data =file_get_contents($url);
			$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);

			if($xml->code == 200){
				$transUrl = $xml->result->url;
				$orgUrl = $xml->result->orgUrl;
				$qr = $xml->result->url.".qr";
			}
			*/
			$transUrl	= "http://testurl.com";
			
			//include_once "./cre_image.php?serial=".$serial."&baby=".$mb_baby_name;
			//get_image($serial, $mb_baby_name);
			# 사용예제
			$objFont = new Font;

			$objFont->text  = "baby";
			$objFont->size  = 25;
			$objFont->color = 0x000000;
			//$objFont->angle = 45;
			$objFont->font  = "nanum.ttf";

			$szFilePath     = "test_image.jpg";

			$cImage = getPrintToImage($szFilePath, $objFont, $mb_baby_name, $serial, LEFT | MIDDLE);


			$image_url	= "http://www.babience-giveandtake.com/certi_images/".$serial.".jpg";

			$query 	= "INSERT INTO ".$_gl['member_info_table']."(mb_ipaddr, mb_name, mb_phone, baby_name, mb_regdate, mb_gubun, mb_media, mb_serialnumber, mb_winner, mb_blogger, mb_s_url, mb_image) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_baby_name."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$serial."','".$giftcode."','".$blogger_num."', '".$transUrl."','".$image_url."')";
			$result 	= mysqli_query($my_db, $query);

			$query2 	= "UPDATE ".$_gl['blogger_info_table']." SET recommend_cnt = recommend_cnt + 1 WHERE idx='".$blogger_num."'";
			$result2 	= mysqli_query($my_db, $query2);

			//send_lms($mb_phone, );
			if ($result)
				$flag = $giftcode."||".$serial;
			else
				$flag = "N";
		}else{
			$flag = "D";
		}
		echo $flag;
	break;

	case "search_info" :
		$s_name		= $_REQUEST['s_name'];
		$s_phone	= $_REQUEST['s_phone'];

		$query 	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_name='".$s_name."' AND mb_phone='".$s_phone."'";
		$result 	= mysqli_query($my_db, $query);

		$innerHTML	= "";
		while ($search_data = mysqli_fetch_array($result))
		{
			$innerHTML		.="<div>";
			$innerHTML		.=$search_data['mb_winner']."||".$search_data['mb_serialnumber']."<a href='#' onclick=copy_url('".$search_data['mb_serialnumber']."')>복사하기</a>";
			$innerHTML		.="</div>";
		}
		echo $innerHTML;
	break;
	//case "insert_recom" :

	//$query 		= "INSERT INTO ".$_gl['member_info_table']."(sns_media, sns_ipaddr, sns_gubun, sns_regdate) values('".$media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".date("Y-m-d H:i:s")."')";
	//$result 	= mysqli_query($my_db, $query);

	//break;
}
?>