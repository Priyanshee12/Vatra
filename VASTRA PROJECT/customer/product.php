<?php include_once("inc/header.php");
?>
              
                <div class="col-md-9">
                    <h1><i class="fa fa-tachometer"></i> PRODUCT LIST</h1><hr>
<form action="product_insert.php" method="post" enctype="multipart/form-data">
<table>
	
	<tr>
		<td> Product Name</td>
		<td> <input type="text" name="product_name" required></td>
	</tr>
	<tr>
		<td> Product Price  </td>
		<td> <input type="text" name="product_price" required></td>
	</tr>
	<tr>
		<td> Description </td>
		<td> <input type="textarea" name="description" required></td>
	</tr>
	<tr>
		<td> Product Size </td>
		<td> <input type="text" name="product_size" required></td>
	</tr>
<tr>
			<td>Category</td>
			<td>
                            <select name="category_id">
                                <?php
                                $cn=mysqli_connect("localhost","root","","vastra") or die(mysqli_eroor());
                                $sql="select * from category";
                                $res=mysqli_query($cn,$sql);
                                while($arr=mysqli_fetch_array($res)){
                                    ?>
                                <option value="<?php echo $arr['category_id'] ?>"><?php echo $arr['category_name'] ?></option>
                                <?php
                                }
                                mysqli_close($cn);
                                ?>
                                </select>
                                
                                
                        </td>
		</tr>
		<tr>
		<td> Quantity </td>
		<td> <input type="text" name="quantity" required></td>
	</tr>
	<tr>
		<td> Image </td>
		<td> <input type="file" name="file" required></td>
	</tr>
	<tr>
		<td colspan ="2" align="center"> <input type="submit" value="submit" name="btnsubmit">
		</td>
	</tr>
</table>
</form>
	<?php
		$cn=mysqli_connect("localhost","root","","vastra") or die(mysql_error());
		$sql="select p.id,p.product_name,p.product_price,p.description,p.product_size,c.category_name,p.quantity,p.image from product p,category c where p.category_id=c.category_id";
		$result=mysqli_query($cn,$sql);
		echo "<table border='1'>";
		
		echo "<tr>";
		echo "<th>product_id</th>";
		echo "<th>product_name</th>";
		echo "<th>product_price</th>";
		echo "<th>description</th>";
		echo "<th>product_size</th>";
		echo "<th>category</th>";
		echo "<th>quantity</th>";
		echo "<th>image</th>";
		echo "<th> Add new </th>";
		echo "</tr>";
		
		
		while($row=mysqli_fetch_array($result))
			{	
				echo "<tr>";
				echo "<td>${row['id']}</td>";
				echo "<td>${row['product_name']}</td>";
				echo "<td>${row['product_price']}</td>";
				echo "<td>${row['description']}</td>";
				echo "<td>${row['product_size']}</td>";
				echo "<td>${row['category_name']}</td>";
				echo "<td>${row['quantity']}</td>";
				echo "<td><img src=images/$row[image] width=60 height=60 /></td>";

				echo "<td><a href='product_edit.php?id=${row['id']}'>Edit</a>|<a href='product_delete.php?id=${row['id']}'>delete</a></td>";
				echo "</tr>";
			}
			echo "<tr><td colspan='9'>".mysqli_num_rows($result)."records found</td></tr>";
			echo "</table>";
			mysqli_close($cn);
			?>
	
		
</body>
</html>
 <?php include_once("inc/footer.php");
 ?>