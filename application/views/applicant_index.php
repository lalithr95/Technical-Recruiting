<div class="container" >
	<div class="col-md-9" >
		<h3> <?php echo $user['name']; ?> </h3>
		<table class="table">
			<thead>
				<tr>
					<th>Email</th>
					<th>Resume</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $user['email']; ?></td>
					<td><a href=""><?php echo $user['name']; ?></a></td>
					<td><?php 

						if($user['status']) {
							echo $user['status'];
						}
						else {
							echo "Nil";
						} ?></td>
				</tr>
			</tbody>
		</table>
		<h3> Assign Application to :</h3>
		<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/applicant/assign/<?php echo $user['id']; ?>" method="post">
			    <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Enter Email" autofocus>
                    </div>
                </div>
                
                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-info" value="submit">Assign</button>
                        </div>
                </div>
		</form>

		<table class="table">
			<thead>
				<tr>
					<th>Inteviewer ID</th>
					<th>Status</th>
					<th>Feedback 1-10</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach($data as $row) {
					echo "<tr>";
					echo "<td>".$row['interviewer_id']."</td>";
					//echo "<td>".$row['question']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td>".$rate."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</div>