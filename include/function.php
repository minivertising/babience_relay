<?
	// 유입매체 정보 입력
	function BR_InsertTrackingInfo($media, $gubun)
	{
		global $_gl;
		global $my_db;

		$query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$result		= mysqli_query($my_db, $query);
	}

	function BR_winner_draw()
	{
		global $_gl;
		global $my_db;

		$today_water	= 3;
		$today_coffee	= 10;
		/*$water_array = array("Y","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N");
		$coffee_array = array("Y","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N");
		
		// 오늘의 경품별 당첨자 수 구하기
		$query		= "SELECT mb_winner, count(mb_winner) cnt FROM ".$_gl['member_info_table']." WHERE mb_regdate like '%".date("Y-m-d")."%' GROUP BY mb_winner";
		$result		= mysqli_query($my_db, $query);

		while ($prize_data = mysqli_fetch_array($result))
		{
			$winner_data[$prize_data['mb_winner']]	= $prize_data['cnt'];
		}
		// 오늘의 경품별 당첨자 수 구하기 끝

		if ($winner_data['WATER'] >= $today_water)
		{
			if ($winner_data['COFFEE'] >= $today_coffee)
			{
				$winner	= "CASH";
			}else{
				shuffle($coffee_array);
				if ($coffee_array[0] == "Y")
					$winner	= "COFFEE";
				else
					$winner	= "CASH";
			}
		}else{
			shuffle($water_array);
			if ($water_array[0] == "Y")
			{
				$winner	= "WATER";
			}else{
				if ($winner_data['COFFEE'] >= $today_coffee)
				{
					$winner	= "CASH";
				}else{
					shuffle($coffee_array);
					if ($coffee_array[0] == "Y")
						$winner	= "COFFEE";
					else
						$winner	= "CASH";
				}
			}
		}*/
		$water_array = array(450,1850,4550);
		$coffee_array = array(530,1560,2050,2250,2550,3050,4050,5050,6050,7050);

		// 오늘의 이벤트 참여자 수 구하기
		$total_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_regdate like '%".date("Y-m-d")."%'";
		$total_result		= mysqli_query($my_db, $total_query);
		$total_num		= mysqli_num_rows($total_result);
		
		foreach ($coffee_array as $key => $val)
		{
			if ($total_num == $val)
			{
				$winner = "WASH";
				break;
			}
			$winner = "CASH";
		}

		if ($winner == "CASH")
		{
			foreach ($water_array as $key => $val)
			{
				if ($total_num == $val)
				{
					$winner = "WATER";
					break;
				}
				$winner = "CASH";
			}
		}

		return $winner;
	}

	function BR_getSerial($gift)
	{
		global $_gl;
		global $my_db;

		$query		= "SELECT serial_code FROM ".$_gl['serial_info_table']." WHERE gift='".$gift."' AND useYN='N' limit 1";
		$result		= mysqli_query($my_db, $query);
		$data			= mysqli_fetch_array($result);

		$query2		= "UPDATE ".$_gl['serial_info_table']." SET useYN='Y' WHERE serial_code='".$data[serial_code]."'";
		$result2		= mysqli_query($my_db, $query2);

		return $data[serial_code];
	}

define('LEFT',   0x01);
define('CENTER', 0x02);
define('RIGHT',  0x04);
define('TOP',    0x08);
define('MIDDLE', 0x10);
define('BOTTOM', 0x20);

class Font
{
    var $text   = "http://aaa.com";
    var $color  = 0x000000;
    var $size   = 10;
    var $angle  = 0;
    var $font;
}

function getPrintToImage($szFilePath, &$objFont, $serial, $nFontAlign = 0x12)
{
    # 이미지 파일이 존재하는지 체크한다.
    if (!file_exists($szFilePath))
    {
        return FALSE;
    }

    # 이미지 파일 정보를 구한다.(크기및 타입)
    $arrImgInfo = GetImageSize($szFilePath);

    # 해당 이미지 포멧이 지원되는지 체크한다. 
    switch ($arrImgInfo[2])
    {
    case 1:
        # GIF
        if (!(ImageTypes() & IMG_GIF))
        {
            return FALSE;
        }

        $szContentType = "image/gif";

        break;
    case 2:
        # JPG
        if (!(ImageTypes() & IMG_JPG))
        {
            return FALSE;
        }

        $szContentType = "image/jpeg";

        break;
    case 3:
        # PNG
        if (!(ImageTypes() & IMG_PNG))
        {
            return FALSE;
        }

        $szContentType = "image/png";

        break;
    default:
        return FALSE;
    }

    header ("Content-type: ".$szContentType);
    # 이미지 파일을 읽어 이미지를 생성한다.
    $fp = fopen($szFilePath, "rb");
    $szContent = fread($fp, filesize($szFilePath));
    fclose($fp);

    $nImage = ImageCreateFromString($szContent);

	# 프린트할 글의 색상을 준비한다.
    $nBlue  = $objFont->color & 0xFF;
    $nGreen = $objFont->color >> 0x08 & 0xFF;
    $nRed   = $objFont->color >> 0x10 & 0xFF;

    $nFontColor  = ImageColorAllocate($nImage, $nRed, $nGreen, $nBlue);

    # 프린트할 글의 위치를 결정한다.
    $arrTTFBBox  = ImageTTFBBox($objFont->size, $objFont->angle, $objFont->font, $objFont->text);

    $nMax = max($arrTTFBBox[0], $arrTTFBBox[2], $arrTTFBBox[4], $arrTTFBBox[6]);
    $nMin = min($arrTTFBBox[0], $arrTTFBBox[2], $arrTTFBBox[4], $arrTTFBBox[6]);

    if ($nFontAlign & LEFT)
    {
        $nX = $arrTTFBBox[0] - $nMin;
    }
    else if ($nFontAlign & CENTER)
    {
        $nX = ($arrImgInfo[0] - ($nMax + $nMin)) / 2 + $arrTTFBBox[0];
    }
    else
    {
        $nX = $arrImgInfo[0] - $nMax + $arrTTFBBox[0];
    }

    $nMax = max($arrTTFBBox[1], $arrTTFBBox[3], $arrTTFBBox[5], $arrTTFBBox[7]);
    $nMin = min($arrTTFBBox[1], $arrTTFBBox[3], $arrTTFBBox[5], $arrTTFBBox[7]);

    if ($nFontAlign & TOP)
    {
        $nY = $arrTTFBBox[1] - $nMin;
    }
    else if ($nFontAlign & MIDDLE)
    {
        $nY = ($arrImgInfo[1] - ($nMax + $nMin)) / 2 + $arrTTFBBox[1];
    }
    else
    {
        $nY = $arrImgInfo[1] - $nMax + $arrTTFBBox[1];
    }
	$nX = 617;
	$nY = 352;
    ImageTTFText($nImage, $objFont->size, $objFont->angle, $nX, $nY, $nFontColor, $objFont->font, $objFont->text);

	$mydir = "certi_images/".date("d"); 
	 if(@mkdir($mydir, 0777)) { 
		if(is_dir($mydir)) { 
			@chmod($mydir, 0777); 
		} 
	 }

    switch ($arrImgInfo[2])
    {
		case 1:
			# GIF
			ImageGIF($nImage,'simpletext.gif');
			break;
		case 2:
			# JPG
			ImageJPEG($nImage,'./certi_images/'.$serial.'.jpg',100);
			break;
		case 3:
			# PNG
			ImagePNG($nImage,'/home/babience/'.$mydir.'/'.$serial.'.png');
			break;
		default:
			return FALSE;
    }
	imagedestroy($nImage);
    return TRUE;
}

	function select_comment()
	{
		global $_gl;
		global $my_db;

		$query		= "SELECT blogger_idx, mb_nickname, mb_message FROM ".$_gl['comment_info_table']." WHERE viewYN='Y'";
		$result		= mysqli_query($my_db, $query);

		while ($c_data	= mysqli_fetch_array($result))
		{
			if ($c_data['blogger_idx']	== "1")
			{
				$blogger_info[$c_data['blogger_idx']][$c_data['mb_nickname']]		= $c_data['mb_message'];
			}else if ($c_data['blogger_idx']	== "2"){
				$blogger_info[$c_data['blogger_idx']][$c_data['mb_nickname']]		= $c_data['mb_message'];
			}else if ($c_data['blogger_idx']	== "3"){
				$blogger_info[$c_data['blogger_idx']][$c_data['mb_nickname']]		= $c_data['mb_message'];
			}else if ($c_data['blogger_idx']	== "4"){
				$blogger_info[$c_data['blogger_idx']][$c_data['mb_nickname']]		= $c_data['mb_message'];
			}else if ($c_data['blogger_idx']	== "5"){
				$blogger_info[$c_data['blogger_idx']][$c_data['mb_nickname']]		= $c_data['mb_message'];
			}else if ($c_data['blogger_idx']	== "6"){
				$blogger_info[$c_data['blogger_idx']][$c_data['mb_nickname']]		= $c_data['mb_message'];
			}
		}
	
		return $blogger_info;
	}

	function today_week()
	{
		global $_gl;
		global $my_db;

		if (date("Y-m-d") < "2015-07-08")
		{
			$week_num	= $_gl['week']['1'];
		}else if (date("Y-m-d") >= "2015-07-08" && date("Y-m-d") < "2015-07-15"){
			$week_num	= $_gl['week']['2'];
		}else if (date("Y-m-d") >= "2015-07-15" && date("Y-m-d") < "2015-07-22"){
			$week_num	= $_gl['week']['3'];
		}else if (date("Y-m-d") >= "2015-07-22"){
			$week_num	= $_gl['week']['4'];
		}

		return $week_num;
	}
	// LMS 발송 
	function send_lms($phone, $s_url)
	{
		global $_gl;
		global $my_db;

		$httpmethod = "POST";
		$url = "http://api.openapi.io/ppurio/1/message/lms/minivertising";
		$clientKey = "MTAyMC0xMzg3MzUwNzE3NTQ3LWNlMTU4OTRiLTc4MGItNDQ4MS05NTg5LTRiNzgwYjM0ODEyYw==";
		$contentType = "Content-Type: application/x-www-form-urlencoded";
	
		$response = sendRequest($httpmethod, $url, $clientKey, $contentType, $phone, $s_url);

		$json_data = json_decode($response, true);

		/*
		받아온 결과값을 DB에 저장 및 Variation
		*/
		$query3 = "INSERT INTO sms_info(send_phone, send_status, cmid, send_regdate) values('".$phone."','".$json_data['result_code']."','".$json_data['cmid']."','".date("Y-m-d H:i:s")."')";
		$result3 		= mysqli_query($my_db, $query3);

		$query2 = "UPDATE member_info SET mb_lms='Y' WHERE mb_phone='".$phone."'";
		$result2 		= mysqli_query($my_db, $query2);

		if ($json_data['result_code'] == "200")
			$flag = "Y";
		else
			$flag = "N";

		return $flag;
	}

	function sendRequest($httpMethod, $url, $clientKey, $contentType, $phone, $s_url) {

		//create basic authentication header
		$headerValue = $clientKey;
		$headers = array("x-waple-authorization:" . $headerValue);

		$params = array(
			'send_time' => '', 
			'send_phone' => '07048883580', 
			'dest_phone' => $phone, 
			//'dest_phone' => '01030033965', 
			'send_name' => '', 
			'dest_name' => '', 
			'subject' => 'VDL MEETS KAKAO FRIENDS',
			'msg_body' => "
축하해요!
VDL 5천원 할인 쿠폰에 당첨 되었습니다.

지금 매장에 오시면 감각적인 VDL과 귀여운 카카오프렌즈의 콜라보레이션 제품을 만나보실 수 있습니다!

신청하신 VDL FRIENDS KIT의 당첨 결과는 2015.6.17(수)에 개별로 연락 드립니다.

▶5천원 쿠폰 바로 사용하기 : 
".$s_url."

▶문의 전화 번호
070-4888-3580
"
		);

		//curl initialization
		$curl = curl_init();

		//create request url
		//$url = $url."?".$parameters;

		curl_setopt ($curl, CURLOPT_URL , $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt ($curl, CURLINFO_HEADER_OUT, true);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);

		$response = curl_exec($curl);

		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$responseHeaders = curl_getinfo($curl, CURLINFO_HEADER_OUT);


		curl_close($curl);

		return $response;
	}

?>