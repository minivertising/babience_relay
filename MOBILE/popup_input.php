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
                <div class="in_phone">
                  <select name="mb_phone1" id="mb_phone1">
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="016">016</option>
                    <option value="017">017</option>
                    <option value="018">018</option>
                    <option value="019">019</option>
                  </select>
                </div>
                <div class="in_phone"><input type="tel" id="mb_phone2" name="mb_phone2" onkeyup="only_num(this);chk_len(this.value)"></div>
                <div class="in_phone"><input type="tel" id="mb_phone3" name="mb_phone3" onkeyup="only_num(this);chk_len2(this.value)"></div>
              </div>
            </div>
          </div>
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_name_baby.png" /></div>
            <div class="input_txt name"><input type="text" name="mb_baby_name" id="mb_baby_name"></div>
          </div>
          <div class="block_input clearfix">
            <div class="input_txt notice"><img src="images/popup/txt_input_notice.png" /></div>
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
	Kakao.init('b9c52d3d573fd09cbe25e306fafc5df6');
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
				}else if (response == "E"){
					popup_desc("pop_end", 0);
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

function chk_len(val)
{
	if (val.length == 4)
	{
		$("#mb_phone3").focus();
	}
}

function chk_len2(val)
{
	if (val.length == 4)
	{
		$("#mb_phone3").blur();
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

function m_sns_share(media)
{
	if (media == "fb")
	{
		var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.babience-giveandtake.com/?media=facebook'),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"media" : media
			}
		});
	}else if (media == "kt"){
		// 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
		Kakao.Link.createTalkLinkButton({
		  container: '#kakao-link-btn',
		  label: "[기부 앤 테이크 릴레이] 우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!",
		  image: {
			src: 'http://www.babience-giveandtake.com/MOBILE/images/img_sns_share_kt.jpg',
			width: '1200',
			height: '630'
		  },
		  webButton: {
			text: '베비언스',
			url: 'http://www.babience-giveandtake.com/?media=kt' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
		  }
		});
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"media" : media
			}
		});
	}else if (media == "tw"){
		var newWindow = window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent("[베비언스] 우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!") + '&url='+ encodeURIComponent('http://bit.ly/1LIDUII'),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"media" : media
			}
		});
	}else{
		// 로그인 창을 띄웁니다.
		Kakao.Auth.login({
			success: function() {

				// 로그인 성공시, API를 호출합니다.
				Kakao.API.request( {
					url : '/v1/api/story/linkinfo',
					data : {
						url : 'http://www.babience-giveandtake.com/?media=ks'
					}
				}).then(function(res) {
					// 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
					return Kakao.API.request( {
						url : '/v1/api/story/post/link',
						data : {
						link_info : res,
							content:"[베비언스]\r\n우리 아기 이름으로 첫 기부도 하고, 매일매일 100% 당첨 선물도 테이크하세요!"
						}
					});
				}).then(function(res) {
					return Kakao.API.request( {
						url : '/v1/api/story/mystory',
						data : { id : res.id }
					});
				}).then(function(res) {
					$.ajax({
						type   : "POST",
						async  : false,
						url    : "../main_exec.php",
						data:{
							"exec" : "insert_share_info",
							"media" : "story"
						}
					});
					alert("카카오스토리에 공유 되었습니다.");
				}, function (err) {
					alert(JSON.stringify(err));
				});

			},
			fail: function(err) {
				alert(JSON.stringify(err))
			},
		});
	}

}

</script>