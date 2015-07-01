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
<?
	if ($IE7 == "N")
	{
?>
      <a href="#" onclick="go_gift();return false;"><img src="images/gnb_gift.png" alt=""/></a>
<?
	}else{
?>
      <a href="#" onclick="go_gift();"><img src="images/gnb_gift.png" alt=""/></a>
<?
	}
?>
    </div>
  </div>
</div>

<div class="sec_right_navi">
  <div>
    <a href="#" onclick="sns_share('fb');"><img src="images/btn_sns_fb.png" alt=""/></a>
  </div>
  <div>
<?
	if ($IE7 == "N")
	{
?>
    <a href="#" onclick="sns_share('ks');"><img src="images/btn_sns_ks.png" alt=""/></a>
<?
	}else{
?>
    <a href="#" onclick="alert('해당 브라우저 버전에서는 지원하지 않는 기능입니다.');"><img src="images/btn_sns_ks.png" alt=""/></a>
<?
	}
?>
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
      <div class="block_p_num" style="width:943px;left:0px;">
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
<?
	if ($IE7 == "N")
	{
?>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[0]['b_idx']?>');return false;" style="outline:none;"><img src="images/img_bloger_<?=$b_info[0]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[0]['idx']?>','main');return false;" style="outline:none;"><?=$b_info[0]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[1]['b_idx']?>');return false;" style="outline:none;"><img src="images/img_bloger_<?=$b_info[1]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[1]['idx']?>','main');return false;" style="outline:none;"><?=$b_info[1]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[2]['b_idx']?>');return false;" style="outline:none;"><img src="images/img_bloger_<?=$b_info[2]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[2]['idx']?>','main');return false;" style="outline:none;"><?=$b_info[2]['b_recommend']?>명의 맘</a></div>
      </div>
    </div>
    <div class="inner clearfix">
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[3]['b_idx']?>');return false;" style="outline:none;"><img src="images/img_bloger_<?=$b_info[3]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[3]['idx']?>','main');return false;" style="outline:none;"><?=$b_info[3]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[4]['b_idx']?>');return false;" style="outline:none;"><img src="images/img_bloger_<?=$b_info[4]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[4]['idx']?>','main');return false;" style="outline:none;"><?=$b_info[4]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[5]['b_idx']?>');return false;" style="outline:none;"><img src="images/img_bloger_<?=$b_info[5]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[5]['idx']?>','main');return false;" style="outline:none;"><?=$b_info[5]['b_recommend']?>명의 맘</a></div>
      </div>
<?
	}else{
?>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[0]['b_idx']?>');" style="outline:none;"><img src="images/img_bloger_<?=$b_info[0]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[0]['idx']?>','main');" style="outline:none;"><?=$b_info[0]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[1]['b_idx']?>');" style="outline:none;"><img src="images/img_bloger_<?=$b_info[1]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[1]['idx']?>','main');" style="outline:none;"><?=$b_info[1]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[2]['b_idx']?>');" style="outline:none;"><img src="images/img_bloger_<?=$b_info[2]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[2]['idx']?>','main');" style="outline:none;"><?=$b_info[2]['b_recommend']?>명의 맘</a></div>
      </div>
    </div>
    <div class="inner clearfix">
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[3]['b_idx']?>');" style="outline:none;"><img src="images/img_bloger_<?=$b_info[3]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[3]['idx']?>','main');return false;" style="outline:none;"><?=$b_info[3]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[4]['b_idx']?>');" style="outline:none;"><img src="images/img_bloger_<?=$b_info[4]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[4]['idx']?>','main');" style="outline:none;"><?=$b_info[4]['b_recommend']?>명의 맘</a></div>
      </div>
      <div class="one_list">
        <div class="img_bloger"><a href="#" onclick="go_detail('<?=$b_info[5]['b_idx']?>');" style="outline:none;"><img src="images/img_bloger_<?=$b_info[5]['b_idx']?>.png" alt=""/></a></div>
        <div class="btn_suggest"><a href="#" onclick="go_recom('<?=$b_info[5]['idx']?>','main');" style="outline:none;"><?=$b_info[5]['b_recommend']?>명의 맘</a></div>
      </div>
<?
	}
?>
    </div>
  </div>
</div>
<?
	$per_cnt	= $total_cnt / 10000;
	$per_bottle	= (($total_cnt / 100) * 6) + 80;
?>
<div class="wrap_sec_give">
  <div class="sec_give">
    <div class="cnt" id="give_view_num1"><?=number_format($total_cnt);?>개</div>
    <div class="cnt_man" id="give_view_num2">
<?
	$len_give_cnt		= strlen($total_cnt);
	$innerHTML2 = "";
	for ($j=0; $j<$len_give_cnt; $j++){
		if ($len_give_cnt > 3 && $j==1)
			$innerHTML2	.= "<img src='images/num2/num_dash.png' alt=''/>";

		$innerHTML2 .= "<img src='images/num2/num_".substr($total_cnt,$j,1).".png' alt=''/>";
	}
	$innerHTML2 .= "<img src='images/num2/label_num.png' alt=''/>";
	echo $innerHTML2;
?>
      <!-- <img src="images/num2/num_6.png" alt=""/>
      <img src="images/num2/num_7.png" alt=""/>
      <img src="images/num2/num_dash.png" alt=""/>
      <img src="images/num2/num_8.png" alt=""/>
      <img src="images/num2/num_9.png" alt=""/>
      <img src="images/num2/num_0.png" alt=""/>
      <img src="images/num2/label_num.png" alt=""/> -->
    </div>
    <div class="runner"><img src="images/runner.png" alt=""/></div>
    <div class="bg_gage">
      <img src="images/bg_gage.png" alt=""/>
    </div>
    <div class="gage_bar">
      <div class="inner">
        <div class="bars" id="mommy_gage"></div>
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
<?
	if ($IE8 == "Y")
	{
?>
      <area shape="rect" coords="698,406,866,468" href="#" onclick="go_gift();" style="outline:none;">
<?
	}else{
?>
      <area shape="rect" coords="698,406,866,468" href="#" onclick="go_gift();return false;" style="outline:none;">
<?
	}
?>
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
<?
	if ($IE7 == "N")
	{
?>
<script type="text/javascript">
var chk_ins = 0;
$(document).ready(function() {
	Kakao.init('b9c52d3d573fd09cbe25e306fafc5df6');
	setInterval("auto_count()",1000);
	setInterval("auto_give_count()",1000);
	setInterval("auto_give_count2()",1000);

	var width = $(".block_movie").width();
	var youtube_height = (width / 16) * 9;
	$(".block_movie").height(youtube_height);

	$(".block_movie").height();
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
				$("#mb_name").val("");
				$("#mb_baby_name").val("");
				$("#mb_phone1").val("010");
				$("#mb_phone2").val("");
				$("#mb_phone3").val("");
				$("#s_name").val("");
				$("#s_phone1").val("010");
				$("#s_phone2").val("");
				$("#s_phone3").val("");
				$("#mb_comment").val("");
				$("#mb_nickname").val("");
				$('input').iCheck('uncheck');
				$(".block_gift_num").html("");
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
	$('#mommy_gage').css('width','<?=$per_cnt*100?>%');
	$('.runner').css('left','<?=$per_cnt*1000?>px');
	$('.mull').css('bottom','<?=$per_bottle?>px');

});

</script>
<?
	}else{
?>
<script type="text/javascript">
var chk_ins = 0;
$(document).ready(function() {
	setInterval("auto_count()",1000);

	var width = $(".block_movie").width();
	var youtube_height = (width / 16) * 9;
	$(".block_movie").height(youtube_height);

	$(".block_movie").height();
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
				$("#mb_name").val("");
				$("#mb_baby_name").val("");
				$("#mb_phone1").val("010");
				$("#mb_phone2").val("");
				$("#mb_phone3").val("");
				$("#s_name").val("");
				$("#s_phone1").val("010");
				$("#s_phone2").val("");
				$("#s_phone3").val("");
				$("#mb_comment").val("");
				$("#mb_nickname").val("");
				$('input').iCheck('uncheck');
				$(".block_gift_num").html("");
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
	$('#mommy_gage').css('width','<?=$per_cnt?>%');
	$('.mull').css('bottom','<?=$per_bottle?>px');

});

</script>
<?
	}
?>
<script type="text/javascript">
// quick menu
var quickTop;
$(window).scroll(function() {
	quickTop = ($(window).height()-$('.sec_right_navi').height()) /2;
	$('.sec_right_navi').stop().animate({top:$(window).scrollTop()+quickTop},400,'easeOutExpo');
	
	if ($(window).scrollTop() < 1640)
	{
		$("#summer_header_menu").attr('src','images/btn_menu_summer.png')
		$("#kit_header_menu").attr('src','images/btn_menu_kit_off.png')
	}else{
		$("#summer_header_menu").attr('src','images/btn_menu_summer_off.png')
		$("#kit_header_menu").attr('src','images/btn_menu_kit.png')
	}
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

function only_num(obj)
{
	var inText = obj.value;
	var outText = "";
	var flag = true;
	var ret;
	for(var i = 0; i < inText.length; i++)
	{
		ret = inText.charCodeAt(i);
		if((ret < 48) || (ret > 57))
		{
			flag = false;
		}
		else
		{
			outText += inText.charAt(i);
		}
	}
 
	if(flag == false)
	{
		alert("전화번호는 숫자입력만 가능합니다.");
		obj.value = outText;
		obj.focus();
		return false;
	} 
	return true;
}

</script>