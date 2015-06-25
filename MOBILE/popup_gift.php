<?
	include_once   "./header.php";

	//print_r($_REQUEST);
	$gift		= $_REQUEST['gift'];
	$serial	= $_REQUEST['serial'];
?>
<!--경품노출-->
<div class="popup_wrap">
  <div class="p_mid p_position big">
    <div class="block_close clearfix">
      <a href="index.php" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_gift.png" /></div>
        <div class="img_gift">
          <div class="img">
            <img src="images/popup/gift_coupon.png" />
          </div>
          <div class="gift_num clearfix">
            <div class="label"><img src="images/popup/label_gift_num.png" alt=""/></div>
            <div class="num" name="serial_number" id="serial_number"><?=$serial?></div>
            <div class="btn"><a href="#" onclick="copy_url('<?=$serial?>');"><img src="images/popup/btn_copy.png" alt=""/></a></div>
          </div>
        </div>
        <div class="txt_notice">
          <a href="http://www.babience.co.kr/index.jsp" target="_blank"><img src="images/popup/btn_home.png" /></a>
        </div>
        <div class="txt_notice">
          <img src="images/popup/txt_give.png" />
        </div>
        <div class="block_btn_sns clearfix">
          <div class="txt"><img src="images/popup/txt_sns.png" /></div>
          <div class="btn">
            <a href="#"><img src="images/popup/btn_share_kt.png" /></a>
            <a href="#"><img src="images/popup/btn_share_ks.png" /></a>
            <a href="#"><img src="images/popup/btn_share_fb.png" /></a>
            <a href="#"><img src="images/popup/btn_share_tw.png" /></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--END : 경품노출-->    
</body>
</html>
<script type="text/javascript">
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