<?
	//include_once   "./header.php";
	include_once "../config.php";

	$serial	= $_REQUEST['serial'];
	$long_url		= "http://www.babience-giveandtake.com/MOBILE/certificate.php?serial=".$serial."";
	$query	= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_serialnumber='".$serial."'";
	$result 	= mysqli_query($my_db, $query);
	$member_info	= mysqli_fetch_array($result);

	//print_r($member_info);
	echo phpinfo();
?>
<!doctype html>
<html>
  <head>
    <title>belif bomb</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta property="og:title" content="Babience Relay">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.babience-giveandtake.com/?media=fb" />
    <meta property="og:image" content="<?=$member_info['mb_image']?>" />
    <meta property="og:description" content="베비언스 릴레이 이벤트.">

    <link rel="shortcut icon" type="image/x-icon" href="./images/icon/favicon.ico" />
    <title>Babience</title>
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
    <style>
	html,body { height: 100%; margin: 0; padding: 0;}
    </style>

  </head>

  <body>
    <div>
	  <img src="<?=$member_info['mb_image']?>">
	</div>
	<div>
	  <a href="#" onclick="sns_share('fb');">페이스북</a>
	  <a href="#" onclick="sns_share('ks');">카스</a>
	  <a href="#" onclick="sns_share('kt');">카톡</a>
	  <a href="#" onclick="sns_share('tw');">트위터</a>
	</div>
	<div>
	  <a href="#">선물번호 확인하기</a>
	</div>
  </body>
</html>
<script type="text/javascript">
Kakao.init('b9c52d3d573fd09cbe25e306fafc5df6');

function sns_share(media)
{
	if (media == "fb")
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
	}else if (media == "kt"){
		// 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
		Kakao.Link.createTalkLinkButton({
		  container: '#kakao-link-btn',
		  label: "VDL MEETS KAKAO FRIENDS!\r\nVDL FRIENDS KIT를 받아라!\r\n\r\n친구에게 메시지를 보내고 5천원 할인 쿠폰과 VDL FRIENDS KIT을 받으세요! 참여만 해도 5천원 할인 쿠폰을 드려요",
		  image: {
			src: "<?=$member_info['mb_image']?>",
			width: '1200',
			height: '630'
		  },
		  webButton: {
			text: 'VDL 써머 컬렉션',
			url: '<?=$long_url	?>' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
	}else if (media == "tw"){
		var newWindow = window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent("VDL MEETS KAKAO FRIENDS! 친구에게 메시지를 보내고 컬렉션 제품이 담긴 VDL FRIENDS KIT를 받으세요! 참여만 해도 5천원 할인 쿠폰을 드려요.") + '&url='+ encodeURIComponent('http://bit.ly/1EiTYuF'),'sharer','toolbar=0,status=0,width=600,height=325');
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
						url : '<?=$long_url	?>'
					}
				}).then(function(res) {
					// 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
					return Kakao.API.request( {
						url : '/v1/api/story/post/link',
						data : {
						link_info : res,
							content:"VDL MEETS KAKAO FRIENDS! 친구에게 메시지를 보내고 컬렉션 제품이 담긴 VDL FRIENDS KIT를 받으세요! 참여만 해도 5천원 할인 쿠폰을 드려요."
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
							"media" : "story"
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

</script>