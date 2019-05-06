<html>
<body>
	<h2>Manage User</h2>
<form action="manage_user_save.php" id="input">

<?php
	include("config.php");
	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
	
	$firstname	= "";
	$lastname	= "";
	if($user_id != ""){
		$sql = "SELECT * FROM user WHERE user_id = ".$user_id."";
		$result = $conn->query($sql);

		while($row=mysqli_fetch_array($result)){
			$firstname 	= isset($row['firstname']) ? $row['firstname'] : "";
			$lastname 	= isset($row['lastname']) ? $row['lastname'] : "";			
		}
		?>
		User Id:
		<input type="text" id="user_id" name="user_id" value="<?=$user_id;?>">
		<br/>
		
		<?
	}	
?>
	<input type="hidden" name="cmd" id="cmd" value="manage">
  First name:  
  <input type="text" name="firstname" id="firstname" value="<?=$firstname;?>">
  <br>
  
  Last name:
  <input type="text" name="lastname" id="lastname"  value="<?=$lastname;?>">
  <br>
  <br>
 
  <input type="submit" value="Submit">
  
  <br/>
  <br/>
  <br/>
 
</form>
<form id="data">
 Search :: <input type="text" name="search" id="search">
  <input type="submit" value="Search">
  <br/>
  <br/>
 
  
  
	<?php
		$search = isset($_GET['search']) ? $_GET['search'] : "";
		$sql = "SELECT * FROM user";
		if($search != ""){
			$sql .= " WHERE 
					firstname LIKE '%".$search."%'
					OR lastname LIKE '%".$search."%'					
					";
		}
		
		$result2 = $conn->query($sql);
		
		while($row2=mysqli_fetch_array($result2)){
			echo "<table border = '1' width='50%'>
					<tr>
						<td width='20%'>".$row2['user_id']."</td>
						<td width='30%'>".$row2['firstname']."</td>
						<td width='30%'>".$row2['lastname']."</td>
						<td width='20%'>
							";
							?>
							<input type="button" value="Edit" onclick="javascript:location.href='http://127.0.0.1/testing/manage_user.php?user_id=<?=$row2['user_id'];?>'">
							<input type="button" value="Delete" onclick="javascript:location.href='http://127.0.0.1/testing/manage_user_save.php?cmd=delete&user_id=<?=$row2['user_id'];?>'">
							<?php
							echo "
						</td>
					</tr>
				</table>";
			
		}






	?>
</form>
</body>
</html>