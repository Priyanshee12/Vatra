<?php 

error_reporting(0);
?>
<?php include_once("inc/header.php");

?>
 
<br>
<br>
<br>
<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "vastra");
?>
 <html>
 <body>

<h3><center>Bill</center></h3>
			
			<table border=4 >
					<tr>
						<th>Item Id</th>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td align=center><?php echo $values["item_id"]; ?></td>
						
						<td align=center><?php echo $values["item_name"]; ?></td>
						<td align=center><?php echo $values["item_quantity"]; ?></td>
						<td align=center>Rs <?php echo $values["item_price"]; ?></td>
						<td align=center>RS <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td align="center">Rs <?php echo number_format($total, 2); ?></td>
						
					</tr>
					<tr>
					<td colspan=5 align=right><a href=insorder.php align=right><h3>Payment</h3></a></td>
					</tr>
					<?php
					}
					?>
						
				</table>
				
			</div>
		</div>
	</div>
	<br />
	
	</body>
</html>
<?php include_once("inc/footer.php");

?>

