<div class="container" >
	<div class="col-md-9" >
        <h3>All Scheduled Interviews</h3>
        <hr>
            <hr style="border-width:0px">
        	<table class="table table-hover" >
        		<thead>
        			<tr>
        				<th>Interview ID</th>
        				<th>Interview Name</th>
        				<th>Candidate Email</th>
        				<th>Link</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php 
        				foreach($data as $row) {
        					echo "<tr>";
        					echo "<td>".$row['id']."</td>";
        					echo "<td><a href='http://localhost/test/index.php/assigned/interview/".$row['id']."'>".$row['name']."</a></td>";
        					echo "<td>".$row['invite_to']."</td>";
        					echo "<td><a href='".$row['url']."'>".$row['name']."</a></td>";
        					echo "</tr>";
        				}

        			?>
        		</tbody>
        	</table>
    </div>
</div>