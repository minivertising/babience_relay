<!--------------------- 이벤트 개인정보 입력 팝업 --------------------->
<div id="pop_event_input" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-353px;top:50%;left:50%;z-index:99999;display:none;">
  <input type="hidden" name="blogger_num" id="blogger_num">
  <div class="p_mid_input p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_event_input');location.reload();" class="btn_close"><img src="images/popup/btn_close.png" /></a>
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
          <div class="input_one clearfix" style="padding-top:19px;">
            <div class="label">
            휴대폰 번호
            </div>
            <div class="input_phone clearfix">
              <div class="phone_ip">
                <select name="mb_phone1" id="mb_phone1">
                  <option value="010">010</option>
                  <option value="011">011</option>
                  <option value="016">016</option>
                  <option value="017">017</option>
                  <option value="018">018</option>
                  <option value="019">019</option>
                </select>
              </div>
              <div class="phone_ip"><input type="tel" name="mb_phone2" id="mb_phone2" onkeyup="only_num(this);"></div>
              <div class="phone_ip"><input type="tel" name="mb_phone3" id="mb_phone3" onkeyup="only_num(this);"></div>
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
          <div class="check_one first clearfix">
            <div class="in_check">
              <input type="checkbox" name="all_agree" id="all_agree" class="all_chk_cl" onclick="all_check();">
            </div>
            <div class="txt_check">
              <img src="images/popup/label_agree_all.png" alt=""/>
            </div>
          </div>  
          <div class="check_one clearfix">
            <div class="in_check">
              <input type="checkbox" name="agree" id="use_agree">
            </div>
            <div class="txt_check">
              <img src="images/popup/agree_info.png" alt=""/>
            </div>
            <div class="btn_check">
              <a href="#" onclick="open_pop('pop_use_agree','pop_event_input');"><img src="images/popup/btn_agree.png" alt=""/></a>
            </div>
          </div>
          <div class="check_one clearfix">
            <div class="in_check">
              <input type="checkbox" name="agree" id="privacy_agree">
            </div>
            <div class="txt_check">
              <img src="images/popup/agree_info_agency.png" alt=""/>
            </div>
            <div class="btn_check">
              <a href="#" onclick="open_pop('pop_privacy_agree','pop_event_input');"><img src="images/popup/btn_agree.png" alt=""/></a>
            </div>
          </div>
          <div class="check_one clearfix">
            <div class="in_check">
              <input type="checkbox" name="agree" id="adver_agree">
            </div>
            <div class="txt_check">
              <img src="images/popup/agree_info_ad.png" alt=""/>
            </div>
            <div class="btn_check">
              <a href="#" onclick="open_pop('pop_adver_agree','pop_event_input');"><img src="images/popup/btn_agree.png" alt=""/></a>
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
<div id="pop_thanks_div" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-315px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid ending p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_thanks_div');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
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
          <a href="http://www.babience.com/event/150701/event.jsp" target="_blank"><img src="images/popup/btn_home.png" /></a>
        </div>
        <div class="btn_sns_block">
          <a href="#" onclick="sns_share('fb');return false;"><img src="images/popup/btn_share_fb.png" alt=""/></a>
          <a href="#" onclick="alert('고객님의 브라우저에서는 지원되지 않는 기능입니다.');"><img src="images/popup/btn_share_ks.png" alt=""/></a>
          <a href="#" onclick="sns_share('tw');return false;"><img src="images/popup/btn_share_tw.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 이벤트 참여완료 --------------------->

<!--------------------- 이벤트 중복참여 --------------------->
<div id="pop_dupli_div" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-150px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid small p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_dupli_div');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_already.png" />
        </div>
        <div class="block_btn">
          <a href="#" onclick="close_pop('pop_dupli_div');"><img src="images/popup/btn_ok.png" /></a>
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

<!--------------------- 나의 선물함 팝업 --------------------->
<div id="pop_search_gift" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-315px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid gift_check p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_search_gift');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_num_check.png" />
        </div>
        <div class="check_name">
          <!--이름 체크-->
          <div class="in">	
            <input type="text" name="s_name" id="s_name">
          </div>
        </div>
        <div class="check_num">
          <!--전번 체크-->
          <div class="inner clearfix">
            <div class="in"><input type="tel" name="s_phone1" id="s_phone1" onkeyup="only_num(this);"></div>
            <div class="in"><input type="tel" name="s_phone2" id="s_phone2" onkeyup="only_num(this);"></div>
            <div class="in"><input type="tel" name="s_phone3" id="s_phone3" onkeyup="only_num(this);"></div>
            <div class="btn"><a href="#" onclick="search_gift();"><img src="images/popup/btn_gift_check_ok.png" /></a></div>
          </div>
        </div>
        <!--선물리스트-->
        <div class="yes_gift">
          <div class="inner_yes_gift">
            <div class="block_label clearfix">
              <div class="name"><img src="images/popup/label_gift.png" /></div>
              <div class="num"><img src="images/popup/label_gift_num.png" /></div>
            </div>
            <div class="block_gift_num">
            </div>
          </div>
          <div class="block_go_home">
            <div class="btn_block">
              <a href="http://www.babience.com/event/150701/event.jsp" target="_blank"><img src="images/popup/btn_go_home.png" alt=""/></a>
            </div>
            <div class="notice">
              <img src="images/popup/notice_gift_num.png" alt=""/>
            </div>
          </div>
        </div>
        <!--end:선물리스트-->
        <!--한번도 참여 안함 유저일 경우-->
        <div class="no_gift" style="display:none;" >
          <div class="btn_block">
            <a href="#" onclick="$.magnificPopup.close();"><img src="images/popup/img_no_gift.png" alt=""/></a>
          </div>
        </div>
        <!--end:한번도 참여 안함 유저일 경우-->
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 나의 선물함 팝업 --------------------->

<!--------------------- 파워블로거1 상세보기 팝업 --------------------->
<div id="pop_detail_view1" class="popup_wrap" style="position:absolute;width:950px;margin-left:-475px;margin-top:-350px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid posting p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_detail_view1');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="post_top clearfix">
          <div class="title">
            <a href="http://vazzanga.blog.me/220406355379" target="_blank"><img src="images/popup/bloger_name_1.png" alt=""/></a> <img src="images/popup/txt_update.png" alt=""/>
          </div>
          <div class="tab_menu clearfix">
            <a href="#"><img src="images/popup/tab_menu_1_on.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_2_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_3_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_4_off.png" /></a>
          </div>
        </div>
        <div class="txt_posting">
          <a href="http://vazzanga.blog.me/220406355379" target="_blank"><img src="images/popup/bloger_img_1.png" alt=""/></a>
        </div>
        <div class="btn_block">
          <div class="bt"><a href="#" onclick="go_recom('<?=$d_info[1]['idx']?>','detail');"><span><?=number_format($d_info[1]['b_recommend'])?>명의 맘</span></a></div>
        </div>
        <div class="block_comment clearfix">
          <div class="txt" id="comment_view1">
          </div>
          <div class="bt">
            <a href="#" onclick="open_pop('pop_comment_input1','pop_detail_view1');"><img src="images/popup/bt_cm.png" alt=""/></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거1 상세보기 팝업 --------------------->

<!--------------------- 파워블로거1 코멘트 입력 팝업 --------------------->
<div id="pop_comment_input1" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-225px;top:50%;left:50%;z-index:99999;display:none;">
  <input type="hidden" name="blogger_idx" id="blogger_idx1" value="1">
  <div class="p_mid_comment p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_detail_view1','pop_comment_input1');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_comment.png" />
        </div>
        <div class="block_input">
          <div class="input_one clearfix">
            <div class="label">
            닉네임
            </div>
            <div class="input">
              <input type="text" name="mb_nickname" id="mb_nickname1">
            </div>
          </div>
          <div class="input_one textarea clearfix">
            <div class="label">
            댓글
            </div>
            <div class="input">
              <textarea name="mb_comment" id="mb_comment1"></textarea>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_comment('1');"><img src="images/popup/btn_comment.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거1 코멘트 입력 팝업 --------------------->

<!--------------------- 파워블로거2 상세보기 팝업 --------------------->
<div id="pop_detail_view2" class="popup_wrap" style="position:absolute;width:950px;margin-left:-475px;margin-top:-350px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid posting p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_detail_view2');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="post_top clearfix">
          <div class="title">
            <a href="http://blog.naver.com/goeun061133/220406179689" target="_blank"><img src="images/popup/bloger_name_2.png" alt=""/></a> <img src="images/popup/txt_update.png" alt=""/>
          </div>
          <div class="tab_menu clearfix">
            <a href="#"><img src="images/popup/tab_menu_1_on.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_2_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_3_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_4_off.png" /></a>
          </div>
        </div>
        <div class="txt_posting">
          <a href="http://blog.naver.com/goeun061133/220406179689" target="_blank"><img src="images/popup/bloger_img_2.png" alt=""/></a>
        </div>
        <div class="btn_block">
          <div class="bt"><a href="#" onclick="go_recom('<?=$d_info[2]['idx']?>','detail');"><span><?=number_format($d_info[2]['b_recommend'])?>명의 맘</span></a></div>
        </div>
        <div class="block_comment clearfix">
          <div class="txt" id="comment_view2">
          </div>
          <div class="bt">
            <a href="#" onclick="open_pop('pop_comment_input2','pop_detail_view2');"><img src="images/popup/bt_cm.png" alt=""/></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거2 상세보기 팝업 --------------------->

<!--------------------- 파워블로거2 코멘트 입력 팝업 --------------------->
<div id="pop_comment_input2" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-225px;top:50%;left:50%;z-index:99999;display:none;">
  <input type="hidden" name="blogger_idx" id="blogger_idx2" value="2">
  <div class="p_mid_comment p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_detail_view2','pop_comment_input2');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_comment.png" />
        </div>
        <div class="block_input">
          <div class="input_one clearfix">
            <div class="label">
            닉네임
            </div>
            <div class="input">
              <input type="text" name="mb_nickname" id="mb_nickname2">
            </div>
          </div>
          <div class="input_one textarea clearfix">
            <div class="label">
            댓글
            </div>
            <div class="input">
              <textarea name="mb_comment" id="mb_comment2"></textarea>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_comment('2');"><img src="images/popup/btn_comment.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거2 코멘트 입력 팝업 --------------------->

<!--------------------- 파워블로거3 상세보기 팝업 --------------------->
<div id="pop_detail_view3" class="popup_wrap" style="position:absolute;width:950px;margin-left:-475px;margin-top:-350px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid posting p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_detail_view3');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="post_top clearfix">
          <div class="title">
            <a href="http://blog.naver.com/luckyj407/220406414442" target="_blank"><img src="images/popup/bloger_name_3.png" alt=""/></a> <img src="images/popup/txt_update.png" alt=""/>
          </div>
          <div class="tab_menu clearfix">
            <a href="#"><img src="images/popup/tab_menu_1_on.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_2_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_3_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_4_off.png" /></a>
          </div>
        </div>
        <div class="txt_posting">
          <a href="http://blog.naver.com/luckyj407/220406414442" target="_blank"><img src="images/popup/bloger_img_3.png" alt=""/></a>
        </div>
        <div class="btn_block">
          <div class="bt"><a href="#" onclick="go_recom('<?=$d_info[3]['idx']?>','detail');"><span><?=number_format($d_info[3]['b_recommend'])?>명의 맘</span></a></div>
        </div>
        <div class="block_comment clearfix">
          <div class="txt" id="comment_view3">
          </div>
          <div class="bt">
            <a href="#" onclick="open_pop('pop_comment_input3','pop_detail_view3');"><img src="images/popup/bt_cm.png" alt=""/></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거3 상세보기 팝업 --------------------->

<!--------------------- 파워블로거3 코멘트 입력 팝업 --------------------->
<div id="pop_comment_input3" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-225px;top:50%;left:50%;z-index:99999;display:none;">
  <input type="hidden" name="blogger_idx" id="blogger_idx3" value="3">
  <div class="p_mid_comment p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_detail_view3','pop_comment_input3');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_comment.png" />
        </div>
        <div class="block_input">
          <div class="input_one clearfix">
            <div class="label">
            닉네임
            </div>
            <div class="input">
              <input type="text" name="mb_nickname" id="mb_nickname3">
            </div>
          </div>
          <div class="input_one textarea clearfix">
            <div class="label">
            댓글
            </div>
            <div class="input">
              <textarea name="mb_comment" id="mb_comment3"></textarea>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_comment('3');"><img src="images/popup/btn_comment.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거3 코멘트 입력 팝업 --------------------->

<!--------------------- 파워블로거4 상세보기 팝업 --------------------->
<div id="pop_detail_view4" class="popup_wrap" style="position:absolute;width:950px;margin-left:-475px;margin-top:-350px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid posting p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_detail_view4');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="post_top clearfix">
          <div class="title">
            <a href="http://jinjuseo.blog.me/220406575011" target="_blank"><img src="images/popup/bloger_name_4.png" alt=""/></a> <img src="images/popup/txt_update.png" alt=""/>
          </div>
          <div class="tab_menu clearfix">
            <a href="#"><img src="images/popup/tab_menu_1_on.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_2_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_3_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_4_off.png" /></a>
          </div>
        </div>
        <div class="txt_posting">
          <a href="http://jinjuseo.blog.me/220406575011" target="_blank"><img src="images/popup/bloger_img_4.png" alt=""/></a>
        </div>
        <div class="btn_block">
          <div class="bt"><a href="#" onclick="go_recom('<?=$d_info[4]['idx']?>','detail');"><span><?=number_format($d_info[4]['b_recommend'])?>명의 맘</span></a></div>
        </div>
        <div class="block_comment clearfix">
          <div class="txt" id="comment_view4">
          </div>
          <div class="bt">
            <a href="#" onclick="open_pop('pop_comment_input4','pop_detail_view4');"><img src="images/popup/bt_cm.png" alt=""/></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거4 상세보기 팝업 --------------------->

<!--------------------- 파워블로거4 코멘트 입력 팝업 --------------------->
<div id="pop_comment_input4" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-225px;top:50%;left:50%;z-index:99999;display:none;">
  <input type="hidden" name="blogger_idx" id="blogger_idx4" value="4">
  <div class="p_mid_comment p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_detail_view4','pop_comment_input4');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_comment.png" />
        </div>
        <div class="block_input">
          <div class="input_one clearfix">
            <div class="label">
            닉네임
            </div>
            <div class="input">
              <input type="text" name="mb_nickname" id="mb_nickname4">
            </div>
          </div>
          <div class="input_one textarea clearfix">
            <div class="label">
            댓글
            </div>
            <div class="input">
              <textarea name="mb_comment" id="mb_comment4"></textarea>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_comment('4');"><img src="images/popup/btn_comment.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거4 코멘트 입력 팝업 --------------------->

<!--------------------- 파워블로거5 상세보기 팝업 --------------------->
<div id="pop_detail_view5" class="popup_wrap" style="position:absolute;width:950px;margin-left:-475px;margin-top:-350px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid posting p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_detail_view5');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="post_top clearfix">
          <div class="title">
            <a href="http://lovewjs012.blog.me/220406442563" target="_blank"><img src="images/popup/bloger_name_5.png" alt=""/></a> <img src="images/popup/txt_update.png" alt=""/>
          </div>
          <div class="tab_menu clearfix">
            <a href="#"><img src="images/popup/tab_menu_1_on.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_2_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_3_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_4_off.png" /></a>
          </div>
        </div>
        <div class="txt_posting">
          <a href="http://lovewjs012.blog.me/220406442563" target="_blank"><img src="images/popup/bloger_img_5.png" alt=""/></a>
        </div>
        <div class="btn_block">
          <div class="bt"><a href="#" onclick="go_recom('<?=$d_info[5]['idx']?>','detail');"><span><?=number_format($d_info[5]['b_recommend'])?>명의 맘</span></a></div>
        </div>
        <div class="block_comment clearfix">
          <div class="txt" id="comment_view5">
          </div>
          <div class="bt">
            <a href="#" onclick="open_pop('pop_comment_input5','pop_detail_view5');"><img src="images/popup/bt_cm.png" alt=""/></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거5 상세보기 팝업 --------------------->

<!--------------------- 파워블로거5 코멘트 입력 팝업 --------------------->
<div id="pop_comment_input5" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-225px;top:50%;left:50%;z-index:99999;display:none;">
  <input type="hidden" name="blogger_idx" id="blogger_idx5" value="5">
  <div class="p_mid_comment p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_detail_view5','pop_comment_input5');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_comment.png" />
        </div>
        <div class="block_input">
          <div class="input_one clearfix">
            <div class="label">
            닉네임
            </div>
            <div class="input">
              <input type="text" name="mb_nickname" id="mb_nickname5">
            </div>
          </div>
          <div class="input_one textarea clearfix">
            <div class="label">
            댓글
            </div>
            <div class="input">
              <textarea name="mb_comment" id="mb_comment5"></textarea>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_comment('5');"><img src="images/popup/btn_comment.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거5 코멘트 입력 팝업 --------------------->

<!--------------------- 파워블로거6 상세보기 팝업 --------------------->
<div id="pop_detail_view6" class="popup_wrap" style="position:absolute;width:950px;margin-left:-475px;margin-top:-350px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid posting p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="close_pop('pop_detail_view6');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="post_top clearfix">
          <div class="title">
            <a href="http://clever_fox.blog.me/220406173165" target="_blank"><img src="images/popup/bloger_name_6.png" alt=""/></a> <img src="images/popup/txt_update.png" alt=""/>
          </div>
          <div class="tab_menu clearfix">
            <a href="#"><img src="images/popup/tab_menu_1_on.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_2_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_3_off.png" /></a>
            <a href="#" onclick="alert('곧 오픈됩니다!');"><img src="images/popup/tab_menu_4_off.png" /></a>
          </div>
        </div>
        <div class="txt_posting">
          <a href="http://clever_fox.blog.me/220406173165" target="_blank"><img src="images/popup/bloger_img_6.png" alt=""/></a>
        </div>
        <div class="btn_block" >
          <div class="bt"><a href="#" onclick="go_recom('<?=$d_info[6]['idx']?>','detail');"><span><?=number_format($d_info[6]['b_recommend'])?>명의 맘</span></a></div>
        </div>
        <div class="block_comment clearfix">
          <div class="txt" id="comment_view6">
          </div>
          <div class="bt">
            <a href="#" onclick="open_pop('pop_comment_input6','pop_detail_view6');"><img src="images/popup/bt_cm.png" alt=""/></a>
          </div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거6 상세보기 팝업 --------------------->

<!--------------------- 파워블로거6 코멘트 입력 팝업 --------------------->
<div id="pop_comment_input6" class="popup_wrap" style="position:absolute;width:500px;margin-left:-250px;margin-top:-225px;top:50%;left:50%;z-index:99999;display:none;">
  <input type="hidden" name="blogger_idx" id="blogger_idx6" value="6">
  <div class="p_mid_comment p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_detail_view6','pop_comment_input6');" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_comment.png" />
        </div>
        <div class="block_input">
          <div class="input_one clearfix">
            <div class="label">
            닉네임
            </div>
            <div class="input">
              <input type="text" name="mb_nickname" id="mb_nickname6">
            </div>
          </div>
          <div class="input_one textarea clearfix">
            <div class="label">
            댓글
            </div>
            <div class="input">
              <textarea name="mb_comment" id="mb_comment6"></textarea>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_comment('6');"><img src="images/popup/btn_comment.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!--------------------- 파워블로거6 코멘트 입력 팝업 --------------------->

<!--------------------- 개인정보 동의 약관 팝업 --------------------->
<div id="pop_use_agree" class="popup_wrap" style="position:absolute;width:400px;margin-left:-200px;margin-top:-240px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid_agree p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_event_input','pop_use_agree')" class="btn_close"><img src="images/popup/btn_close.png" /></a>
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
<div id="pop_privacy_agree" class="popup_wrap" style="position:absolute;width:400px;margin-left:-200px;margin-top:-240px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid_agree p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_event_input','pop_privacy_agree')" class="btn_close"><img src="images/popup/btn_close.png" /></a>
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
<div id="pop_adver_agree" class="popup_wrap" style="position:absolute;width:400px;margin-left:-200px;margin-top:-240px;top:50%;left:50%;z-index:99999;display:none;">
  <div class="p_mid_agree p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="open_pop('pop_event_input','pop_adver_agree')" class="btn_close"><img src="images/popup/btn_close.png" /></a>
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
