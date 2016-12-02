
<script type="text/javascript">
function cpSearch(){
$("#cpsearchdiv").load("cpsearch.php",$("#yourFormId").serialize());
}
</script>

<script type="text/javascript">
function cpClear(){
 document.getElementById('moviename').value = "";
 document.getElementById("cpsearchdiv").innerHTML='';
  
 document.getElementById("#cpdivwanted").load("cp_parser.php");
}
</script>

<style type="text/css">
hr { display: block; height: 1px;
    border: 0; border-top: 1px solid #999999;
    margin: 0; padding: 0; margin-top:5px; margin-bottom:5px;}

</style>


	<div style="background-color: #fff; margin-bottom: 8px;" >

		
				
		<table width="100%" border="0" cellspacing="2" cellpadding="0" style="margin-top:-7x;">
			<tr>
				<td style="padding:2px; padding-left:0px; margin:0px; text-decoration: none;	font-family: Arial, Helvetica, sans-serif; font-size: 11px;	color: #4D4D4D; font-weight: normal;">
					<img style="margin-bottom: 0px; margin-top: -7px;" src="includes/images/cplogo.png" height="38"><br>
					
					<form action="JavaScript:cpSearch()" method="POST" id="yourFormId" >
						<input type="text" id="moviename"  name="moviename" style="width: 90px;">
						<input type="submit" name="submit" value="Search"  style="width: 58px;">
						<input type="button" value="Clear" onClick="cpClear()" style="width: 56px;" />
					</form>
					
					<div id="cpsearchdiv"></div>
					
					
				</td>	
			</tr>
		</table>
<hr>		
		</div> 	


