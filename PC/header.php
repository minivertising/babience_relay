<?
	include_once "../config.php";
?>
<!doctype html>
<html>
  <head>
    <title>Babience Relay</title>
    <meta property="og:title" content="베비언스">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.babience-giveandtake.com/PC/index.php" />
    <meta property="og:image" content="http://www.babience-giveandtake.com/MOBILE/images/img_sns_share.jpg" />
    <meta property="og:description" content="우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <link rel="shortcut icon" type="image/x-icon" href="./images/pavicon.ico" /> -->
    <link rel="stylesheet" type="text/css" href="../lib/Magnific-Popup/magnific-popup.css"> 
    <link rel="stylesheet" type="text/css" href="./css/style.css"> 
    <link rel="stylesheet" href="../lib/iCheck/skins/all.css">
    <link rel="stylesheet" type="text/css" href="./css/style_yang.css"> 
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../lib/Magnific-Popup/jquery.magnific-popup.js"></script>
    <script type='text/javascript' src='../lib/iCheck/icheck.js'></script>
<?
	if ($IE7 == "N")
	{
?>
    <script type="text/javascript" src="../js/main.js"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<?
	}else{
?>
    <script type="text/javascript" src="../js/main_ie7.js"></script>
<?
	}
?>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
<!-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63183773-1', 'auto');
  ga('send', 'pageview');



</script> -->
  </head>
<body class="main">
