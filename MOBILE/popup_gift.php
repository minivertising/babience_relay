<?
	include_once   "./header.php";

	$gift		= $_REQUEST['gift'];
	$serial	= $_REQUEST['serial'];
?>
<!--경품노출-->
<div class="popup_wrap">
  <div class="p_mid p_position big">
    <div class="block_close clearfix">
      <a href="index.php" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_gift.png" /></div>
        <div class="img_gift">
          <div class="img">
<?
	if ($gift == "CASH")
	{
?>
            <img src="images/popup/gift_coupon.png" />
<?
	}else if ($gift == "WATER"){
?>
            <img src="images/popup/gift_water.png" />
<?
	}else if ($gift == "WASH"){
?>
            <img src="images/popup/gift_wash.png" />
<?
	}else if ($gift == "CAMERA"){
?>
            <img src="images/popup/gift_camera.png" />
<?
	}else if ($gift == "HOTEL"){
?>
            <img src="images/popup/gift_hotel.png" />
<?
	}else if ($gift == "WG"){
?>
            <img src="images/popup/gift_wg.png" />
<?
	}else if ($gift == "MILK"){
?>
            <img src="images/popup/gift_milk.png" />
<?
	}
?>
          </div>
          <div class="gift_num clearfix">
            <div class="label"><img src="images/popup/label_gift_num.png" alt=""/></div>
            <div class="num" name="serial_number" id="serial_number"><?=$serial?></div>
            <!-- <div class="btn"><a href="#" onclick="copy_url('<?=$serial?>');"><img src="images/popup/btn_copy.png" alt=""/></a></div> -->
          </div>
        </div>
        <div class="txt_notice">
          <a href="http://www.babience.com/m/event/150701/event.jsp" target="_blank"><img src="images/popup/btn_home.png" /></a>
        </div>
        <div class="txt_notice">
          <img src="images/popup/txt_give.png" />
        </div>
        <div class="block_btn_sns clearfix">
          <div class="txt"><img src="images/popup/txt_sns.png" /></div>
          <div class="btn">
            <a href="#" onclick="m_sns_share('kt');return false;" id="kakao-link-btn"><img src="images/popup/btn_share_kt.png" /></a>
            <a href="#" onclick="m_sns_share('ks');return false;"><img src="images/popup/btn_share_ks.png" /></a>
            <a href="#" onclick="m_sns_share('fb');return false;"><img src="images/popup/btn_share_fb.png" /></a>
            <a href="#" onclick="m_sns_share('tw');return false;"><img src="images/popup/btn_share_tw.png" /></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--END : 경품노출-->    
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	Kakao.init('b9c52d3d573fd09cbe25e306fafc5df6');
	//$("#kakao-link-btn").click();
});


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
	} else {
		// 비IE 처리    
		window.prompt ("Ctrl+C를 눌러 나의 선물번호를 복사해주세요!", text);  
	}
}

function m_sns_share(media)
{
	if (media == "fb")
	{
		var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.babience-giveandtake.com/?media=facebook'),'sharer','toolbar=0,status=0,width=600,height=325');
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
		  label: "[기부 앤 테이크 릴레이] 우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!",
		  image: {
			src: 'http://www.babience-giveandtake.com/MOBILE/images/img_sns_share_kt.jpg',
			width: '1200',
			height: '630'
		  },
		  webButton: {
			text: '베비언스',
			url: 'http://www.babience-giveandtake.com/?media=kt' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
		var newWindow = window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent("[베비언스] 우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!") + '&url='+ encodeURIComponent('http://bit.ly/1LIDUII'),'sharer','toolbar=0,status=0,width=600,height=325');
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
						url : 'http://www.babience-giveandtake.com/?media=ks'
					}
				}).then(function(res) {
					// 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
					return Kakao.API.request( {
						url : '/v1/api/story/post/link',
						data : {
						link_info : res,
							content:"[베비언스]\r\n우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!"
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