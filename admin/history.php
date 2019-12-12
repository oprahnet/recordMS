<?php include('header.php'); ?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">History Log</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-bookmark"></i> History Log</h2>

                <div class="box-icon">
                    <!---<a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>-->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <!-- start history here -->
				
					<div class="alert alert-info">
						<button style="margin-left:960px;" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-print"></i> Print</button>
					</div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
					<tr>
						<th>User Name</th>
						<th>Action</th>
						<th>Date / Time</th>
					</tr>
					</thead>
					<tbody>
							<?php
							$result= mysql_query("select * from history order by history_id DESC ") or die (mysql_error());
							while ($row= mysql_fetch_array ($result) ){
							$id=$row['history_id'];
							?>
					<tr>
						<td><?php echo $row['data']; ?></td>
						<td><span class="label-primary label label-default"><?php echo $row['action']; ?></span></td>
						<td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
					</tr>
							<?php } ?>
					</tbody>
					</table>
				
                <!-- end history here -->
            </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
