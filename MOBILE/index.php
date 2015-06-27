<?
	include_once   "./header.php";

	$comment_info = select_comment();
	
	$query 		= "SELECT * FROM ".$_gl['member_info_table']."";
	$member_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));

	$query 		= "SELECT * FROM ".$_gl['blogger_info_table']." WHERE week_num=1";
	$result 	= mysqli_query($my_db, $query);
	
	$i = 1;
	while ($b_data = mysqli_fetch_array($result))
	{
		$b_info[$i]['idx']					= $b_data['idx'];
		$b_info[$i]['b_idx']				= $b_data['blogger_idx'];
		$b_info[$i]['b_name']			= $b_data['blogger_name'];
		$b_info[$i]['b_photo']			= $b_data['blogger_photo'];
		$b_info[$i]['b_sstory']			= $b_data['blogger_short_story'];
		$b_info[$i]['b_story']			= $b_data['blogger_story'];
		$b_info[$i]['b_recommend']	= $b_data['recommend_cnt'];

		$d_info[$i]['idx']					= $b_data['idx'];
		$d_info[$i]['b_idx']				= $b_data['blogger_idx'];
		$d_info[$i]['b_name']			= $b_data['blogger_name'];
		$d_info[$i]['b_photo']			= $b_data['blogger_photo'];
		$d_info[$i]['b_sstory']			= $b_data['blogger_short_story'];
		$d_info[$i]['b_story']			= $b_data['blogger_story'];
		$d_info[$i]['b_recommend']	= $b_data['recommend_cnt'];
		$i++;
	}
	shuffle($b_info);


?>
<body>
    <div id="mobile_menu" class="mobile_menu">
      <ul>
        <li><a href="#"><img src="images/btn_story.png"  alt=""/></a></li>
        <li><a href="#"><img src="images/btn_give.png"  alt=""/></a></li>
        <li><a href="#"><img src="images/btn_suu.png"  alt=""/></a></li>
        <li><a href="#"><img src="images/btn_view_gift.png"  alt=""/></a></li>
      </ul>
      <div class="btn_sns">
        <div class="inner_sns clearfix">
          <a href="javascript:m_sns_share('kakao');" id="kakao-link-btn"><img src="images/btn_kt.jpg"  alt=""/></a>
          <a href="#" onclick="m_sns_share('story');"><img src="images/btn_ks.jpg"  alt=""/></a>
          <a href="#" onclick="m_sns_share('facebook');"><img src="images/btn_fb.jpg"  alt=""/></a>
          <a href="#" onclick="m_sns_share('twitter');"><img src="images/btn_tw.jpg"  alt=""/></a>
        </div>
      </div>
    </div>
    
    
<div class="wrap_page">
  <div class="navi">
    <div class="left"><a href="http://www.babience.co.kr/m/index.jsp"><img src="images/logo.png" width="95" alt=""/></a></div>
    <div class="right"><a href="#" onclick="show_menu()"><img src="images/btn_navi.png" width="40" alt=""/></a></div>
  </div>
  </div>

<div class="sec_top">
  <a href="#" onclick="move_area('gift')">선물보기</a>
  <div class="cnt_man" id="total_cnt">
<?
	$query 		= "SELECT * FROM ".$_gl['member_info_table']."";
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

?>
  </div>
  <div class="bg">
    <img src="images/img_top.jpg" alt=""/>
  </div>
</div>

<div class="sec_list">
  <div class="title"><img src="images/title_bloger.jpg" alt=""/></div>
  <div class="wrap_list clearfix">
    <div class="one_list">
      <div class="img"><a href="#" onclick="go_detail('<?=$b_info[0]['b_idx']?>');"><img src="images/bloger_img_1.jpg" alt=""/></a></div>
      <div class="btn"><a href="#" onclick="go_recom('<?=$b_info[0]['idx']?>','main');"><img src="images/btn_suggest.jpg" alt=""/></a></div>
      <div class="cnt"><?=number_format($b_info[0]['b_recommend'])?>명의 맘<img src="images/icon_h.jpg" width="13" alt=""/></div>
    </div>
    <div class="one_list">
      <div class="img"><a href="#" onclick="go_detail('<?=$b_info[1]['b_idx']?>');"><img src="images/bloger_img_2.jpg" alt=""/></a></div>
      <div class="btn"><a href="#" onclick="go_recom('<?=$b_info[1]['idx']?>','main');"><img src="images/btn_suggest.jpg" alt=""/></a></div>
      <div class="cnt"><?=number_format($b_info[1]['b_recommend'])?>명의 맘<img src="images/icon_h.jpg" width="13" alt=""/></div>
    </div>
    <div class="one_list">
      <div class="img"><a href="#" onclick="go_detail('<?=$b_info[2]['b_idx']?>');"><img src="images/bloger_img_3.jpg" alt=""/></a></div>
      <div class="btn"><a href="#" onclick="go_recom('<?=$b_info[2]['idx']?>','main');"><img src="images/btn_suggest.jpg" alt=""/></a></div>
      <div class="cnt"><?=number_format($b_info[2]['b_recommend'])?>명의 맘<img src="images/icon_h.jpg" width="13" alt=""/></div>
    </div>
    <div class="one_list">
      <div class="img"><a href="#" onclick="go_detail('<?=$b_info[3]['b_idx']?>');"><img src="images/bloger_img_4.jpg" alt=""/></a></div>
      <div class="btn"><a href="#" onclick="go_recom('<?=$b_info[3]['idx']?>','main');"><img src="images/btn_suggest.jpg" alt=""/></a></div>
      <div class="cnt"><?=number_format($b_info[3]['b_recommend'])?>명의 맘<img src="images/icon_h.jpg" width="13" alt=""/></div>
    </div>
    <div class="one_list">
      <div class="img"><a href="#" onclick="go_detail('<?=$b_info[4]['b_idx']?>');"><img src="images/bloger_img_5.jpg" alt=""/></a></div>
      <div class="btn"><a href="#" onclick="go_recom('<?=$b_info[4]['idx']?>','main');"><img src="images/btn_suggest.jpg" alt=""/></a></div>
      <div class="cnt"><?=number_format($b_info[4]['b_recommend'])?>명의 맘<img src="images/icon_h.jpg" width="13" alt=""/></div>
    </div>
    <div class="one_list">
      <div class="img"><a href="#" onclick="go_detail('<?=$b_info[5]['b_idx']?>');"><img src="images/bloger_img_6.jpg" alt=""/></a></div>
      <div class="btn"><a href="#" onclick="go_recom('<?=$b_info[5]['idx']?>','main');"><img src="images/btn_suggest.jpg" alt=""/></a></div>
      <div class="cnt"><?=number_format($b_info[5]['b_recommend'])?>명의 맘<img src="images/icon_h.jpg" width="13" alt=""/></div>
    </div>
  </div>
</div>
<?
	$give_query 		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_s_url<>''";
	$give_cnt 	= mysqli_num_rows(mysqli_query($my_db, $give_query));
	$per_cnt	= $give_cnt / 10000;
	$per_bottle	= ($per_cnt * 60) + 40;
?>

<div class="sec_give">
  <div class="title">
    <div class="cnt"><?=number_format($give_cnt)?>개</div>
    <div class="cnt_man">
<?
	$len_give_cnt		= strlen($give_cnt);
	$innerHTML2 = "";
	for ($j=0; $j<$len_give_cnt; $j++){
		if ($len_give_cnt > 3 && $j==1)
			$innerHTML2	.= "<img src='images/num/num_dash.png' class='dash' alt=''/>";

		$innerHTML2 .= "<img src='images/num/num_".substr($give_cnt,$j,1).".png' alt=''/>";
	}
	$innerHTML2 .= "<img src='images/num/label_num.png' alt=''/>";
	echo $innerHTML2;
?>
    </div>
    <div class="bg"><img src="images/title_give.jpg" alt=""/></div>
  </div>

  <div class="img_give_graphic">
    <div class="runner"><img src="images/runner.png" alt=""/></div>
    <div class="percent"><?=round($per_cnt,2)?>%</div>
    <div class="bar">
      <div class="inner">
        <div class="ps" id="mommy_gage"></div>
      </div>
    </div>
    <div class="tong"><img src="images/bg_give_tong.png" alt=""/></div>
    <div class="mull"><img src="images/tong_mull.png" alt=""/></div>
    <div class="bg"><img src="images/tong_mull_bg.jpg" alt=""/></div>
  </div>
</div>  

<div class="sec_howto">
  <a href="popup_gift_check.php">당첨 선물 보기</a>
  <div class="bg"><img src="images/img_howto.jpg" alt=""/></div>
</div>     

<div class="sec_gift">
  <div class="img_gift">
    <img src="images/img_gift.jpg" alt=""/>
  </div>
</div>     

<div class="sec_movie">
  <div class="title">
    <img src="images/title_movie.jpg" alt=""/>
  </div>
  <div class="movie">
  <iframe allowfullscreen="1" src="<?=$_gl['youtube_url']?>" frameborder="0" id="ytplayer" class="ytplayer"></iframe>
  </div>
</div>   

<div class="sec_app">
  <a href="http://www.babience.com/m/url/mobile.jsp" target="_blank">앱다운로드</a>
  <div class="bg"><img src="images/img_app.jpg" alt=""/></div>
</div>

<div class="sec_footer">
  <img src="images/img_footer.jpg" alt=""/>
</div>
<div class="mask"></div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	Kakao.init('b9c52d3d573fd09cbe25e306fafc5df6');
	var width = $(window).width() - 6;
	var youtube_height = (width / 16) * 9;
	$("#ytplayer").width(width);
	$("#ytplayer").height(youtube_height);
	setInterval("m_auto_count()",1000);

	var width = $(".block_movie").width();
	var youtube_height = (width / 16) * 9;
	$(".block_movie").height(youtube_height);

	$(".block_movie").height()
	// 팝업 jQuery 스타일
	$('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: 'hidden',
		closeBtnInside: true,
		//preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in',
		showCloseBtn : false,
		closeOnBgClick: true,
		callbacks: {
			open: function() {
			},
			close: function() {
			}
		}
	});

	$('#mommy_gage').css('width','<?=$per_cnt?>%');
	$('.mull').css('bottom','<?=$per_bottle?>%');

});

function move_area(area)
{
	if (area == "story")
	{
		$( 'html, body' ).animate({ scrollTop: $(".wrap_sec_top").height() - 102},500);
	}else if (area == "give"){
		$( 'html, body' ).animate({ scrollTop: $(".wrap_sec_top").height() + $(".wrap_sec_list").height() - 102},500);
	}else if (area == "message"){
		$( 'html, body' ).animate({ scrollTop: $(".wrap_sec_top").height() + $(".wrap_sec_list").height() + $(".wrap_sec_give").height() + $(".wrap_sec_howto").height() + $(".wrap_sec_gift").height() - 102},500);
	}else if (area == "gift"){
		$( 'html, body' ).animate({ scrollTop: $(".sec_top").height() + $(".sec_list").height() + $(".sec_give").height() + $(".sec_howto").height()},500);
	}
}

function go_recom(num, detail)
{
	if (confirm('추천하시겠어요?'))
	{
		if (detail == "main")
		{
			location.href = "./popup_input.php?num=" + num;
		}else{
		}
	}
}

function m_auto_count()
{
	$.ajax({
		type:"POST",
		data:{
			"exec"					: "m_total_member"
		},
		url: "../main_exec.php",
		success: function(response){
			$("#total_cnt").html(response);
		}
	});
}

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

</script>