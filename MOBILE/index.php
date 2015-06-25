<?
	include_once   "./header.php";
	
	$comment_info = select_comment();

	$query 		= "SELECT * FROM ".$_gl['member_info_table']."";
	$member_cnt 	= mysqli_num_rows(mysqli_query($my_db, $query));

	echo $member_cnt;

?>
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
	include_once   "./popup_div.php";
?>
  </body>
</html>
<script type="text/javascript">
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

</script>