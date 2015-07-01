<?php

	// 설정파일
	include_once "../config.php";

	include "./head.php";

?>

<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">일자별 블로거별 추천 수</h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table id="entry_list" class="table table-hover">
            <thead>
              <tr>
                <th>날짜</th>
                <th>영양맘 바짱아님</th>
                <th>파파맘 필링링님</th>
                <th>자유로운맘 나봄루리님</th>
                <th>전투육아맘 꽃보다 순님</th>
                <th>깔끔맘 야루키님</th>
                <th>트렌드맘 른규쏭님</th>
                <th>합계</th>
              </tr>
            </thead>
            <tbody>
<?php 
	$date_query = "SELECT substr(mb_regdate,1,10) mb_date FROM ".$_gl['member_info_table']." WHERE 1 Group by substr(mb_regdate,1,10) order by mb_regdate desc";
	$res = mysqli_query($my_db, $date_query);
	
	while ($date_data = @mysqli_fetch_array($res))
	{		
		$b_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_regdate LIKE  '%".$date_data['mb_date']."%' AND mb_gubun='PC' AND mb_serialnumber<>''";
		$b_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));

?>
              <tr>
                <td><?php echo $date_data['mb_date']?></td>
                <td><?php echo $pc_count?></td>
                <td><?php echo $mobile_count?></td>
                <td><?php echo $total_count?></td>
              </tr>
<?php 
	}
?>
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