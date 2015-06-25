<?
	include_once   "./header.php";
	
	$comment_info = select_comment();
	print_r($comment_info);

?>
  <div id="total_num">
<?
	$query 		= "SELECT * FROM ".$_gl['member_info_table']."";
	$member_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));

	echo $member_cnt;

?>
  </div>
  <div id="blogger_area">
<?
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
    <div>
<?=$b_info[0]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[0]['idx']?>','main');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[0]['b_idx']?>');">상세보기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[1]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[1]['idx']?>','main');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[1]['b_idx']?>');">상세보기</a>
      함께하는 <?=$b_info[1]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[2]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[2]['idx']?>','main');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[2]['b_idx']?>');">상세보기</a>
      함께하는 <?=$b_info[2]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[3]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[3]['idx']?>','main');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[3]['b_idx']?>');">상세보기</a>
      함께하는 <?=$b_info[3]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[4]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[4]['idx']?>','main');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[4]['b_idx']?>');">상세보기</a>
      함께하는 <?=$b_info[4]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[5]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[5]['idx']?>','main');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[5]['b_idx']?>');">상세보기</a>
      함께하는 <?=$b_info[5]['b_recommend']?>의 맘
    </div>
  </div>
  <div>
    <a href="#" onclick="go_gift()">나의 선물함</a>
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

});
</script>