<?
	include_once "../config.php";

	if ($gubun == "MOBILE")
		echo "<script>location.href='http://www.babience-giveandtake.com/?media=ks';</script>";
?>
<!doctype html>
<html>
  <head>
    <title>Babience</title>
    <meta property="og:title" content="베비언스">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.babience-giveandtake.com/PC/index.php" />
    <meta property="og:image" content="http://www.babience-giveandtake.com/MOBILE/images/img_sns_share.jpg" />
    <meta property="og:description" content="우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <link rel="shortcut icon" type="image/x-icon" href="./images/pavicon.ico" /> -->
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../lib/Magnific-Popup/magnific-popup.css"> 
    <link rel="stylesheet" type="text/css" href="./css/style.css"> 
    <link rel="stylesheet" href="../lib/iCheck/skins/all.css">
<?
	if ($IE7 == "N")
	{
?>
    <link rel="stylesheet" type="text/css" href="./css/style_yang.css"> 
<?
	}else{
?>
    <link rel="stylesheet" type="text/css" href="./css/style_yang_ie7.css"> 
<?
	}
?>

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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64600543-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Facebook Conversion Code for 베비언스_잠재 고객 - lgcare&#064;incross.com 1 -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6028282329497', {'value':'0.00','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6028282329497&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
</head>
<body class="main">
