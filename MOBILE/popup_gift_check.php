<?
	include_once   "./header.php";
?>
<!--선물번호체크-->
<div class="popup_wrap">
  <div class="p_mid p_position big">
    <div class="block_close clearfix">
      <a href="index.php" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content block_gift_num">
      <div class="inner">
        <div class="title"><img src="images/popup/title_gift.png" /></div>
        <div class="block_input_bg">
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_gift_name.jpg" /></div>
            <div class="input_txt name"><input type="text" name="s_name" id="s_name"></div>
          </div>
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_gift_phone.jpg" /></div>
            <div class="input_txt">
              <div class="inner_phone clearfix">
                <div class="in_phone">
                  <select name="s_phone1" id="s_phone1" style="background:#FFFFFF">
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="016">016</option>
                    <option value="017">017</option>
                    <option value="018">018</option>
                    <option value="019">019</option>
                  </select>
                </div>
                <div class="in_phone"><input type="tel" name="s_phone2" id="s_phone2"></div>
                <div class="in_phone"><input type="tel" name="s_phone3" id="s_phone3"></div>
                <div class="btn"><a href="#" onclick="search_gift();"><img src="images/popup/btn_check_gift_ok.png" /></a></div>
              </div>
            </div>
          </div>
        </div> 
        <div class="sec_gift_list">
          <div class="list_block">
            <div class="list_one label clearfix">
              <div class="gift_name">선물</div>
              <div class="gift_num">선물 번호</div>
            </div>
          </div> 
        </div>  
        <div class="sec_lms_gift_btn">
          <a href="http://www.babience.co.kr/m/index.jsp" target="_blank"><img src="images/gift_btn.jpg" /></a>
        </div>                    
      </div><!--inner-->
    </div>
  </div>
</div>
<!--END : 경품노출-->    
</body>
</html>
<script type="text/javascript">
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
			"exec"				: "m_search_info",
			"s_name"				: s_name,
			"s_phone"			: s_phone
		},
		url: "../main_exec.php",
		success: function(response){
			//$(".no_gift").hide();
			//$(".yes_gift").show();

			$(".list_block").html(response);
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
		window.prompt ("선물번호를 복사해주세요!", text);  
	}
}

function more_info()
{
	$(".list_one").css("display","block");
	$(".btn_more").css("display","none");
}
</script>