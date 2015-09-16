<div class="container">
	<div class="jumbotron">
	    <div class="row">
	        <div class="col-md-6 col-md-offset-3">
	        	<h4> Interview : <?php echo $name; ?></h4>
	            <form class="form-horizontal" action="http://localhost/test/index.php/interviewpad/check/<?php echo $hash; ?>" method="post">
	                <div class="form-group">
                    	<label for="Username" class="col-sm-2 control-label">Email</label>
                    	<div class="col-sm-6">
                        	<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" autofocus>
                    	</div>
                	</div>
	               	<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-info" value="submit">Take Test</button>
                        </div>
                	</div>
	            </form>
	        </div>
	    </div>
	</div>
</div>