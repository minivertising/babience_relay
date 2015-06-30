<?php

	// 설정파일
	include_once "../config.php";

/*
	if (isset($_SESSION['ss_mb_id']) == false)
	{
		//header('Location: index.php'); 
		echo "<script>location.href='index.php'</script>"; 
		exit; 
	}
*/

	include "./head.php";

	if(isset($_REQUEST['search_type']) == false)
		$search_type = "";
	else
		$search_type = $_REQUEST['search_type'];

	if(isset($_REQUEST['search_txt']) == false)
		$search_txt	= "";
	else
		$search_txt	= $_REQUEST['search_txt'];

	if(isset($_REQUEST['sDate']) == false)
		$sDate = "";
	else
		$sDate = $_REQUEST['sDate'];
	
	if(isset($_REQUEST['eDate']) == false)
		$eDate = "";
	else
		$eDate = $_REQUEST['eDate'];

	
	if(isset($_REQUEST['pg']) == false)
		$pg = "1";
	else
		$pg = $_REQUEST['pg'];
	
	if (!$pg)
		$pg = "1";
	//if(isset($pg) == false) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 10;	// 한 페이지에 나타날 개수
	$block_size = 10;	// 한 화면에 나타낼 페이지 번호 개수

	//if (isset($search_type) == false)
	//	$search_type = "search_by_name";
?>
<script type="text/javascript">
	$(function() {
		$( "#sDate" ).datepicker();
		$( "#eDate" ).datepicker();
	});

	function checkfrm()
	{
		if ($("#sDate").val() > $("#eDate").val())
		{
			alert("검색 시작일은 종료일보다 작아야 합니다.");
			return false;
		}
	}
</script>

<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">이벤트 참여자 목록</h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <ol class="breadcrumb">
            <form name="frm_execute" method="POST" onsubmit="return checkfrm()">
              <input type="hidden" name="pg" value="<?=$pg?>">
              <select name="search_type">
                <option value="mb_name" <?php if($search_type == "mb_name"){?>selected<?php }?>>이름</option>
                <option value="mb_phone" <?php if($search_type == "mb_phone"){?>selected<?php }?>>전화번호</option>
              </select>
              <input type="text" name="search_txt" value="<?php echo $search_txt?>">
              <input type="text" id="sDate" name="sDate" value="<?=$sDate?>"> - <input type="text" id="eDate" name="eDate" value="<?=$eDate?>">
              <input type="submit" value="검색">
			  <li align="right";>
			  <?
					$member = "SELECT count(idx) FROM ".$_gl['member_info_table']." WHERE mb_name <> 'admin' ";
					$res3 = mysqli_query($my_db, $member);
					list($total_count)	= @mysqli_fetch_array($res3);
					echo  "전체 참여자수 : $total_count";
				?>
			</li>
            </form>
          </ol>
          <table id="entry_list" class="table table-hover">
            <thead>
              <tr>
                <th>순번</th>
                <th>IP주소</th>
                <th>이름</th>
                <th>전화번호</th>
                <th>아기이름</th>
                <th>추천한블로거</th>
                <th>유입매체</th>
                <th>당첨선물</th>
                <th>구분</th>
                <th>추천일자</th>
              </tr>
            </thead>
            <tbody>
<?php 
	$where = "";

	if ($sDate != "")
		$where	.= " AND mb_regdate >= '".$sDate."' AND mb_regdate <= '".$eDate." 23:59:59'";
	
	if ($search_txt != "")
	{
		$where	.= " AND ".$search_type." like '%".$search_txt."%'";
	}
	$buyer_count_query = "SELECT count(*) FROM ".$_gl['member_info_table']." WHERE 1 ".$where."";

	list($buyer_count) = @mysqli_fetch_array(mysqli_query($my_db, $buyer_count_query));
	$PAGE_CLASS = new Page($pg,$buyer_count,$page_size,$block_size);

	$BLOCK_LIST = $PAGE_CLASS->blockList();
	$PAGE_UNCOUNT = $PAGE_CLASS->page_uncount;
	$buyer_list_query = "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_name <> 'admin' ".$where." Order by idx DESC LIMIT $PAGE_CLASS->page_start, $page_size";

	$res = mysqli_query($my_db, $buyer_list_query);

	while ($buyer_data = @mysqli_fetch_array($res))
	{
    $buyer_info[] = $buyer_data; 
	}

	foreach($buyer_info as $key => $val)
	{
		$blogger_query = "SELECT * FROM ".$_gl['blogger_info_table']." WHERE idx='".$buyer_info[$key]['mb_blogger']."'";
		$blogger_info = mysqli_fetch_array(mysqli_query($my_db, $blogger_query));

		if ($buyer_info[$key]['mb_winner'] == "CASH")
		{
			$winner_gift	="베비언스 3천원 쿠폰";
		}else if ($buyer_info[$key]['mb_winner'] == "CAMERA"){
			$winner_gift	="DSLR 카메라";
		}else if ($buyer_info[$key]['mb_winner'] == "HOTEL"){
			$winner_gift	="하얏트 호텔 숙박권";
		}else if ($buyer_info[$key]['mb_winner'] == "WG"){
			$winner_gift	="베베프람 웨건";
		}else if ($buyer_info[$key]['mb_winner'] == "MILK"){
			$winner_gift	="베비언스 분유 1년치";
		}else if ($buyer_info[$key]['mb_winner'] == "WATER"){
			$winner_gift	="베이비워터 24병";
		}else if ($buyer_info[$key]['mb_winner'] == "WASH"){
			$winner_gift	="메소드 핸드워시";
		}

?>
              <tr>
                <td><?php echo $PAGE_UNCOUNT--?></td>	<!-- No. 하나씩 감소 -->
                <td><?php echo $buyer_info[$key]['mb_ipaddr']?></td>
                <td><?php echo $buyer_info[$key]['mb_name']?></td>
                <td><?php echo $buyer_info[$key]['mb_phone']?></td>
                <td><?php echo $buyer_info[$key]['baby_name']?></td>
                <td><?php echo $blogger_info['blogger_name']?></td>
                <td><?php echo $buyer_info[$key]['mb_media']?></td>
                <td><?php echo $winner_gift?></td>
                <td><?php echo $buyer_info[$key]['mb_gubun']?></td>
                <td><?php echo $buyer_info[$key]['mb_regdate']?></td>
              </tr>
<?php 
	}
?>


              <tr><td colspan="10"><div class="pageing"><?php echo $BLOCK_LIST?></div></td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>

</html>



<script type="text/javascript">
 
	function pageRun(num)
	{
		f = document.frm_execute;
		f.pg.value = num;
		f.submit();
	}


</script>