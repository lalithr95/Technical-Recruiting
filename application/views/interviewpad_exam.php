<div class="container">
	<div class="jumbotron">
	    <div class="row">
	        <div class="col-md-6 col-md-offset-3">
	        	<form class="form-horizontal" action="http://localhost/test/index.php/interviewpad/submit/<?php echo $hash; ?>" method="post">
		        	<h3><?php echo $name; ?></h3>
		        	<ol>
		        		<?php
		        			for ($i=0; $i< count($questions); $i++) {
		        				echo "<li>".$questions[$i]['name']."</li>";
	  							echo "<div class='form-group'>";
	                        	echo "<label for='answer' class='col-sm-2 control-label'>Solution</label>";
	                        	echo "<div class='col-sm-6'>";
	                        	echo "<textarea class='form-control' name='"."answer".$questions[$i]['id']."' required rows='3' placeholder='Enter solutions'></textarea>";
	                       		echo "</div>";
	                    		echo "</div>"; 	        				
		        			}
		        		?>
		        	</ol>
		        	<hr>
	          		<input type="hidden" name="email" value="<?php echo $candidate_email; ?>">                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info" value="submit">Finsh Interview</button>
                        </div>
                    </div>
                </form>

	        </div>
	    </div>
	</div>
</div>