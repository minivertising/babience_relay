<?
	include_once   "./header.php";

	if (!$_SESSION['ss_media'])
	{
		$media	= $_REQUEST['media'];

		$_SESSION['ss_media'] = $media;
		VM_InsertTrackingInfo($media, $gubun);
	}

?>
<style>
.s1 {
    width: 100%;
    height: ;
}      
.s2 {
    width: 80%;
    margin-top:7%;
}      
</style>
<div class="pop_icon">
	<div class="inner">
    	<div class="close"><a href="#" onclick="$('.pop_icon').hide();return false;"><img src="images/btn_close_pop.png" width="23" alt=""/></a></div>
        <div class="img"><a href="http://www.vdlxkakao.com/?media=vdl_metal" target="_blank"><img src="images/btn_go_kakao.png" width="110" alt=""/></a></div>
    </div>
</div>
<div class="menu clearfix">
  <a href="index.php" class="logo"><img src="images/logo.png" width="80" alt=""/></a>
  <a href="#" class="menu_ham"  onclick="show_menu()"><img src="images/menu_ham.png" width="27" alt=""/></a>
</div>
<div id="mobile_menu" class="mobile_menu">
  <ul>
    <li><a href="#" onclick="screen_move('mv')"><img src="images/btn_gnb_mv.png"  alt=""/></a></li>
    <li><a href="#" onclick="screen_move('life')"><img src="images/btn_gnb_mina.png"  alt=""/></a></li>
    <li><a href="#" onclick="screen_move('event')"><img src="images/btn_gnb_event.png"  alt=""/></a></li>
    <li><a href="#" onclick="screen_move('metal')"><img src="images/btn_gnb_pro.png"  alt=""/></a></li>
    <li><a href="http://www.vdlcosmetics.com/m/index.jsp" target="_blank"><img src="images/btn_home.jpg"  alt=""/></a></li>
    <li><a href="http://www.vdlxkakao.com/?media=vdl_metal" target="_blank"><img src="images/btn_kakao.png"  alt=""/></a></li>
  </ul>
  <div class="btn_sns">
    <div class="inner_sns clearfix">
      <a href="#" onclick="sns_share('twitter');"><img src="images/btn_tw.jpg"  alt=""/></a>
      <a href="#" onclick="sns_share('facebook');"><img src="images/btn_fb.jpg"  alt=""/></a>
      <a href="#" onclick="sns_share('kakao');" id="kakao-link-btn"><img src="images/btn_kt.jpg"  alt=""/></a>
      <a href="#" onclick="sns_share('story');"><img src="images/btn_ks.jpg"  alt=""/></a>
    </div>
  </div>
</div>
<div class="block_top">
  <div class="top_btn">
  	<a href="#" onclick="screen_move('event')"><img src="images/popup/btn_top_event.png" alt=""/></a>
    <a href="popup_movie.php"><img src="images/popup/btn_top_movie.png" alt=""/></a>
  </div>
  <div class="bg_top"><img src="images/img_top.jpg" alt=""/></div>
</div>

<div class="block_mina">
  <div class="txt_roll">
    <div class="inner_roll clearfix">
      <div class="arrow_left"><a href="#" class="swiper-slide-prev"><img src="images/btn_arrow_left.png" alt=""/></a></div>
      <div class="txt">
	    <div class="swiper-container s1">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#"><img src="images/txt_mina_say_1.png" alt=""/></a></div>
            <div class="swiper-slide"><a href="#"><img src="images/txt_mina_say_2.png" alt=""/></a></div>
            <div class="swiper-slide"><a href="#"><img src="images/txt_mina_say_3.png" alt=""/></a></div>
          </div>
        </div>
      </div>
      <div class="arrow_right"><a href="#" class="swiper-slide-next"><img src="images/btn_arrow_right.png" alt=""/></a></div>
    </div>
  </div>
  <div class="bg_mina"><img src="images/bg_mina.jpg" alt=""/></div>
</div>

<div class="block_event">
  <div class="btn_play"><a href="popup_viral.php"><img src="images/btn_play.png" alt=""/></a></div>
  <div class="btn_event"><a href="popup_event1.php"><img src="images/btn_event_go.png" alt=""/></a></div>
  <div class="bg_event"><img src="images/bg_event.jpg" alt=""/></div>
</div>

<div class="block_pro">
  <div class="txt_roll">
    <div class="inner_roll clearfix">
      <div class="arrow_left"><a href="#" onclick="prev_slide();return false;"><img src="images/btn_arrow_left.png" alt=""/></a></div>
      <div class="txt test111"  id="slide_txt_1"><a href="#"><img src="images/txt_pro_1.png" alt=""/></a></div>
      <div class="txt test111" id="slide_txt_2" style="display:none;"><a href="#"><img src="images/txt_pro_2.png" alt=""/></a></div>
      <div class="txt test111" id="slide_txt_3" style="display:none;"><a href="#"><img src="images/txt_pro_3.png" alt=""/></a></div>
	    <!-- <div class="swiper-container s2">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#"><img src="images/txt_pro_1.png" alt=""/></a></div>
            <div class="swiper-slide"><a href="#"><img src="images/txt_pro_2.png" alt=""/></a></div>
            <div class="swiper-slide"><a href="#"><img src="images/txt_pro_3.png" alt=""/></a></div>
          </div>
        </div>
      </div> -->
      <div class="arrow_right"><a href="#" onclick="next_slide();return false;"><img src="images/btn_arrow_right.png" alt=""/></a></div>
    </div>
  </div>
  <div class="btn_buy"><a href="http://www.vdlcosmetics.com/m/product/detail.jsp?pid=KR38001091" target="_blank"><img src="images/btn_buy.png" alt=""/></a></div>
  <div class="bg_pro"><img src="images/bg_pro.jpg" alt=""/></div>
</div>
<div class="mask"></div>
</body>
</html>
<script type="text/javascript">
Kakao.init('050c56bc8b9f3d019a9daa270fc255b9');
var txt_num = 0;
function prev_slide()
{
	if (txt_num == 0)
	{
		$("#slide_txt_1").fadeOut("fast", function(){
			$("#slide_txt_3").fadeIn("fast", function(){
				txt_num = 2;
			});
		});
	}else if (txt_num == 1){
		$("#slide_txt_2").fadeOut("fast", function(){
			$("#slide_txt_1").fadeIn("fast", function(){
				txt_num = 0;
			});
		});
	}else{
		$("#slide_txt_3").fadeOut("fast", function(){
			$("#slide_txt_2").fadeIn("fast", function(){
				txt_num = 1;
			});
		});
	}

}

function next_slide()
{
	if (txt_num == 0)
	{
		$("#slide_txt_1").fadeOut("fast", function(){
			$("#slide_txt_2").fadeIn("fast", function(){
				txt_num = 1;
			});
		});
	}else if (txt_num == 1){
		$("#slide_txt_2").fadeOut("fast", function(){
			$("#slide_txt_3").fadeIn("fast", function(){
				txt_num = 2;
			});
		});
	}else{
		$("#slide_txt_3").fadeOut("fast", function(){
			$("#slide_txt_1").fadeIn("fast", function(){
				txt_num = 0;
			});
		});
	}
}

$(document).ready(function() {
	var mySwiper = new Swiper ('.s1', {
	// Optional parameters
		direction: 'horizontal',
		loop: true,
		prevButton : '.swiper-slide-prev',
		nextButton : '.swiper-slide-next'
	});
	var mySwiper2 = new Swiper ('.s2', {
	// Optional parameters
		direction: 'horizontal',
		loop: true,
		prevButton : '.swiper-slide-prev',
		nextButton : '.swiper-slide-next'
	});
/*
mySwiper2.on('oInit', function () {
    alert('1111');
});
*/
$(".mask").click(function(){
		$('#mobile_menu').animate({right:-200},300,'linear',function(){
			$("#mobile_menu").hide();
			$(".mask").fadeOut(300);
			$(window).off(".disableScroll");
		});
	});

	$(".test111").bind('touchstart', function(e) {
		if (txt_num == 0)
		{
			$("#slide_txt_1").fadeOut("fast", function(){
				$("#slide_txt_3").fadeIn("fast", function(){
					txt_num = 2;
				});
			});
		}else if (txt_num == 1){
			$("#slide_txt_2").fadeOut("fast", function(){
				$("#slide_txt_1").fadeIn("fast", function(){
					txt_num = 0;
				});
			});
		}else{
			$("#slide_txt_3").fadeOut("fast", function(){
				$("#slide_txt_2").fadeIn("fast", function(){
					txt_num = 1;
				});
			});
		}
	});
});

function show_menu()
{
	if ($("#mobile_menu").css("display") == "block")
	{
		$('#mobile_menu').animate({right:-200},300,'linear',function(){
			$("#mobile_menu").hide();
			$(".mask").fadeOut(300);
			$(window).off(".disableScroll");
		});
	}else{
		$(".mask").width($(window).width());
		$(".mask").height($(window).height());
		$(".mask").fadeTo(1000, 0.6);

		$('#mobile_menu').css('right','-200px');
		// 이동위치값 지정
		var position = 0;
		$('#mobile_menu').show().animate({right:position},300,'linear');

		$(window).on("mousewheel.disableScroll DOMMouseScroll.disableScroll touchmove.disableScroll", function(e) {
			e.preventDefault();
			return;
		});
	}
}

function screen_move(param)
{
	if (param == "mv")
	{
		$('#mobile_menu').animate({right:-200},300,'linear',function(){
			$("#mobile_menu").hide();
			$(".mask").fadeOut(100);
			$( 'html, body' ).animate({ scrollTop: 0},500);
			$(window).off(".disableScroll");
		});
	}else if (param == "life"){
		$('#mobile_menu').animate({right:-200},300,'linear',function(){
			$("#mobile_menu").hide();
			$(".mask").fadeOut(100);
			$( 'html, body' ).animate({ scrollTop: $(".block_top").height()},500);
			$(window).off(".disableScroll");
		});
	}else if (param == "event"){
		$('#mobile_menu').animate({right:-200},300,'linear',function(){
			$("#mobile_menu").hide();
			$(".mask").fadeOut(100);
			$( 'html, body' ).animate({ scrollTop: $(".block_top").height() + $(".block_mina").height()},500);
			$(window).off(".disableScroll");
		});
	}else{
		$('#mobile_menu').animate({right:-200},300,'linear',function(){
			$("#mobile_menu").hide();
			$(".mask").fadeOut(100);
			$( 'html, body' ).animate({ scrollTop: $(".block_top").height() + $(".block_mina").height() + $(".block_event").height()},500);
			$(window).off(".disableScroll");
		});
	}
}

function sns_share(media)
{
	if (media == "facebook")
	{
		var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.vdl-metalcushion.com/?media=fbshare'),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"media" : media
			}
		});
	}else if (media == "twitter"){
		var newWindow = window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent("VDL MEETS SHIN MINA 신민아 셀피의 비밀을 말하다. 신민아 셀피의 비밀 힌트 영상을 보고 퀴즈를 맞춰주세요! 맞추신 분에게는 VDL 뷰티 메탈쿠션 파운데이션과 LG전자 G4를 선물로 드려요!") + '&url='+ encodeURIComponent('http://www.vdl-metalcushion.com/?media=twshare'),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"media" : media
			}
		});
	}else if (media == "kakao"){
		media	= "ktmovie";

		// 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
		Kakao.Link.createTalkLinkButton({
		  container: '#kakao-link-btn',
		  label: "VDL MEETS SHIN MINA\r\n신민아 셀피의 비밀 힌트 영상을 보고 퀴즈를 맞춰주세요! 맞추신 분에게는 VDL 뷰티 메탈 쿠션 파운데이션과 LG전자 G4를 선물로 드려요!",
		  image: {
			src: 'http://www.vdl-metalcushion.com/MOBILE/images/img_sns_share_new_kt.jpg',

			width: '1200',
			height: '630'
		  },
		  webButton: {
			text: 'VDL MEETS SHIN MINA',
			url: 'http://www.vdl-metalcushion.com/?media=kakao' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
						url : 'http://www.vdl-metalcushion.com/?media=ksshare'
					}
				}).then(function(res) {
					// 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
					return Kakao.API.request( {
						url : '/v1/api/story/post/link',
						data : {
						link_info : res,
							content:"VDL MEETS SHIN MINA\r\n신민아 셀피의 비밀 힌트 영상을 보고 퀴즈를 맞춰주세요! 맞추신 분에게는 VDL 뷰티 메탈 쿠션 파운데이션과 LG전자 G4를 선물로 드려요!"
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
