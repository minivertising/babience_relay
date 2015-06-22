<?
	include_once   "./header.php";

$gift	= BR_winner_draw();
print_r($gift);

$query 	= "INSERT INTO ".$_gl['member_info_table']."(mb_ipaddr, mb_name, mb_phone, baby_name, mb_regdate, mb_gubun, mb_media, mb_serialnumber,mb_winner) values('".$_SERVER['REMOTE_ADDR']."','test','test','test','".date("Y-m-d H:i:s")."','PC','test','test','".$gift."')";
$result 	= mysqli_query($my_db, $query);

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
	$query 		= "SELECT * FROM ".$_gl['blogger_info_table']."";
	$result 	= mysqli_query($my_db, $query);
	
	$i = 0;
	while ($b_data = mysqli_fetch_array($result))
	{
		$b_info[$i]['idx']					= $b_data['idx'];
		$b_info[$i]['b_name']			= $b_data['blogger_name'];
		$b_info[$i]['b_photo']			= $b_data['blogger_photo'];
		$b_info[$i]['b_sstory']			= $b_data['blogger_short_story'];
		$b_info[$i]['b_story']			= $b_data['blogger_story'];
		$b_info[$i]['b_recommend']	= $b_data['recommend_cnt'];
		$i++;
	}
	shuffle($b_info);
?>
    <div>
<?=$b_info[0]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[0]['idx']?>');">추천하기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[1]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[1]['idx']?>');">추천하기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[2]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[2]['idx']?>');">추천하기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[3]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[3]['idx']?>');">추천하기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[4]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[4]['idx']?>');">추천하기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[5]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[5]['idx']?>');">추천하기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
  </div>
<?
	include_once   "./popup_div.php";
?>
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

function go_recom(num)
{
	if (confirm('추천하시겠어요?'))
	{
		popup_desc('pop_event_input', num);
	}
}

function popup_desc(param, num)
{
	$.magnificPopup.open({
		items: {
			src: '#' + param+ ''
		},
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
				$("#blogger_num").val(num);
			},
			close: function() {
				chk_ins = 0;
				//chk_ins2 = 0;
				//$("#mb_receive").val("");
				//$("#mb_send").val("");
				//$("#mb_message").val("");
			}
		}
	}, 0);
}

function input_info()
{
	if (chk_ins == 0)
	{
		chk_ins = 1;
		var mb_name			= $("#mb_name").val();
		var mb_phone1			= $("#mb_phone1").val();
		var mb_phone2			= $("#mb_phone2").val();
		var mb_phone3			= $("#mb_phone3").val();
		var mb_baby_name	= $("#mb_baby_name").val();
		var blogger_num		= $("#blogger_num").val();
		var mb_phone			= mb_phone1 + "-" + mb_phone2 + "-" + mb_phone3;

		if (mb_name == "")
		{

			alert('이름을 입력해 주세요.');

			$("#mb_name").focus();
			chk_ins = 0;
			return false;
		}

		if (mb_phone2 == "")
		{

			alert('전화번호를 입력해 주세요.');

			$("#mb_phone2").focus();
			chk_ins = 0;
			return false;
		}

		if (mb_phone3 == "")
		{

			alert('전화번호를 입력해 주세요.');

			$("#mb_phone3").focus();
			chk_ins = 0;
			return false;
		}

		if (mb_baby_name == "")
		{

			alert('아기 이름을 입력해주세요.');

			$("#mb_baby_name").focus();
			chk_ins = 0;
			return false;
		}

		if ($('#use_agree').is(":checked") == false)
		{
			alert("개인정보 활용 동의를 안 하셨습니다");
			return false;
		}

		if ($('#privacy_agree').is(":checked") == false)
		{
			alert("개인정보 취급 위탁 동의를 안 하셨습니다");
			return false;
		}

		if ($('#adver_agree').is(":checked") == false)
		{
			alert("광고 동의 약관에 동의를 안 하셨습니다");
			return false;
		}

		$.ajax({
			type:"POST",
			data:{
				"exec"					: "insert_info",
				"mb_name"			: mb_name,
				"mb_phone"			: mb_phone,
				"mb_baby_name"	: mb_baby_name,
				"blogger_num"		: blogger_num
			},
			url: "../main_exec.php",
			success: function(response){
				if (response == "Y")
				{
					popup_desc("pop_thanks_div", 0);
				}else{
					alert("사용자가 많아 접속이 지연되고 있습니다. 다시 추천해 주세요.");
				}
			}
		});
	}

}
</script>