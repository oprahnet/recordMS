<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add Client</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add Client</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">School ID</label>
						<div class="col-sm-7">
						  <input type="number" name="school_id" class="form-control" id="inputEmail3" placeholder="School ID....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Firstname</label>
						<div class="col-sm-7">
						  <input type="text" name="firstname" class="form-control" id="inputEmail3" placeholder="Firstname....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Middlename</label>
						<div class="col-sm-7">
						  <input type="text" name="middlename" class="form-control" id="inputEmail3" placeholder="MI / Middlename....." />
						</div>
						<span style="color:red;">optional</span>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Lastname</label>
						<div class="col-sm-7">
						  <input type="text" name="lastname" class="form-control" id="inputPassword3" placeholder="Lastname....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Department</label>
						<div class="col-sm-7">
						  <input type="text" name="department" class="form-control" id="inputPassword3" placeholder="Department....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Contact</label>
						<div class="col-sm-7">
						  <input type="number" name="contact" class="form-control" id="inputPassword3" placeholder="Contact....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Type</label>
						<div class="col-sm-7">
						  <select name="type" class="form-control" required>
							<option value="Student">Student</option>
							<option value="Faculty">Faculty</option>
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
mysql_query("INSERT INTO history (date,action,data) VALUES (NOW(),'Add Client','$user')")or die(mysql_error());
						
						{
						mysql_query ("INSERT INTO client (school_id,firstname,middlename,lastname,type,department,contact,date)
						 VALUES ('$school_id','$firstname','$middlename','$lastname','$type','$department','$contact',NOW())")or die(mysql_error());
						}
						echo "<script>alert('Client successfully added!'); window.location='client.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>