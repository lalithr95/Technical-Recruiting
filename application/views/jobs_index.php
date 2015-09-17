<div class="container" >
	<div class="jumbotron">
    	<div class="row" >
    		<h4>Apply for the Position</h4>
    			<?php
	    			if(isset($data)) {
	    				echo '<div class="alert alert-info" role="alert">';
	    				echo $data;
	    				echo '</div>';
	    		}
	    		?>
    		<form class="horizontal-form" action="http://localhost/test/index.php/jobs/submit" enctype="multipart/form-data" method="post">
    		<table class="table">
    			<tbody>
    				<tr>
    					<td>
        <!-- <div class="col-md-6"> -->
							<div class="form-group">
					            <label for="name" class="col-sm-4 control-label">Name</label>
					                <div class="col-sm-7">
					                    <input type="text" required class="form-control" name="name" id="name"   placeholder="Enter Name" autofocus>
					                </div>
	        				</div>
	        			</td>
	        		</tr>
	        		<tr>
	        			<td>
					        <div class="form-group">
					            <label for="email" class="col-sm-4 control-label">Email</label>
					                <div class="col-sm-7">
					                    <input type="email" required class="form-control" name="email" id="email"   placeholder="Enter email" autofocus>
					                </div>
					        </div>
					    </td>
					</tr>
					<tr>
					    <td>
					        <div class="form-group">
					        	<label for="file" class="col-sm-4 ontrol-label">File</label>
					        		<div class="col-sm-7">
										<span class="btn btn-file"><input type="file" name="resume" /></span>
									</div>
								</label>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="form-group">
	            <div class="col-sm-offset-4 col-sm-10">
	                <button type="submit" class="btn btn-success" value="submit">Submit</button>
	            </div>
	        </div>


			</form>
	</div>
</div>

</div>