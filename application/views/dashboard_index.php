<div class="container" >
	<div class="col-md-9" >
        <h3>Users profiles</h3>
        <hr>
            <hr style="border-width:0px">
        	<table class="table table-hover" >
        		<thead>
        			<tr>
        				<th>Applicant ID</th>
        				<th>Name</th>
        				<th>Email</th>
        				<th>Status</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php
        				// code for printing table in tabular format
        				foreach($records as $row)
        				{
                            echo "<tr>";
        					echo "<td>".$row->id."</td>";
        					echo "<td><a href='".base_url()."index.php/applicant/user/".$row->id."' >".$row->name."</a></td>";
        				
        					echo "<td>".$row->email."</td>";
        					echo "<td>".$row->status."</td>";
                            // echo "<td><a href='".base_url()."index.php/admin/edit/".$row->id."' class='btn btn-danger' > Edit </a></td>";
                            echo "</tr>";
        				}
        			?>
        		</tbody>
          	</table>
            <div class="col-md-5 col-md-offset-4" >
          	     <?php echo $links; //echo $this->table->generate($records);?>
            </div>
      </div>

    </div>
  </div>
</div>