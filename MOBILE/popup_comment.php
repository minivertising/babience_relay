<?
	include_once   "./header.php";

	$idx	= $_REQUEST['num'];
	$today_week	= $_gl['today_week'];

	$query 	= "SELECT * FROM ".$_gl['blogger_info_table']." WHERE idx='".$idx."'";
	$result 	= mysqli_query($my_db, $query);
	$b_data	= mysqli_fetch_array($result);
?>
<div class="popup_wrap">
  <input type="hidden" name="blogger_idx" id="blogger_idx" value="<?=$b_data['blogger_idx']?>">
  <div class="p_mid p_position input big">
    <div class="block_close clearfix">
      <a href="popup_posting.php?num=<?=$b_data['blogger_idx']?>" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_input_comment.png" /></div>
        <div class="block_input_bg">
          <div class="block_input comment clearfix">
            <div class="label"><img src="images/popup/label_nick.png" /></div>
            <div class="input_txt name"><input type="text" name="mb_nickname" id="mb_nickname"></div>
          </div>
          <div class="block_input comment clearfix">
            <div class="label"><img src="images/popup/label_comment.png" /></div>
            <div class="input_txt name"><textarea name="mb_comment" id="mb_comment"></textarea></div>
          </div>
          <div class="block_input comment clearfix">
            <div class="label"></div>
            <div class="input_txt"><img src="images/popup/txt_input_comment.png" /></div>
          </div>
        </div>    
        <div class="block_btn">
          <a href="#" onclick="input_comment();" class="common_3"><img src="images/popup/btn_input_comment.png" /></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">

function input_comment()
{
	var mb_nickname	= $("#mb_nickname").val();
	var mb_comment	= $("#mb_comment").val();
	var blogger_idx		= $("#blogger_idx").val();
	if (mb_nickname== "")
	{
		alert('닉네임을 입력해 주세요.');

		$("#mb_nickname").focus();
		return false;
	}

	if (mb_comment == "")
	{
		alert('응원 댓글을 입력해 주세요.');

		$("#mb_comment").focus();
		return false;
	}

	$.ajax({
		type:"POST",
		data:{
			"exec"				: "insert_comment",
			"mb_nickname"	: mb_nickname,
			"mb_comment"		: mb_comment,
			"blogger_idx"		: blogger_idx
		},
		url: "../main_exec.php",
		success: function(response){
			if (response == "Y")
			{
				location.href = "popup_posting.php?num=" + blogger_idx + "";
			}else{
				alert("접속자가 많아 지연되고 있습니다. 다시 시도해 주세요.");
			}
		}
	});
}


</script>