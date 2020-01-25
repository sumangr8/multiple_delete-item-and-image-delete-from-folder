<table border="1" style="text-align: center;" align="center">
<form method="post" action="">
<tr>
	<td colspan="3"><input type="submit" name="submit" value="Delete"></td>
</tr>
<?php
$con=mysqli_connect("localhost","root","","calling");
$qry=mysqli_query($con,"select * from table1");
$total_row=mysqli_num_rows($qry);
for($i=1;$i<=$total_row;$i++)
{
	$row=mysqli_fetch_array($qry);
?>
<tr>
	<td><input type="checkbox" name="remove[]" value="<?php echo $row['id'] ?>"></td>
	<td><?php echo $row["t_no"] ?></td>
	<td><?php echo $row["slot_no"] ?></td>
	<td><?php echo $row["team"] ?></td>
	<td><img src="img/<?php echo $pic ?>"></td>
</tr>
<?php
}
?>
</form>
</table>
<?php
if(isset($_POST["submit"]))
{
	$remove=implode(",",$_POST["remove"]);
	//Start For Delete Image from folder

	// $qry1=mysqli_query($con,"SELECT * FROM table1 WHERE id in ($remove)");
	// $img_count=mysqli_num_rows($qry1);
	// for($i=1;$i<=$img_count;$i++)
	// {
	// 	$row=mysqli_fetch_array($qry1);
	// 	unlink("img/".$row["pic"]);
	// }
	
	//End For Delete Image
	$qry=mysqli_query($con,"DELETE FROM `table1` WHERE id in ($remove)");
	header("location:m_delete.php");
}
?>
