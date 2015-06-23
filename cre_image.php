<?
	print_r('111');
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

	function getPrintToImage($szFilePath, &$objFont, $nFontAlign = 0x12)
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
		$serial	= $_REQUEST['serial'];
		$baby		= $_REQUEST['baby'];

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
		$arrTTFBBox  = ImageTTFBBox($objFont->size, $objFont->angle, $objFont->font, $baby);

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

		ImageTTFText($nImage, $objFont->size, $objFont->angle, $nX, $nY, $nFontColor, $objFont->font, $baby);

		switch ($arrImgInfo[2])
		{
		case 1:
			# GIF
			ImageGIF($nImage,'simpletext.gif');
			break;
		case 2:
			# JPG
			ImageJPEG($nImage,$serial.'.jpg',100);
			break;
		case 3:
			# PNG
			ImagePNG($nImage,'simpletext.png');
			break;
		default:
			return FALSE;
		}
		imagedestroy($nImage);
		return TRUE;
	}

	# 사용예제
	$objFont = new Font;

	$objFont->text  = "baby";
	$objFont->size  = 25;
	$objFont->color = 0x000000;
	//$objFont->angle = 45;
	$objFont->font  = "nanum.ttf";

	$szFilePath     = "test_image.jpg";

	$cImage = getPrintToImage($szFilePath, $objFont, LEFT | MIDDLE);

?>