<?php include('header.php'); 


$ID=$_GET['client_id'];


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
						<a href="client.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysql_query("select * from client where client_id='$ID'")or die(mysql_error());
$row=mysql_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">School ID</label>
						<div class="col-sm-3">
						  <input type="number" name="school_id" value="<?php echo $row['school_id']; ?>" class="form-control" id="inputEmail3" placeholder="School ID.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Firstname</label>
						<div class="col-sm-4">
						  <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" class="form-control" id="inputEmail3" placeholder="Firstname.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Middlename</label>
						<div class="col-sm-4">
						  <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" class="form-control" id="inputEmail3" placeholder="MI / Middlename....." />
						</div>
						<span style="color:red;">optional</span>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Lastname</label>
						<div class="col-sm-4">
						  <input type="text" name="lastname"  value="<?php echo $row['lastname']; ?>" class="form-control" id="inputPassword3" placeholder="Lastname.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Department</label>
						<div class="col-sm-4">
						  <input type="text" name="department" value="<?php echo $row['department']; ?>" class="form-control" id="inputPassword3" placeholder="Department.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Contact</label>
						<div class="col-sm-4">
						  <input type="number" name="contact" value="<?php echo $row['contact']; ?>" class="form-control" id="inputPassword3" placeholder="Contact.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Type</label>
						<div class="col-sm-4">
						  <select name="type" class="form-control">
							<option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
							<option value="Student">Student</option>
							<option value="Faculty">Faculty</option>
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
$id =$_GET['client_id'];
if (isset($_POST['update'])) {

						$school_id=$_POST['school_id'];
						$firstname=$_POST['firstname'];
						$middlename=$_POST['middlename'];
						$lastname=$_POST['lastname'];
						$type=$_POST['type'];
						$department=$_POST['department'];
						$contact=$_POST['contact'];

$history_record=mysql_query("select * from user where user_id=$id_session");
$row=mysql_fetch_array($history_record);
$user=$row['firstname']." ".$row['lastname'];
mysql_query("INSERT INTO history (date,action,data) VALUES (NOW(),'Edit Client Details','$user')")or die(mysql_error());

{
mysql_query(" UPDATE client SET school_id='$school_id', firstname='$firstname', middlename='$middlename', lastname='$lastname', type='$type', 
department='$department', contact='$contact' WHERE client_id = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Updated Client Info!'); window.location='client.php'</script>";
}

}

?>
					
                <!-- End content here -->
            </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
