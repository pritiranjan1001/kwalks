<?php
include('connect.php');
include 'function.php';
include ('username.php');                
$req_query=mysql_query("SELECT from_me FROM frnd_req WHERE to_frnd='$my_id'");
while ($run_req= mysql_fetch_array($req_query)) {
$from_me=$run_req['from_me'];
$from_username=getuser($from_me,'username');
?>
<li>
<h6 class="notifi"> <?php  echo "<a href='profile.php?user=$from_me' class='nots' style='display:block'>$from_username</a> wants to be your friend<br>
<input onclick='change556(this, $from_me)' type='button' class='btn button-custom btn-custom-three' value='ignore' id='ignore' ></input>  <input onclick='change556(this, $from_me)' type='button' class='btn button-custom btn-custom-three' value='accept' id='accept'></input>"?></h6>
<hr>
<?php  }  ?>
<script type="text/javascript"> function change556(e,i)
{ var dataString="id="+i;
 if(e.value=="accept")
{
dataString=dataString+"&action=accept"
$("#ignore").hide();
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}
 	else if(e.value=="ignore")
	{
		dataString=dataString+"&action=ignore"
		
		
		  $("#accept").hide();
		$.ajax({
			type:"POST",
			url:"include/action.php",
			data:dataString,
			success:function(response)
			{}
		});
	}		
}
</script>
						