<?
	include_once   "./header.php";

	$b_idx	= $_REQUEST['num'];
	$today_week	= $_gl['today_week'];

	$query 	= "SELECT * FROM ".$_gl['blogger_info_table']." WHERE week_num='".$today_week."' AND blogger_idx='".$b_idx."'";
	$result 	= mysqli_query($my_db, $query);
	$b_data	= mysqli_fetch_array($result);

	$comment_info = select_comment();
?>
<div class="popup_wrap">
  <div class="p_mid p_position big">
    <div class="block_close clearfix">
      <a href="index.php" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content posting">
      <div class="inner">
        <div class="bloger_title">
<?
	if ($b_idx == "1")
	{
?>
          <a href="#" target="_blank"><img src="images/popup/bloger_name_1.png" width="109" /></a>
<?
	}else if ($b_idx == "2"){
?>
          <a href="#" target="_blank"><img src="images/popup/bloger_name_2.png" width="170"/></a>
<?
	}else if ($b_idx == "3"){
?>
          <a href="#" target="_blank"><img src="images/popup/bloger_name_3.png" width="155"/></a>
<?
	}else if ($b_idx == "4"){
?>
          <a href="#" target="_blank"><img src="images/popup/bloger_name_4.png" width="160"/></a>
<?
	}else if ($b_idx == "5"){
?>
          <a href="#" target="_blank"><img src="images/popup/bloger_name_5.png" width="110"/></a>
<?
	}else if ($b_idx == "6"){
?>
          <a href="#" target="_blank"><img src="images/popup/bloger_name_6.png" width="125"/></a>
<?
	}
?>

          <img src="images/popup/txt_update.png" width="111" />
        </div>
        <div class="tab_menu clearfix">
          <a href="#"><img src="images/popup/btn_posting_tab_1_on.png" width="70" /></a>
          <a href="#" onclick="alert('곧 오픈됩니다!');return false;"><img src="images/popup/btn_posting_tab_2_off.png" width="70" /></a>
          <a href="#" onclick="alert('곧 오픈됩니다!');return false;"><img src="images/popup/btn_posting_tab_3_off.png" width="70" /></a>
          <a href="#" onclick="alert('곧 오픈됩니다!');return false;"><img src="images/popup/btn_posting_tab_4_off.png" width="70" /></a>
        </div>
        <div class="content_posting">
          <a href="#" target="#"><img src="images/popup/posting_1.png" /></a>
        </div>
        <div class="txt_notice">
          <img src="images/popup/txt_bloger_notice.png" />
        </div>
        <div class="block_suggest">
          <a href="popup_input.php?num=<?=$b_data['idx']?>"><?=number_format($b_data['recommend_cnt'])?>명의 맘</a>
        </div>
        <div class="sec_comment">
          <div class="label">
            <img src="images/popup/label_comment_live.png" width="100" />
            <a href="popup_comment.php?num=<?=$b_data['idx']?>"><img src="images/popup/btn_comment_live.png" width="80" /></a>
          </div>
          <div class="comment clearfix" id="comment_view">
            <div class="id">양방구방*</div>
            <div class="dash">|</div>
            <div class="txt">라디오 속 노래까지! 당신이 찾는 모든 음악 다음뮤직에서</div>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	auto_comment('<?=$b_idx?>');
});

var timerId = 0;
function auto_comment(num)
{
	$.ajax({
		type:"POST",
		data:{
			"exec"		: "m_view_comment",
			"num"		: num
		},
		url: "../main_exec.php",
		success: function(response){
			var comment_txt	= response.split("||");
			$("#comment_view").html(comment_txt[0]);
			timerId = setInterval("comment_rolling("+comment_txt[1]+","+num+")",1500);
		}
	});

}
var rolling_num		= 1;
function comment_rolling(cnt, num)
{
	//alert(cnt);
	$("#ct_"+rolling_num).fadeOut("fast");
	$("#da_"+rolling_num).fadeOut("fast");
	$("#cn_"+rolling_num).fadeOut("fast",function(){
		if (rolling_num == cnt)
		{
			rolling_num	= 0;
		}
		rolling_num = rolling_num + 1;
		$("#cn_"+rolling_num).fadeIn("fast");
		$("#ct_"+rolling_num).fadeIn("fast");
		$("#da_"+rolling_num).fadeIn("fast");
	});
}

</script>