<div class="container">
	<div class="jumbotron">
	    <div class="row">
	        <div class="col-md-6 col-md-offset-3">
	        	<h3><?php echo $name; ?></h3>
	        	<ol>
	        		<?php
	        			foreach($questions as $q) {
	        				echo "<li>".$q['name']."</li>";
	        			}
	        		?>
	        	</ol>
	        	<hr>
	        	<form class="form-horizontal" action="http://localhost/test/index.php/interviewpad/submit/<?php echo $hash; ?>" method="post">
          			<input type="hidden" name="email" value="<?php echo $candidate_email; ?>">
  					<div class="form-group">
                        <label for="question" class="col-sm-2 control-label">Question</label>
                        <div class="col-sm-6">
                        	<textarea class="form-control" name="answer" rows="5" placeholder="Enter solutions"></textarea>
                        </div>
                    </div>                 
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info" value="submit">Add</button>
                        </div>
                    </div>
                </form>

	        </div>
	    </div>
	</div>
</div>