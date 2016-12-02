
<script type="text/javascript">
function cpSearch(){
$("#cpsearchdivin").load("cpsearch.php",$("#yourCPFormId").serialize());
}
</script>

<script type="text/javascript">
function cpClearInline(){
 document.getElementById('moviename').value = "";
 document.getElementById("cpsearchdivin").innerHTML='';
  

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
				
				<form action="JavaScript:cpSearch()" method="POST" id="yourCPFormId" style="margin-top: -5px;" >
					
			<!--	<img style="margin-b: -10px;" src="includes/images/cplogo.png" height="28">
			-->		
						<input type="text" id="moviename"  name="moviename" style="width: 130px;">
						<input type="submit" name="submit" value="Search"  style="width: 58px;">
						<input type="button" value="Clear" onClick="cpClearInline()" style="width: 56px;" />
						
					</form>
					
					<div id="cpsearchdivin"></div>
					
					
				</td>	
			</tr>
		</table>
<hr>		
		</div> 	


