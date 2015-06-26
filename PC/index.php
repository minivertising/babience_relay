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
<div class="sec_navi">
  <div class="navi">
    <div class="left"><a href="http://www.babience.co.kr/index.jsp" target="_blank"><img src="images/logo.png" alt=""/></a></div>
    <div class="right">
      <a href="#" onclick="move_area('story');"><img src="images/gnb_story.png" alt=""/></a>
      <a href="#" onclick="move_area('give');"><img src="images/gnb_give.png" alt=""/></a>
      <a href="#" onclick="move_area('message');"><img src="images/gnb_su.png" alt=""/></a>
      <a href="#" onclick="move_area('gift');"><img src="images/gnb_gift.png" alt=""/></a>
    </div>
  </div>
</div>

<div class="sec_right_navi">
  <div>
    <a href="#" onclick="sns_share('fb');"><img src="images/btn_sns_fb.png" alt=""/></a>
  </div>
  <div>
    <a href="#" onclick="sns_share('ks');"><img src="images/btn_sns_ks.png" alt=""/></a>
  </div>
  <div>
    <a href="#" onclick="sns_share('tw');"><img src="images/btn_sns_tw.png" alt=""/></a>
  </div>
  <div id="move_top">
    <a href="#"><img src="images/btn_top.png" alt=""/></a>
  </div>
</div>

<div class="wrap_sec_top"> 
  <div class="sec_top">
    <div class="block_title">
      <div class="block_p_num">
<?
	$query 		= "SELECT * FROM ".$_gl['member_info_table']."";
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
?>
      </div>
      <div class="btn_gift">
        <a href="#" onclick="move_area('gift')"><img src="images/btn_gift.png" alt=""/></a>
      </div>
    </div> 
  </div>
</div>

<div class="wrap_sec_list">
  <div class="sec_list">
    <div class="title">
      <img src="images/title_bloger.png" alt=""/>
    </div>
    <div class="inner clearfix">
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[0]['b_idx']?>');return false;"><img src="images/img_bloger_1.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[0]['idx']?>','main');return false;">1234명</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[1]['b_idx']?>');return false;"><img src="images/img_bloger_2.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[1]['idx']?>','main');return false;">1234명</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[2]['b_idx']?>');return false;"><img src="images/img_bloger_3.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[2]['idx']?>','main');return false;">1234명</a></div>
      </div>
    </div>
    <div class="inner clearfix">
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[3]['b_idx']?>');return false;"><img src="images/img_bloger_4.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[3]['idx']?>','main');return false;">1234명</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[4]['b_idx']?>');return false;"><img src="images/img_bloger_5.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[4]['idx']?>','main');return false;">1234명</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[5]['b_idx']?>');return false;"><img src="images/img_bloger_6.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[5]['idx']?>','main');return false;">1234명</a></div>
      </div>
    </div>
  </div>
</div>

<div class="wrap_sec_give">
  <div class="sec_give">
    <div class="cnt">2,345개</div>
    <div class="cnt_man">
      <img src="images/num2/num_6.png" alt=""/>
      <img src="images/num2/num_7.png" alt=""/>
      <img src="images/num2/num_dash.png" alt=""/>
      <img src="images/num2/num_8.png" alt=""/>
      <img src="images/num2/num_9.png" alt=""/>
      <img src="images/num2/num_0.png" alt=""/>
      <img src="images/num2/label_num.png" alt=""/>
    </div>
    <div class="runner"><img src="images/runner.png" alt=""/></div>
    <div class="bg_gage">
      <img src="images/bg_gage.png" alt=""/>
    </div>
    <div class="gage_bar">
      <div class="inner">
        <div class="bars"></div>
      </div>
    </div>

    <div class="img_give_graphic">
      <div class="bg"></div>
      <div class="mull"><img src="images/mull.png" alt=""/></div>
    </div>
  </div> 
</div>

<div class="wrap_sec_howto">    
  <div class="sec_howto">
    <img src="images/img_howto.jpg" alt="" usemap="#Map"/>
    <map name="Map">
      <area shape="rect" coords="698,406,866,468" href="#" onclick="move_area('gift')" style="outline:none;">
    </map>
  </div>    
</div><!--end:wrap_sec_howto--> 

<div class="wrap_sec_gift">    
  <div class="sec_gift">
    <div class="img_gift">
      <img src="images/img_gift.jpg" alt=""/>
    </div>
  </div>   
</div><!--end:wrap_sec_list-->  

<div class="wrap_sec_movie">    
  <div class="sec_movie">
    <div class="title"><img src="images/title_movie.png" alt=""/></div>
    <div class="block_movie">
      <iframe allowfullscreen="1" src="<?=$_gl['youtube_url']?>" frameborder="0" id="ytplayer" class="ytplayer" style="width:100%;height:100%;"></iframe>
    </div>
  </div>   
</div>    

<div class="wrap_sec_app">   
  <div class="sec_app">
    <img src="images/img_app.png" alt=""/>
  </div>  
</div>   

<div class="sec_footer">
  <img src="images/footer.png" alt=""/>
</div>
<?
	if ($IE7 == "N")
	{
		include_once   "./popup_div.php";
	}else{
		include_once   "./popup_div_ie7.php";
	}
?>
<div class="mask"></div>
</body>
</html>
<script type="text/javascript">
var chk_ins = 0;
$(document).ready(function() {
	setInterval("auto_count()",1000);

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

	// 체크박스 스타일 설정
	$('.zoom-anim-dialog input').on('ifChecked ifUnchecked', function(event){
		//alert(this.id);
	}).iCheck({
		checkboxClass: 'icheckbox_flat-red',
		radioClass: 'iradio_square-red',
		increaseArea: '0%'
	});

	$('.all_chk_cl').on('ifChecked', function(event){
		$('.zoom-anim-dialog input').iCheck('check');
	});

	$(".mask").click(function(){
		$(".mask").fadeOut(300);
		$(".popup_wrap").fadeOut(300);
	});

	$( '#move_top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 800 );
			return false;
	} );

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
		$( 'html, body' ).animate({ scrollTop: $(".wrap_sec_top").height() + $(".wrap_sec_list").height() + $(".wrap_sec_give").height() + $(".wrap_sec_howto").height() - 102},500);
	}
}

</script>