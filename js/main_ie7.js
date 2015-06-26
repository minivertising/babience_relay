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
var timerId = 0;
function auto_comment(num)
{
	$.ajax({
		type:"POST",
		data:{
			"exec"		: "view_comment",
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
	$("#cn_"+rolling_num).fadeOut("fast",function(){
		if (rolling_num == cnt)
		{
			rolling_num	= 0;
		}
		rolling_num = rolling_num + 1;
		$("#cn_"+rolling_num).fadeIn("fast");
		$("#ct_"+rolling_num).fadeIn("fast");
	});
}

function go_recom(num, detail)
{
	if (confirm('추천하시겠어요?'))
	{
		if (detail == "main")
		{
			//popup_desc('pop_event_input', num);
			open_pop('pop_event_input','');
		}else{
			//$.magnificPopup.close();
			//setTimeout("popup_desc('pop_event_input', "+num+");",500);
			if (num == 1)
				open_pop('pop_event_input','pop_detail_view1')
			else if (num == 2)
				open_pop('pop_event_input','pop_detail_view2')
			else if (num == 3)
				open_pop('pop_event_input','pop_detail_view3')
			else if (num == 4)
				open_pop('pop_event_input','pop_detail_view4')
			else if (num == 5)
				open_pop('pop_event_input','pop_detail_view5')
			else if (num == 6)
				open_pop('pop_event_input','pop_detail_view6')
		}
	}
}

function go_detail(num)
{
	if (num == 1){
		open_pop('pop_detail_view1',0);
		auto_comment('1');
	}else if (num == 2){
		open_pop('pop_detail_view2',0);
		auto_comment('2');
	}else if (num == 3){
		open_pop('pop_detail_view3',0);
		auto_comment('3');
	}else if (num == 4){
		open_pop('pop_detail_view4',0);
		auto_comment('4');
	}else if (num == 5){
		open_pop('pop_detail_view5',0);
		auto_comment('5');
	}else if (num == 6){
		open_pop('pop_detail_view6',0);
		auto_comment('6');
	}
}

function go_gift()
{
	open_pop('pop_search_gift','');
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
				}else if (param == "pop_detail_view1"){
					auto_comment('1');
				}else if (param == "pop_detail_view2"){
					auto_comment('2');
				}else if (param == "pop_detail_view3"){
					auto_comment('3');
				}else if (param == "pop_detail_view4"){
					auto_comment('4');
				}else if (param == "pop_detail_view5"){
					auto_comment('5');
				}else if (param == "pop_detail_view6"){
					auto_comment('6');
				}
			},
			close: function() {
				chk_ins = 0;
				if (param == "pop_detail_view1"){
					$("#comment_view").html("");
					clearInterval(timerId);
					rolling_num = 1;
				}else if (param == "pop_detail_view2"){
					$("#comment_view").html("");
					clearInterval(timerId);
				}else if (param == "pop_detail_view3"){
					$("#comment_view").html("");
					clearInterval(timerId);
				}else if (param == "pop_detail_view4"){
					$("#comment_view").html("");
					clearInterval(timerId);
				}else if (param == "pop_detail_view5"){
					$("#comment_view").html("");
					clearInterval(timerId);
				}else if (param == "pop_detail_view6"){
					$("#comment_view").html("");
					clearInterval(timerId);
				}
				//chk_ins2 = 0;
				//$("#mb_receive").val("");
				//$("#mb_send").val("");
				//$("#mb_message").val("");
				$("#mb_baby_name").val("");
				$("#mb_name").val("");
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
			chk_ins = 0;
			return false;
		}

		if ($('#privacy_agree').is(":checked") == false)
		{
			alert("개인정보 취급 위탁 동의를 안 하셨습니다");
			chk_ins = 0;
			return false;
		}

		if ($('#adver_agree').is(":checked") == false)
		{
			alert("광고 동의 약관에 동의를 안 하셨습니다");
			chk_ins = 0;
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
					open_pop('pop_dupli_div','pop_event_input');
				}else if (response == "E"){
					//open_pop('pop_dupli_div','pop_event_input');
					alert("오늘 참여 횟수 다 썼다!");
				}else{
					open_pop('pop_thanks_div','pop_event_input');
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
			$(".no_gift").hide();
			$(".yes_gift").show();

			$(".block_gift_num").html(response);
		}
	});
}

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
			alert(response);
			if (response == "Y")
			{
				if (blogger_idx == 1)
				{
					open_pop('pop_detail_view1','pop_comment_input1');
				}else if (blogger_idx == 2){
					open_pop('pop_detail_view2','pop_comment_input2');
				}else if (blogger_idx == 3){
					open_pop('pop_detail_view3','pop_comment_input3');
				}else if (blogger_idx == 4){
					open_pop('pop_detail_view4','pop_comment_input4');
				}else if (blogger_idx == 5){
					open_pop('pop_detail_view5','pop_comment_input5');
				}else if (blogger_idx == 6){
					open_pop('pop_detail_view6','pop_comment_input6');
				}
			}else{
				alert("접속자가 많아 지연되고 있습니다. 다시 시도해 주세요.");
			}
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
		alert("클립보드에 복사되었습니다.");
	} else {
		// 비IE 처리    
		window.prompt ("Ctrl+C를 눌러 나의 선물번호를 복사해주세요!", text);  
	}
}

function open_pop(param, param2)
{
	$(".mask").width($(window).width());
	$(".mask").height($(window).height());

	$(".mask").show();

	if (param2 != "")
		$("#" + param2).hide();
	
	$("#" + param).show();
}

function close_pop(param)
{
	$("#" + param).hide();
	$(".mask").hide();
}

