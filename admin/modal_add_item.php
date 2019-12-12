<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add Item</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add Item</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Item ID</label>
						<div class="col-sm-4">
						  <input type="number" name="item_id_id" class="form-control" id="inputEmail3" placeholder="Item ID....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-7">
						  <input type="text" name="item_name" class="form-control" id="inputEmail3" placeholder="Name....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Brand</label>
						<div class="col-sm-7">
						  <input type="text" name="item_brand" class="form-control" id="inputPassword3" placeholder="Brand....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Description</label>
						<div class="col-sm-7">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<textarea class="form-control" name="item_description" id="inputPassword3" placeholder="Description....." required /></textarea>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Qty</label>
						<div class="col-sm-3">
						  <input type="number" name="item_qty" class="form-control" id="inputPassword3" placeholder="Qty....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="number" name="item_price" class="form-control" id="inputPassword3" placeholder="Price....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Type</label>
						<div class="col-sm-7">
						  <select name="item_type" class="form-control" required />
							<option value="Consumable">Consumable</option>
							<option value="Non-Consumable">Non-Consumable</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Submit</button>
						</div>
					  </div>
					</form>
					
						<?php 
						include('include/database.php');
						if (isset($_POST['submit'])){
							
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
mysql_query("INSERT INTO history (date,action,data) VALUES (NOW(),'Add Item','$user')")or die(mysql_error());
						
						{
						mysql_query ("INSERT INTO item (item_id_id,item_name,item_brand,item_description,item_qty,item_price,item_type,date)
						 VALUES ('$item_id_id','$item_name','$item_brand','$item_description','$item_qty','$item_price','$item_type',NOW())")or die(mysql_error());
						}
						echo "<script>alert('Item successfully added!'); window.location='item.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>