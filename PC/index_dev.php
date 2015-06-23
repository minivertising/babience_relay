<?
	include_once   "./header.php";
	
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
	  <a href="#" onclick="go_detail('<?=$b_info[0]['idx']?>');">상세보기</a>
      함께하는 <?=$b_info[0]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[1]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[1]['idx']?>');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[1]['idx']?>');">상세보기</a>
      함께하는 <?=$b_info[1]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[2]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[2]['idx']?>');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[2]['idx']?>');">상세보기</a>
      함께하는 <?=$b_info[2]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[3]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[3]['idx']?>');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[3]['idx']?>');">상세보기</a>
      함께하는 <?=$b_info[3]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[4]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[4]['idx']?>');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[4]['idx']?>');">상세보기</a>
      함께하는 <?=$b_info[4]['b_recommend']?>의 맘
    </div>
    <div>
<?=$b_info[5]['b_name']?>
      <a href="#" onclick="go_recom('<?=$b_info[5]['idx']?>');">추천하기</a>
	  <a href="#" onclick="go_detail('<?=$b_info[5]['idx']?>');">상세보기</a>
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

function go_gift()
{
	popup_desc('pop_search_gift', 0);
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
				if (param == "pop_thanks_div")
				{
					$("#serial_number").html();
				}
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
				if (response == "N")
				{
					alert("사용자가 많아 접속이 지연되고 있습니다. 다시 추천해 주세요.");
				}else if (response == "D"){
					popup_desc("pop_dupli_div", 0);
				}else{
					popup_desc("pop_thanks_div", 0);
					var giftArr	= response.split("||");
					if (giftArr[0] == "CASH")
					{
						$("#prize_txt").attr("src","images/popup/img_gift_coupon.png");
					}
					$("#serial_number").html(giftArr[1]);
				}
			}
		});
	}
}

function search_gift()
{
	var s_name	= $("#s_name").val();
	var s_phone1	= $("#s_phone1").val();
	var s_phone2	= $("#s_phone2").val();
	var s_phone3	= $("#s_phone3").val();
	var s_phone			= s_phone1 + "-" + s_phone2 + "-" + s_phone3;

	if (s_name == "")
	{
		alert('검색하실 이름을 입력해 주세요.');

		$("#s_name").focus();
		return false;
	}

	if (s_phone2 == "")
	{
		alert('검색하실 전화번호를 입력해 주세요.');

		$("#s_phone2").focus();
		return false;
	}

	if (s_phone3 == "")
	{
		alert('검색하실 전화번호를 입력해 주세요.');

		$("#s_phone3").focus();
		return false;
	}

	$.ajax({
		type:"POST",
		data:{
			"exec"				: "search_info",
			"s_name"				: s_name,
			"s_phone"			: s_phone
		},
		url: "../main_exec.php",
		success: function(response){
			alert(response);
			$("#search_result").html(response);
		}
	});

}

function copy_url(ss_url)
{
	//window.clipboardData.setData('text',"11<?=$_SESSION['ss_url']?>");
    //alert("클립보드에 복사되었습니다.");
	//var text = $("#serial_number").val();
	var text = ss_url;
	if(window.clipboardData){
		// IE처리
		// 클립보드에 문자열 복사
		window.clipboardData.setData('text', text);
	} else {
		// 비IE 처리    
		window.prompt ("Ctrl+C를 눌러 나의 선물번호를 복사해주세요!", text);  
	}
}

</script>