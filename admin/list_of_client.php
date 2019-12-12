<?php include('header.php'); ?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">List of Client</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> List of Client</h2>

                <div class="box-icon">
                 <!---   <a href="#" class="btn btn-setting btn-round btn-default"><i
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
						<form  method="post" enctype="multipart/form-data" class="form-inline">
						<div class="form-group">
							<input type="text" class="form-control" id="exampleInputEmail2" placeholder="Search name.....">
						</div>
						<button type="submit" name="search" class="btn btn-default">Search</button>
						</form>
					</div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
					<tr>
						<th>Name</th>
						<th>Type</th>
						<th>Department</th>
						<th>Contact</th>
						<th>Date Added</th>
					</tr>
					</thead>
					<tbody>
							<?php
							$result= mysql_query("select * from client order by client_id DESC ") or die (mysql_error());
							while ($row= mysql_fetch_array ($result) ){
							$id=$row['client_id'];
							?>
					<tr>
						<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
						<td><?php echo $row['type']; ?></td>
						<td><?php echo $row['department']; ?></td>
						<td><span class="label-primary label label-default"><?php echo $row['contact']; ?></span></td>
						<td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
					<!--	<td class="center">
							<a class="btn btn-success" href="#">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
							</a>
							<a class="btn btn-info" href="edit_client.php<?php // echo '?client_id='.$id; ?>">
								<i class="glyphicon glyphicon-edit icon-white"></i>
							</a>
							<a class="btn btn-danger" href="#delete<?php // echo $id;?>" data-toggle="modal" data-target="#delete<?php // echo $id;?>">
								<i class="glyphicon glyphicon-trash icon-white"></i>
							</a>
							<?php // include('modal_delete_client.php'); ?>
						</td>-->
					</tr>
							<?php } ?>
					</tbody>
					</table>
				
                <!-- end content here -->
            </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
