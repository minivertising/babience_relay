<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "insert_share_info" :
		$media	= $_REQUEST['media'];

		$query 		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, inner_media, sns_regdate) values('".$media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".$_SESSION['ss_media']."','".date("Y-m-d H:i:s")."')";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag = "Y";
		else
			$flag = "N";

		echo $flag;

	break;

	case "total_member" :
		$query 		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_blogger <> 0";
		$total_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));

		$len_cnt	= strlen($total_cnt);
		$innerHTML = "";
		for ($i=0; $i<$len_cnt; $i++){
			if ($len_cnt > 3 && $i==1)
				$innerHTML	.= "<img src='images/num/num_dash.png' alt=''/>";
				
			$innerHTML .= "<img src='images/num/num_".substr($total_cnt,$i,1).".png' alt=''/>";
		}
		$innerHTML .= "<img src='images/num/label_num.png' alt=''/>";
		echo $innerHTML;
	break;

	case "m_total_member" :
		$query 		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_blogger <> 0";
		$total_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));

		$len_cnt	= strlen($total_cnt);
		$innerHTML = "";
		for ($i=0; $i<$len_cnt; $i++){
			if ($len_cnt > 3 && $i==1)
				$innerHTML	.= "<img src='images/num/num_dash.png' class='dash' alt=''/>";
				
			$innerHTML .= "<img src='images/num/num_".substr($total_cnt,$i,1).".png' alt=''/>";
		}
		$innerHTML .= "<img src='images/num/label_num.png' alt=''/>";
		echo $innerHTML;

	break;

	case "total_give_member" :
		$innerHTML = "";
		$query 		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_blogger <> 0";
		$total_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));
		
		$innerHTML = number_format($total_cnt)."개";
		echo $innerHTML;

	break;

	case "m_total_give_member" :
		$innerHTML = "";
		$query 		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_blogger <> 0";
		$total_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));
		
		$innerHTML = number_format($total_cnt)."개";
		echo $innerHTML;

	break;

	case "total_give_member2" :
		$query 		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_blogger <> 0";
		$total_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));
		
		$len_cnt	= strlen($total_cnt);
		$innerHTML = "";
		for ($i=0; $i<$len_cnt; $i++){
			if ($len_cnt > 3 && $i==1)
				$innerHTML	.= "<img src='images/num2/num_dash.png' alt=''/>";

			$innerHTML .= "<img src='images/num2/num_".substr($total_cnt,$i,1).".png' alt=''/>";
		}
		$innerHTML .= "<img src='images/num2/label_num.png' alt=''/>";
		echo $innerHTML;

	break;

	case "m_total_give_member2" :
		$query 		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_blogger <> 0";
		$total_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));
		
		$len_give_cnt		= strlen($total_cnt);
		$innerHTML2 = "";
		for ($j=0; $j<$len_give_cnt; $j++){
			if ($len_give_cnt > 3 && $j==1)
				$innerHTML2	.= "<img src='images/num/num_dash.png' class='dash' alt=''/>";

			$innerHTML2 .= "<img src='images/num/num_".substr($total_cnt,$j,1).".png' alt=''/>";
		}
		$innerHTML2 .= "<img src='images/num/label_num.png' alt=''/>";
		echo $innerHTML2;

	break;

	case "insert_info" :
		$mb_name			= $_REQUEST['mb_name'];
		$mb_phone			= $_REQUEST['mb_phone'];
		$mb_baby_name	= $_REQUEST['mb_baby_name'];
		$blogger_num		= $_REQUEST['blogger_num'];

		$giftcode		= BR_winner_draw();
		$serial = BR_getSerial($giftcode);

		$total_query 	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_name='".$mb_name."' AND mb_phone='".$mb_phone."' AND mb_regdate like '%".date("Y-m-d")."%'";
		$total_result 	= mysqli_query($my_db, $total_query);
		$total_cnt	= mysqli_num_rows($total_result);


		$query 	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_name='".$mb_name."' AND mb_phone='".$mb_phone."' AND mb_blogger='".$blogger_num."' AND mb_regdate like '%".date("Y-m-d")."%'";
		$result 	= mysqli_query($my_db, $query);
		$dupli_cnt	= mysqli_num_rows($result);

		if ($total_cnt == 6)
		{
			$flag = "E";
		}else{
			if ($dupli_cnt == 0)
			{
				$re_query 	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_phone='".$mb_phone."'";
				$re_result 	= mysqli_query($my_db, $re_query);
				$re_cnt	= mysqli_num_rows($re_result);

				if ($re_cnt == 0)
				{
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
					
					//$transUrl	= "http://testurl.com";
					
					//include_once "./cre_image.php?serial=".$serial."&baby=".$mb_baby_name;
					//get_image($serial, $mb_baby_name);
					# 사용예제
					$objFont = new Font;

					$objFont->text  = $mb_baby_name;
					$objFont->size  = 20;
					$objFont->color = 0x000000;
					//$objFont->angle = 45;
					$objFont->font  = "/home/babience/nanumBold.ttf";

					$szFilePath     = "/home/babience/MOBILE/images/img_sns_give_paper_share_new.jpg";

					$cImage = getPrintToImage($szFilePath, $objFont, $serial, LEFT | MIDDLE);


					$image_url	= "http://www.babience-giveandtake.com/certi_images/".date('d')."/".$serial.".jpg";

					$query 	= "INSERT INTO ".$_gl['member_info_table']."(mb_ipaddr, mb_name, mb_phone, baby_name, mb_regdate, mb_gubun, mb_media, mb_serialnumber, mb_winner, mb_blogger, mb_s_url, mb_image) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_baby_name."','".date("Y-m-d H:i:s")."','".$gubun."','".$_SESSION['ss_media']."','".$serial."','".$giftcode."','".$blogger_num."', '".$transUrl."','".$image_url."')";
					$result 	= mysqli_query($my_db, $query);
					
					send_lms($mb_phone, $transUrl);
				}else{
					$query 	= "INSERT INTO ".$_gl['member_info_table']."(mb_ipaddr, mb_name, mb_phone, baby_name, mb_regdate, mb_gubun, mb_media, mb_serialnumber, mb_winner, mb_blogger) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_baby_name."','".date("Y-m-d H:i:s")."','".$gubun."','".$_SESSION['ss_media']."','".$serial."','".$giftcode."','".$blogger_num."')";
					$result 	= mysqli_query($my_db, $query);
				}
				$query2 	= "UPDATE ".$_gl['blogger_info_table']." SET recommend_cnt = recommend_cnt + 1 WHERE idx='".$blogger_num."'";
				$result2 	= mysqli_query($my_db, $query2);

				if ($result)
					$flag = $giftcode."||".$serial;
				else
					$flag = "N";
			}else{
				$flag = "D";
			}
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
			if ($search_data['mb_winner'] == "CASH")
			{
				$winner_gift	="베비언스 3천원 쿠폰";
			}else if ($search_data['mb_winner'] == "CAMERA"){
				$winner_gift	="DSLR 카메라";
			}else if ($search_data['mb_winner'] == "HOTEL"){
				$winner_gift	="하얏트 호텔 숙박권";
			}else if ($search_data['mb_winner'] == "WG"){
				$winner_gift	="베베프람 웨건";
			}else if ($search_data['mb_winner'] == "MILK"){
				$winner_gift	="베비언스 분유 1년치";
			}else if ($search_data['mb_winner'] == "WATER"){
				$winner_gift	="베이비워터 24병";
			}else if ($search_data['mb_winner'] == "WASH"){
				$winner_gift	="메소드 핸드워시";
			}
			$innerHTML		.="<div class='inner clearfix'>";
			$innerHTML		.="<div class='txt'>".$winner_gift."</div>";
			$innerHTML		.="<div class='txt num'>".$search_data['mb_serialnumber']."</div>";
			$innerHTML		.="<div class='btn'><a href='#' onclick=copy_url('".$search_data['mb_serialnumber']."')><img src='images/popup/btn_copy2.png' /></a></div>";
			$innerHTML		.="</div>";
		}
		echo $innerHTML;
	break;

	case "m_search_info" :
		$s_name		= $_REQUEST['s_name'];
		$s_phone	= $_REQUEST['s_phone'];

		$query 	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_name='".$s_name."' AND mb_phone='".$s_phone."'";
		$result 	= mysqli_query($my_db, $query);

		$i = 0;
		$style_css = "";

		$innerHTML	= "<div class='list_one label clearfix'>";
		$innerHTML	.= "<div class='gift_name'>선물</div>";
		$innerHTML	.= "<div class='gift_num'>선물 번호</div>";
		$innerHTML	.= "</div>";
		$innerHTML	.= "<div class='copy_notice'>아래 선물 번호를 선택하여 복사해주세요!</div>";
    

		while ($search_data = mysqli_fetch_array($result))
		{
			if ($i > 5)
				$style_css	= "style='display:none;'";

			if ($search_data['mb_winner'] == "CASH")
			{
				$winner_gift	="베비언스 3천원 쿠폰";
			}else if ($search_data['mb_winner'] == "CAMERA"){
				$winner_gift	="DSLR 카메라";
			}else if ($search_data['mb_winner'] == "HOTEL"){
				$winner_gift	="하얏트 호텔 숙박권";
			}else if ($search_data['mb_winner'] == "WG"){
				$winner_gift	="베베프람 웨건";
			}else if ($search_data['mb_winner'] == "MILK"){
				$winner_gift	="베비언스 분유 1년치";
			}else if ($search_data['mb_winner'] == "WATER"){
				$winner_gift	="베이비워터 24병";
			}else if ($search_data['mb_winner'] == "WASH"){
				$winner_gift	="메소드 핸드워시";
			}
			$innerHTML		.="<div class='list_one clearfix' ".$style_css.">";
			$innerHTML		.="<div class='gift_name'>".$winner_gift."</div>";
			$innerHTML		.="<div class='gift_num'>".$search_data['mb_serialnumber']."</div>";
			//$innerHTML		.="<div class='btn'><a href='#' onclick=copy_url('".$search_data['mb_serialnumber']."')><img src='images/btn_copy.png' /></a></div>";
			$innerHTML		.="</div>";
			$i++;
		}
		if ($i > 6)
		{
			$innerHTML		.="<div class='btn_more'>";
			$innerHTML		.="<a href='#' onclick='more_info()'>더보기</a>";
			$innerHTML		.="</div>";
		}

		if ($i == 0)
		{
			$innerHTML	 = "<div class='gift_num_list'>";
			$innerHTML	 .= "<div class='no_gift' style='padding-bottom:0px'>";
			$innerHTML	 .= "<a href='index.php'><img src='images/popup/img_no_gift.png' /></a>";
			$innerHTML	 .= "</div></div>";

			echo "<script>$('.sec_lms_gift_btn').hide()</script>";
		}
		echo $innerHTML;
	break;
	case "insert_comment" :
		$mb_nickname		= $_REQUEST['mb_nickname'];
		$mb_comment		= $_REQUEST['mb_comment'];
		$blogger_idx		= $_REQUEST['blogger_idx'];

		$week_num			= today_week();

		$query 	= "INSERT INTO ".$_gl['comment_info_table']."(ip_addr, blogger_idx, week_num, mb_nickname, mb_message, media, regdate) values('".$_SERVER['REMOTE_ADDR']."','".$blogger_idx."','".$week_num."','".$mb_nickname."','".$mb_comment."','".$_SESSION['ss_media']."','".date("Y-m-d H:i:s")."')";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag = "Y";
		else
			$flag = "N";

		echo $flag;
	break;

	case "view_comment" :
		$num		= $_REQUEST['num'];
		$comment_info = select_comment();
		
		$innerHTML	= "";
		$i = 1;
		$gubun = "";
		if ($comment_info[$num])
		{
			foreach($comment_info[$num] as $key => $val)
			{
				if ($i > 1)
					$gubun	= "style='display:none'";
				$innerHTML	.="<span id='cn_".$i."' ".$gubun.">".$key." </span>";
				$innerHTML	.="<span id='ct_".$i."' class='t'' ".$gubun.">".$val."</span>";
				$i++;
			}
		}
		echo $innerHTML."||".sizeof($comment_info[$num]);
	break;

	case "m_view_comment" :
		$num		= $_REQUEST['num'];
		$comment_info = select_comment();
		
		$innerHTML	= "";
		$i = 1;
		$gubun = "";
		if ($comment_info[$num])
		{
			foreach($comment_info[$num] as $key => $val)
			{
				if ($i > 1)
					$gubun	= "style='display:none'";
				$innerHTML	.= "<div id='cn_".$i."' ".$gubun." class='id'>".$key."</div>";
				$innerHTML	.= "<div id='da_".$i."' class='dash' ".$gubun.">|</div>";
				$innerHTML	.= "<div id='ct_".$i."' class='txt' ".$gubun.">".$val."</div>";
				$i++;
			}
		}
		echo $innerHTML."||".sizeof($comment_info[$num]);
	break;
	//case "insert_recom" :

	//$query 		= "INSERT INTO ".$_gl['member_info_table']."(sns_media, sns_ipaddr, sns_gubun, sns_regdate) values('".$media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".date("Y-m-d H:i:s")."')";
	//$result 	= mysqli_query($my_db, $query);

	//break;
}
?>