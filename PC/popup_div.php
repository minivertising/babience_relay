<!--------------------- 이벤트 개인정보 입력 팝업 --------------------->
<div id="pop_event_input" class="popup_wrap zoom-anim-dialog mfp-hide" style="width:600px;left:50%;margin-left:-300px">
  <input type="hidden" name="blogger_num" id="blogger_num">
  <div class="p_mid_input p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.magnificPopup.close();" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_input.png" />
        </div>
        <div class="block_input">
          <div class="input_one clearfix">
            <div class="label">
            엄마/아빠 이름
            </div>
            <div class="input">
              <input type="text" name="mb_name" id="mb_name">
            </div>
          </div>
          <div class="input_one clearfix">
            <div class="label">
            휴대폰 번호
            </div>
            <div class="input_phone clearfix">
              <div class="phone_ip"><input type="tel" name="mb_phone1" id="mb_phone1"></div>
              <div class="phone_ip"><input type="tel" name="mb_phone2" id="mb_phone2"></div>
              <div class="phone_ip"><input type="tel" name="mb_phone3" id="mb_phone3"></div>
            </div>
          </div>
          <div class="input_one clearfix">
            <div class="label">
            아기 이름
            </div>
            <div class="input">
              <input type="text" name="mb_baby_name" id="mb_baby_name">
            </div>
          </div>
        </div>
        <div class="check_block">
          <div class="check_one clearfix">
            <div class="in_check">
              <input type="checkbox" name="all_agree" id="all_agree" class="all_chk_cl">
            </div>
            <div class="txt_check">
              <img src="images/popup/label_agree_all.png" alt=""/>
            </div>
          </div>  
          <div class="check_one clearfix">
            <div class="in_check">
              <input type="checkbox" name="use_agree" id="use_agree">
            </div>
            <div class="txt_check">
              <img src="images/popup/agree_info.png" alt=""/>
            </div>
            <div class="btn_check">
              <a href="#pop_use_agree" class="popup-with-zoom-anim"><img src="images/popup/btn_agree.png" alt=""/></a>
            </div>
          </div>
          <div class="check_one clearfix">
            <div class="in_check">
              <input type="checkbox" name="privacy_agree" id="privacy_agree">
            </div>
            <div class="txt_check">
              <img src="images/popup/agree_info_agency.png" alt=""/>
            </div>
            <div class="btn_check">
              <a href="#pop_privacy_agree" class="popup-with-zoom-anim"><img src="images/popup/btn_agree.png" alt=""/></a>
            </div>
          </div>
          <div class="check_one clearfix">
            <div class="in_check">
              <input type="checkbox" name="adver_agree" id="adver_agree">
            </div>
            <div class="txt_check">
              <img src="images/popup/agree_info_ad.png" alt=""/>
            </div>
            <div class="btn_check">
              <a href="#pop_adver_agree" class="popup-with-zoom-anim"><img src="images/popup/btn_agree.png" alt=""/></a>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_info();"><img src="images/popup/btn_input_ok.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 이벤트 개인정보 입력 팝업 --------------------->

<!--------------------- 이벤트 참여완료 --------------------->
<div id="pop_thanks_div" class="popup_wrap zoom-anim-dialog mfp-hide" style="width:500px;left:50%;margin-left:-250px">
  <div class="p_mid ending p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.magnificPopup.close();" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_thanks.png" />
        </div>
        <div class="img_gift" id="prize_txt">
          <img src="images/popup/img_gift_coupon.png" id="prize_txt" />
        </div>
        <div class="block_btn_copy clearfix">
          <div class="num" id="serial_number" name="serial_number">alskj1234</div>
          <div class="btn"><a href="#" onclick="copy_url($('#serial_number').text())"><img src="images/popup/btn_copy.png" /></a></div>
        </div>
        <div class="block_btn_home">
          <a href="http://www.babience.co.kr/index.jsp" target="_blank"><img src="images/popup/btn_home.png" /></a>
        </div>
        <div class="btn_sns_block">
          <a href="#"><img src="images/popup/btn_share_fb.png" alt=""/></a>
          <a href="#"><img src="images/popup/btn_share_ks.png" alt=""/></a>
          <a href="#"><img src="images/popup/btn_share_tw.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 이벤트 참여완료 --------------------->

<!--------------------- 이벤트 중복참여 --------------------->
<div id="pop_dupli_div" class="popup_wrap zoom-anim-dialog mfp-hide" style="width:500px;left:50%;margin-left:-250px">
  <div class="p_mid small p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.magnificPopup.close();" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_already.png" />
        </div>
        <div class="block_btn">
          <a href="#" onclick="$.magnificPopup.close();"><img src="images/popup/btn_ok.png" /></a>
        </div>
        <div class="btn_sns_block">
          <a href="#"><img src="images/popup/btn_share_fb.png" alt=""/></a>
          <a href="#"><img src="images/popup/btn_share_ks.png" alt=""/></a>
          <a href="#"><img src="images/popup/btn_share_tw.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 이벤트 중복참여 --------------------->

<!--------------------- 파워블로거 상세보기 팝업 --------------------->
<div id="pop_detail_blogger_div" class="zoom-anim-dialog mfp-hide" style="background:white;width:600px;height:700px;margin-left:-300px;margin-top:-350px;position:absolute;top:50%;left:50%">
<h3>이미 추천한 블로거입니다</h3>
<h3>다른 맘을 추천해 주세요!</h3>
<h4>내일 또 추천하고 선물 받으세요!</h4>
<div>
  <a href="#">페이스북</a>
  <a href="#">카카오스토리</a>
  <a href="#">트위터</a>
</div>
<div>
  <a href="#" onclick="$.magnificPopup.close();">확인</a>
</div>
</div>
<!--------------------- 파워블로거 상세보기 팝업 --------------------->

<!--------------------- 파워블로거 상세보기 팝업 --------------------->
<div id="pop_search_gift" class="zoom-anim-dialog mfp-hide" style="background:white;width:600px;height:700px;margin-left:-300px;margin-top:-350px;position:absolute;top:50%;left:50%">
  <div>
    이름 : <input type="text" name="s_name" id="s_name"><br />
	전화번호 : 
	<select name="s_phone1" id="s_phone1">
	  <option value="010">010</option>
	  <option value="011">011</option>
	  <option value="016">016</option>
	  <option value="017">017</option>
	  <option value="018">018</option>
	  <option value="019">019</option>
	</select> - 
	<input type="text" name="s_phone2" id="s_phone2"> - 
	<input type="text" name="s_phone3" id="s_phone3">
	<a href="#" onclick="search_gift();">확인</a>
  </div>
  <div id="search_result">
  </div>
</div>
<!--------------------- 파워블로거 상세보기 팝업 --------------------->

<!--------------------- 개인정보 동의 약관 팝업 --------------------->
<div id="pop_use_agree" class="popup_wrap zoom-anim-dialog mfp-hide" style="width:400px;left:50%;margin-left:-200px">
  <div class="p_mid_agree p_position">
    <div class="block_close clearfix">
      <a href="#pop_event_input" class="btn_close popup-with-zoom-anim"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <span class="bold">[개인정보 수집 · 이용에 대한 동의]</span> <br><br>
        (주)LG생활건강(이하 "LG생활건강")는 이벤트 진행을 위한 개인정보 
        수집 이용을 위하여 다음과 같이 귀하의 동의를 받고자 합니다.
        LG생활건강은 보다 원활한 서비스 제공을 위하여 고객의 정보를 
        수집하고 있습니다. 고객의 정보는 이벤트 서비스에 참여하기 
        위한 필수정보로서 제공을 원하지 않을 경우 수집하지 않으며, 
        동의 거부 시 이벤트 참여에 제한을 받을 수 있습니다.
        (주)LG생활건강은 본 이벤트를 위하여 다음과 같이 고객님의 
        개인정보를 수집 및 이용합니다.<br><br>
        > 수집 · 이용 목적: 이벤트 혜택을 제공하기 위한 정보 전달
        : 이벤트 혜택 이용에 따른 본인확인, 고지사항 전달: 접속 빈도 
        파악 또는 회원의 서비스 이용에 대한 통계 <br><br>
        > 수집 필수 항목 : 
        이름, 연락처<br><br>
        > 보유/이용기간 : 이벤트 종료 후 3개월까지
        (단, 관계 법령에 따라 필요한 경우 해당 법률에서 정한 기간까지)
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 개인정보 동의 약관 팝업 --------------------->

<!--------------------- 개인정보 취급위탁 동의 약관 팝업 --------------------->
<div id="pop_privacy_agree" class="popup_wrap zoom-anim-dialog mfp-hide" style="width:400px;left:50%;margin-left:-200px">
  <div class="p_mid_agree p_position">
    <div class="block_close clearfix">
      <a href="#pop_event_input" class="btn_close popup-with-zoom-anim"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <span class="bold">[개인정보의 취급 위탁 동의]</span><br><br>
        (주)LG생활건강은 서비스 향상과 원활한 진행을 위하여 개인정보
        처리 업무를 외부 전문 업체에 위탁하여 처리하고 있습니다.
        고객은 아래와 같은 개인정보 취급 위탁에 동의하지 않을 권리가 
        있으며 동의 거부시 이벤트 참여에 제한을 받을 수 있습니다.<br><br>
        > 취급위탁업체 위탁업무 및 이용목적 : 
        미니버타이징 (주) / 이벤트 대행 및 운영<br><br>
        > 보유 및 이용기간 : 이벤트 종료 후 3개월까지<br>
        (단, 관계 법령에 따라 필요한 경우 해당 법률에서 정한 기간까지)
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 개인정보 취급위탁 동의 약관 팝업 --------------------->

<!--------------------- 광고성 정보전송 동의 약관 팝업 --------------------->
<div id="pop_adver_agree" class="popup_wrap zoom-anim-dialog mfp-hide" style="width:400px;left:50%;margin-left:-200px">
  <div class="p_mid_agree p_position">
    <div class="block_close clearfix">
      <a href="#pop_event_input" class="btn_close popup-with-zoom-anim"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <span class="bold">[광고성 정보 전송 동의]</span><br><br>   
        - (주)LG생활건강은 수집된 개인정보를 이용하여 각종 서비스•상품 및 타사 서비스와 결합된 상품에 대하여 홍보, 가입권유, 프로모션, 이벤트 목적으로 본인에게 정보/광고를 전화, SMS, MMS, 이메일, 우편등을 통해 전달합니다.<br><br>
        - (주)LG생활건강이 마케팅 / 홍보를 위하여 고객의 개인정보를 이용에 동의를 구하며, 동의 거부시에도 이벤트 참여는 가능하나 할인 및 이벤트 정보 안내 등 서비스는 제한될 수 있습니다.
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 광고성 정보전송 동의 약관 팝업 --------------------->
