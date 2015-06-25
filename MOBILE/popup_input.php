<?
	include_once   "./header.php";

	$num		= $_REQUEST['num'];
?>
<div class="popup_wrap">
  <input type="hidden" name="blogger_num" id="blogger_num" value="<?=$num?>">
  <div class="p_mid p_position big input">
    <div class="block_close clearfix">
      <a href="index.php" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_input.png" /></div>
        <div class="block_input_bg">
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_name.png" /></div>
            <div class="input_txt name"><input type="text" name="mb_name" id="mb_name"></div>
          </div>
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_phone.png" /></div>
            <div class="input_txt">
              <div class="inner_phone clearfix">
                <div class="in_phone"><input type="text" name="mb_phone1" id="mb_phone1"></div>
                <div class="in_dash">-</div>
                <div class="in_phone"><input type="text" name="mb_phone2" id="mb_phone2"></div>
                <div class="in_dash">-</div>
                <div class="in_phone"><input type="text" name="mb_phone3" id="mb_phone3"></div>
              </div>
            </div>
          </div>
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_name_baby.png" /></div>
            <div class="input_txt name"><input type="text" name="mb_baby_name" id="mb_baby_name"></div>
          </div>
          <div class="block_input clearfix">
            <div class="label"></div>
            <div class="input_txt"><img src="images/popup/txt_input_notice.png" /></div>
          </div>
        </div>    
        <div class="block_ckeck">
          <div class="inner_check all clearfix">
            <div class="in_check"><input type="checkbox" name="all_agree" id="all_agree" class="all_chk_cl"></div>
            <div class="label_check">전체약관에 동의합니다.</div>
          </div>
          <div class="bar"></div>
          <div class="inner_check clearfix">
            <div class="in_check"><input type="checkbox" name="use_agree" id="use_agree"></div>
            <div class="label_check">개인정보 활용 약관에 동의합니다.</div>
            <div class="btn_check"><a href="#pop_use_agree" class="popup-with-zoom-anim">약관 확인</a></div>
          </div>
          <div class="inner_check clearfix">
            <div class="in_check"><input type="checkbox" name="privacy_agree" id="privacy_agree"></div>
            <div class="label_check">개인정보 취급 위탁 약관에 동의합니다.</div>
            <div class="btn_check"><a href="#pop_privacy_agree" class="popup-with-zoom-anim">약관 확인</a></div>
          </div>
          <div class="inner_check clearfix">
            <div class="in_check"><input type="checkbox" name="adver_agree" id="adver_agree"></div>
            <div class="label_check">광고성 정보 전송 동의 약관에 동의합니다.</div>
            <div class="btn_check"><a href="#pop_adver_agree" class="popup-with-zoom-anim">약관 확인</a></div>
          </div>
        </div>
        <div class="block_btn">
          <a href="#" onclick="m_input_info();" class="common_3"><img src="images/popup/btn_input_ok.png" /></a>
        </div>
      </div><!--inner-->
    </div>
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
	$('.block_ckeck input').on('ifChecked ifUnchecked', function(event){
		//alert(this.id);
	}).iCheck({
		checkboxClass: 'icheckbox_flat-red',
		radioClass: 'iradio_square-red',
		increaseArea: '0%'
	});

	$('.all_chk_cl').on('ifChecked', function(event){
		$('.block_ckeck input').iCheck('check');
	});

});

function m_input_info()
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
					popup_desc("pop_already", 0);
				}else{
					var giftArr	= response.split("||");
					location.href = "popup_gift.php?gift=" + giftArr[0] + "&serial=" + giftArr[1];
				}
			}
		});
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
			},
			close: function() {
			}
		}
	}, 0);
}

</script>