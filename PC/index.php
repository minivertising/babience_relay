<?
	include_once   "./header.php";

	$random = PHPRandom::getHexString("10");
	print_r($random);


?>
  <div id="total_num">
  </div>
  <div id="blogger_area">
    <div>
    </div>
  </div>
  </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	setInterval("auto_count()",1000)
});

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
</script>