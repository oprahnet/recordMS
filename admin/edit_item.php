<?php include('header.php'); 


$ID=$_GET['item_id'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Edit Item</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> Edit Item Details</h2>

                <div class="box-icon">
                <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a> -->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <!-- Start content here -->
				
					<div class="alert alert-info">
						<a href="item.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysql_query("select * from item where item_id='$ID'")or die(mysql_error());
$row=mysql_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Item ID</label>
						<div class="col-sm-3">
						  <input type="number" name="item_id_id" value="<?php echo $row['item_id_id']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" name="item_name" value="<?php echo $row['item_name']; ?>" class="form-control" id="inputEmail3" placeholder="Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Brand</label>
						<div class="col-sm-4">
						  <input type="text" name="item_brand" value="<?php echo $row['item_brand']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Description</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<textarea class="form-control" name="item_description" value="<?php echo $row['item_description']; ?>" id="inputPassword3" placeholder="Description....."><?php echo $row['item_description']; ?></textarea>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Qty</label>
						<div class="col-sm-2">
						  <input type="number" name="item_qty" value="<?php echo $row['item_qty']; ?>" class="form-control" id="inputPassword3" placeholder="Qty.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Price</label>
						<div class="col-sm-2">
						  <input type="number" name="item_price" value="<?php echo $row['item_price']; ?>" class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Type</label>
						<div class="col-sm-3">
						  <select name="item_type" class="form-control">
							<option value="<?php echo $row['item_type']; ?>"><?php echo $row['item_type']; ?></option>
							<option value="Consumable">Consumable</option>
							<option value="Non-Consumable">Non-Consumable</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Update</button>
						</div>
					  </div>
					</form>
							
<?php
$id =$_GET['item_id'];
if (isset($_POST['update'])) {

						$item_id_id=$_POST['item_id_id'];
						$item_name=$_POST['item_name'];
						$item_brand=$_POST['item_brand'];
						$item_description=$_POST['item_description'];
						$item_qty=$_POST['item_qty'];
						$item_price=$_POST['item_price'];
						$item_type=$_POST['item_type'];

$history_record=mysql_query("select * from user where user_id=$id_session");
$row=mysql_fetch_array($history_record);
$user=$row['firstname']." ".$row['lastname'];
mysql_query("INSERT INTO history (date,action,data) VALUES (NOW(),'Edit Item Details','$user')")or die(mysql_error());

{
mysql_query(" UPDATE item SET item_id_id='$item_id_id', item_name='$item_name', item_brand='$item_brand', item_description='$item_description', 
item_qty='$item_qty', item_price='$item_price', item_type='$item_type' WHERE item_id = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Updated Item Info!'); window.location='item.php'</script>";
}

}

?>
					
                <!-- End content here -->
            </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
