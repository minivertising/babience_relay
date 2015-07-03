<?
	//include_once   "./header.php";
	include_once "../config.php";

	$serial	= $_REQUEST['serial'];
	$long_url		= "http://www.babience-giveandtake.com/MOBILE/certificate.php?serial=".$serial."&media=baby_fb";
	$long_url_kt		= "http://www.babience-giveandtake.com/MOBILE/certificate.php?serial=".$serial."&media=baby_kt";
	$long_url_ks		= "http://www.babience-giveandtake.com/MOBILE/certificate.php?serial=".$serial."&media=baby_ks";
	$query	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_serialnumber='".$serial."'";
	$result 	= mysqli_query($my_db, $query);
	$member_info	= mysqli_fetch_array($result);
	$img_url = str_replace("http://www.babience-giveandtake.com/", "http://218.54.46.7/", $member_info['mb_image']);
	if(file_exists($img_url))
	{
		$img_url	= $img_url;
	}
	else
	{
		$img_url	= str_replace("http://www.babience-giveandtake.com/", "http://218.54.46.6/", $member_info['mb_image']);
	}

?>
<!doctype html>
<html>
  <head>
    <title>Babience</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta property="og:title" content="베비언스">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?=$long_url	?>" />
    <meta property="og:image" content="<?=$img_url?>" />
    <meta property="og:description" content="우리 아기 몸과 마음 모두 성장하는 기부 앤 테이크 릴레이 캠페인에 꼭 참여해주세요!">

    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../lib/Magnific-Popup/magnific-popup.css"> 
    <link rel="stylesheet" type="text/css" href="./css/style.css"> 
    <link rel="stylesheet" href="../lib/iCheck/skins/all.css">
    <link rel="stylesheet" type="text/css" href="./css/style_yang.css"> 
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../lib/Magnific-Popup/jquery.magnific-popup.js"></script>
    <script type='text/javascript' src='../lib/iCheck/icheck.js'></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
<?
	if ($_REQUEST['media'])
	{
?>
	<script type="text/javascript">
	location.href="http://www.babience-giveandtake.com/?media=<?=$_REQUEST['media']?>";
	</script>
<?
	}
?>
    <style>
	html,body { height: 100%; margin: 0; padding: 0;}
    </style>
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

<div class="sec_give_paper_block">
  <div class="name"><?=$member_info['baby_name']?></div>
  <div class="btn">
    <a href="#" onclick="c_sns_share('baby_kt')" id="kakao-link-btn"><img src="images/lms_sns_kt.png" alt=""/></a>
    <a href="#" onclick="c_sns_share('baby_ks')"><img src="images/lms_sns_ks.png" alt=""/></a>
    <a href="#" onclick="c_sns_share('baby_fb')"><img src="images/lms_sns_fb.png" alt=""/></a>
  </div>
  <div class="bg"><img src="images/lms_bg.jpg" alt=""/></div>
</div>

<div class="sec_lms_gift">
  <div class="title">
    <img src="images/lms_gift_title.jpg" />
  </div>
  <div class="list_block">
    <div class="list_one label clearfix">
      <div class="gift_name">선물</div>
      <div class="gift_num">선물 번호</div>
    </div>
    <div class="copy_notice">아래 선물 번호를 선택하여 복사해주세요!</div>
  </div> 
  <div class="list_block">
<?
	$query 	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_phone='".$member_info['mb_phone']."'";
	$result 	= mysqli_query($my_db, $query);

	$i = 0;
	$style_css	= "";
	while ($data = mysqli_fetch_array($result))
	{
		if ($i > 5)
			$style_css	= "style='display:none;'";

		if ($data['mb_winner'] == "CASH")
		{
			$winner_gift	="베비언스 3천원 쿠폰";
		}else if ($data['mb_winner'] == "CAMERA"){
			$winner_gift	="DSLR 카메라";
		}else if ($data['mb_winner'] == "HOTEL"){
			$winner_gift	="하얏트 호텔 숙박권";
		}else if ($data['mb_winner'] == "WG"){
			$winner_gift	="베베프람 웨건";
		}else if ($data['mb_winner'] == "MILK"){
			$winner_gift	="베비언스 분유 1년치";
		}else if ($data['mb_winner'] == "WATER"){
			$winner_gift	="베이비워터 24병";
		}else if ($data['mb_winner'] == "WASH"){
			$winner_gift	="메소드 핸드워시";
		}
?>
    <div class="list_one clearfix view_info" <?=$style_css?>>
      <div class="gift_name"><?=$winner_gift?></div>
      <div class="gift_num"><?=$data['mb_serialnumber']?></div>
      <!-- <div class="btn"><a href="#" onclick="copy_url('<?=$data['mb_serialnumber']?>')"><img src="images/btn_copy.png" alt=""/></a></div> -->
    </div>
<?
		$i++;
	}
	if ($i > 5)
	{
?>
    <div class="btn_more">
      <a href="#" onclick="more_show();return false;">더보기</a>
    </div>
<?
	}
?>
  </div>         
</div>  

<div class="sec_lms_gift_btn">
  <a href="http://www.babience.com/m/event/150701/event.jsp" target="_blank"><img src="images/lms_gift_btn.jpg" /></a>
</div>

<div class="sec_lms_footer">
  <img src="images/lms_footer.jpg" />
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	Kakao.init('b9c52d3d573fd09cbe25e306fafc5df6');
	//$("#kakao-link-btn").click();
});

function c_sns_share(media)
{
	if (media == "baby_fb")
	{
		var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('<?=$long_url?>'),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"media" : media
			}
		});
	}else if (media == "baby_kt"){
		// 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
		Kakao.Link.createTalkLinkButton({
		  container: '#kakao-link-btn',
		  label: "[우리 아기 첫 기부 증서]\r\n\r\n우리 아기 몸과 마음 모두 성장하는 기부 앤 테이크 릴레이 캠페인에 꼭 참여해주세요!",
		  image: {
			src: "<?=$img_url?>",
			width: '1200',
			height: '630'
		  },
		  webButton: {
			text: '베비언스',
			url: '<?=$long_url_kt	?>' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
		  }
		});
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"media" : media
			}
		});
	}else{
		// 로그인 창을 띄웁니다.
		Kakao.Auth.login({
			success: function() {

				// 로그인 성공시, API를 호출합니다.
				Kakao.API.request( {
					url : '/v1/api/story/linkinfo',
					data : {
						url : '<?=$long_url_ks	?>'
					}
				}).then(function(res) {
					// 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
					return Kakao.API.request( {
						url : '/v1/api/story/post/link',
						data : {
						link_info : res,
							content:"우리 아기 첫 기부 증서\r\n\r\nhttp://www.babience-giveandtake.com"
						}
					});
				}).then(function(res) {
					return Kakao.API.request( {
						url : '/v1/api/story/mystory',
						data : { id : res.id }
					});
				}).then(function(res) {
					$.ajax({
						type   : "POST",
						async  : false,
						url    : "../main_exec.php",
						data:{
							"exec" : "insert_share_info",
							"media" : "baby_ks"
						}
					});
					alert("카카오스토리에 공유 되었습니다.");
				}, function (err) {
					alert(JSON.stringify(err));
				});

			},
			fail: function(err) {
				alert(JSON.stringify(err))
			},
		});

	}
}

function copy_url(ss_url)
{
	//window.clipboardData.setData('text',"11<?=$_SESSION['ss_url']?>");
    //alert("클립보드에 복사되었습니다.");
	//var text = $("#serial_number").val();
	var text = ss_url;
	if(window.clipboardData){
		// IE처리
		// 클립보드에 문자열 복사
		window.clipboardData.setData('text', text);
		alert("클립보드에 복사되었습니다.");
	} else {
		// 비IE 처리    
		window.prompt ("선물번호를 복사해주세요!", text);  
	}
}

function more_show()
{
	$(".view_info").css("display","block");
}
</script>