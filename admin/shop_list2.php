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
<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">더페이스샵 매장 목록</h1>
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
                <option value="shop_name" <?php if($search_type == "shop_name"){?>selected<?php }?>>매장명</option>
                <option value="shop_addr" <?php if($search_type == "shop_addr"){?>selected<?php }?>>매장주소</option>
              </select>
              <input type="text" name="search_txt" value="<?php echo $search_txt?>">
              <input type="submit" value="검색">
            </form>
          </ol>
          <table id="entry_list" class="table table-hover">
            <thead>
              <tr>
                <th>순번</th>
                <th>매장이름</th>
                <th>매장주소</th>
                <th>매장전화번호</th>
                <th>할당된갯수</th>
                <th>선택받은갯수</th>
              </tr>
            </thead>
            <tbody>
<?php 
	$where = "";
	if ($search_txt != "")
		$where	.= " AND ".$search_type." like '%".$search_txt."%'";

	$buyer_count_query = "SELECT count(*) FROM ".$_gl['shop_info_table']." WHERE 1 ".$where."";
//1을 넣는다.
	list($buyer_count) = @mysqli_fetch_array(mysqli_query($my_db, $buyer_count_query));
	$PAGE_CLASS = new Page($pg,$buyer_count,$page_size,$block_size);

	$BLOCK_LIST = $PAGE_CLASS->blockList();
	$PAGE_UNCOUNT = $PAGE_CLASS->page_uncount;

	$buyer_list_query = "SELECT * FROM ".$_gl['shop_info_table']." WHERE 1 ".$where." Order by sel_count DESC LIMIT $PAGE_CLASS->page_start, $page_size";
	$res = mysqli_query($my_db, $buyer_list_query);

	while ($buyer_data = @mysqli_fetch_array($res))
	{
    $buyer_info[] = $buyer_data; 
	}

	foreach($buyer_info as $key => $val)
	{
	//	$shop_query = "SELECT shop_name FROM ".$_gl['shop_info_table']." WHERE idx='".$buyer_info[$key]['shop_idx']."'";
	//	$res = mysqli_query($my_db, $shop_query);
	//	$shop_name	= @mysqli_fetch_array($res);
?>
              <tr>
                <td><?php echo $PAGE_UNCOUNT--?></td>	<!-- No. 하나씩 감소 -->
                <td><?php echo $buyer_info[$key]['shop_name']?></td>
                <td><?php echo $buyer_info[$key]['shop_addr']?></td>
                <td><?php echo $buyer_info[$key]['shop_phone']?></td>
                <td><?php echo $buyer_info[$key]['req_cnt']?></td>
                <td><?php echo $buyer_info[$key]['sel_count']?></td>
              </tr>
<?php 
	}
?>
              <tr><td colspan="7"><div class="pageing"><?php echo $BLOCK_LIST?></div></td></tr>
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