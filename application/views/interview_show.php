<div class="container" >
	<div class="col-md-9" >
        <h3><?php echo $data['name']; ?></h3>
        <hr>
            <hr style="border-width:0px">
    		<table class="table table-hover" >
        		<thead>
        			<tr>
        				<th>Email</th>
        				<th>Rate</th>
        				<th>View Answers</th>
        				<th>Add Question</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<?php
        					echo "<td>".$data['invite_to']."</td>";
        					if ($data['rate']) {
        						echo "<td>".$data['rate']."</td>";
        					}
        					else {
        						echo "<td><button type='button' id='rate' data-toggle='modal' data-target='#addRate' data-id='".$data['id']."' class='btn btn-info'>Rate</button></td>";
        					}
        					echo "<td><button type='button' id='view-answer' data-toggle='modal' data-target='#viewAnswer' data-id='".$data['id']."' class='btn btn-info'>View Answers</button></td>";
        					echo "<td><button type='button' id='add-question' data-toggle='modal' data-target='#addQuestion' data-id='".$data['id']."' class='btn btn-success add-Quest'>Add Question</button></td>";

        				?>
        			</tr>
        		</tbody>	
        	</table>
        <hr style="border-width:0px">
		<div id="addQuestion" class="modal fade" role="dialog">
    		<div class="modal-dialog">
      			<!-- Modal content-->
      			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Add Question</h4>
       				</div>
        			<div class="modal-body">
          				<form class="form-horizontal" action="http://localhost/test/index.php/question/add/" method="post">
          					<input type="hidden"  id="pad-id" name="id">
          					<div class="form-group">
          						<div class="col-sm-6">
								    <label for="selectQuestion">Question</label>
								    <select class="form-control" name="question" required id="selectQuestion">
								  	<?php
								  		foreach ($library as $lib) {
								  			echo "<option>".$lib['question']."</option>";
								  		}
								  	?>
								    </select>
								</div>
							</div>
							<input type="checkbox" id="checked" name="check">
          					<div class="form-group">
                                <label for="question" class="col-sm-2 control-label">Custom</label>
                                <div class="col-sm-6">
                                	<textarea class="form-control" name="question" id="custom" rows="5" placeholder="Enter Question text" disabled></textarea>
                                </div>
                            </div>                 
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-info" value="submit">Add</button>
                                </div>
                            </div>
                        </form>

        			</div>
			        <div class="modal-footer">
			          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
      			</div>
      
    		</div>
  		</div>
		<div id="addRate" class="modal fade" role="dialog">
    		<div class="modal-dialog">
      			<!-- Modal content-->
      			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Add Rating</h4>
       				</div>
        			<div class="modal-body">
          				<form class="form-horizontal" action="http://localhost/test/index.php/assigned/rate/<?php echo $data['id']; ?>" method="post">
          					<div class="form-group">
                                <label for="question" class="col-sm-2 control-label">Rate</label>
                                <div class="col-sm-6">
                                	<input type="number" class="form-control" name="rate" min="1"  max="10" placeholder="Enter Score 1-10">
                                </div>
                            </div>                 
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-info" value="submit">Add</button>
                                </div>
                            </div>
                        </form>

        			</div>
			        <div class="modal-footer">
			          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
      			</div>
      
    		</div>
  		</div>

		<div id="viewAnswer" class="modal fade" role="dialog">
    		<div class="modal-dialog">
      			<!-- Modal content-->
      			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Answers</h4>
       				</div>
        			<div class="modal-body">
        				<?php 
        					foreach($question as $q ) {
		        				echo "<h5>".$q['name']."</h5>";
								echo $q['answer'];
		        				echo "<br>";
        					}
        				?>
        			</div>
			        <div class="modal-footer">
			          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
      			</div>
      
    		</div>
  		</div>

  		<h4> Question </h4>
 	<form class="form-horizontal" action="http://localhost/test/index.php/question/rate/<?php echo $data['id']; ?>" method="post">

        <table class="table table-hover" >
        	<thead>
        		<tr>
        			<th>Question ID </th>
        			<th>Question</th>
        			<th>Rating </th>
        		</th>
        	</thead>
        	<tbody>
	        		<?php 
	        			foreach($question as $q) {
	        				echo "<tr>";
	        				echo "<td>".$q['id']."</td>";
	        				echo "<td>".$q['name']."</td>";
	        				if ($q['rate']) {
	        					echo "<td>".$q['rate']."</td>";
	        				}
	        				else {
	        					echo "<td><input type='number' class='form-control' required min='1' max='10' placeholder='Provide Feedback Rating (1-10)' name='".$q['id']."'></td>";
	        				}
	        				echo "</tr>";
	        			}

	        		?>
	        	
        	</tbody>
        </table>
        <?php
        if (!$data['rate']) {
	       	echo '<div class="form-group">';
	        echo '<div class="col-sm-6">';
	        echo '<button type="submit" class="btn btn-info" value="submit">Submit Rating</button>';
	        echo '</div>';
	        echo '</div>';
	    }
        ?>
    </form>


<script>
	$('#checked').click(function () {
		$("#selectQuestion").prop('disabled', true);
		$('#custom').prop('disabled', false);
	});

    $(document).on("click", ".add-Quest", function () {
        var id = $(this).data('id');
        $(".modal-body #pad-id").val( id );
    });
</script>

