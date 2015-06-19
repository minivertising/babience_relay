<?
	include_once   "./header.php";

	$random = PHPRandom::getHexString("10");
	print_r($random);


?>
  <div id="total_num">
  </div>
  <div id="blogger_area">
<?
	$query 		= "SELECT * FROM ".$_gl['blogger_info_table']."";
	$result 	= mysqli_query($my_db, $query);
	
	$i = 0;
	while ($b_data = mysqli_fetch_array($result))
	{
		$b_info[$i]['b_name']	= $b_data['blogger_name'];
		$b_info[$i]['b_photo']	= $b_data['blogger_photo'];
		$b_info[$i]['b_sstory']	= $b_data['blogger_short_story'];
		$b_info[$i]['b_story']	= $b_data['blogger_story'];
		$b_info[$i]['b_recommend']	= $b_data['recommend_cnt'];
		$i++;
	}
	shuffle($b_info);
?>
    <div>
<?=$b_info[0]['b_name']?>
    </div>
  </div>
  </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	setInterval("auto_count()",1000)
});

function auto_count()
{
	$.ajax({
		type:"POST",
		data:{
			"exec"					: "total_member"
		},
		url: "../main_exec.php",
		success: function(response){
			$("#total_num").html(response);
		}
	});
}
</script>