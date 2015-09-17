<div class="container" >
	<div class="col-md-9" >
        <h3>Applicants Assigned</h3>
        <hr>
            <hr style="border-width:0px">
        	<table class="table table-hover" >
        		<thead>
        			<tr>
        				<th>Applicant ID</th>
        				<th>Name</th>
        				<th>Email</th>
        				<th>Status</th>
                        <th>Interview</th>
                        <th>Reject</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php
        				foreach($result as $row)
        				{
                            echo "<tr>";
        					echo "<td>".$row['id']."</td>";
        					echo "<td><a href='".base_url()."index.php/applicant/user/".$row['id']."' >".$row['name']."</a></td>";
        				
        					echo "<td>".$row['email']."</td>";
        					echo "<td>".$row['status']."</td>";
                            echo "<td><button type='button' class='btn btn-primary schedule-button' data-toggle='modal' data-id='".$row['id']."' data-target='#schedule'>Schedule</button></td>";
                            echo "<td><a href='http://localhost/test/index.php/assigned/reject/".$row['id']."' ><button type='button' class='btn btn-danger'>Reject</button></a></td>";
                            echo "</tr>";
        				}
        			?>
        		</tbody>
          	</table>
        <div class="modal fade" id="schedule" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" action="http://localhost/test/index.php/assigned/schedule/" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Schedule Interview</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="applicant-id" name="id" >
                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-6">
                                    <input type="datetime-local" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">End Date time</label>
                                <div class="col-sm-6">
                                    <input type="datetime-local" class="form-control" name="end_date" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Pad Name</label>
                                <div class="col-sm-6">
                                    <input type="text" required class="form-control" name="name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Assign</label>
                                <div class="col-sm-6">
                                    <input type="email" required class="form-control" name="email" id="email" placeholder="Enter email" autofocus>
                                </div>
                            </div>                 
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-info" value="submit">Schedule</button>
                                </div>
                            </div>
                        </div>

                    </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
            <div class="col-md-5 col-md-offset-4" >
            </div>
      </div>

    </div>
  </div>
</div>

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });

    $(document).on("click", ".schedule-button", function () {
         var user_id = $(this).data('id');
         $(".modal-body #applicant-id").val( user_id );
    });

</script>