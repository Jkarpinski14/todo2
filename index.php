<html>
<head>
	<title>To-Do List 2.0</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body style="background-image: url(http://thesoundclique.com/wp-content/uploads/2015/01/Ultra_Music_Festival_2013-39.jpg)">
	<h1>
	<p class="header"> Get Shit Done </p>
	</h1>
	<div class="wrap">
		<div class="task-list">
			<ul>
				<?php require("includes/connect.php");
				$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
				$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC"; //'*' means all
				if($result = $mysqli->query($query)){
					$numrows = $result->num_rows;
					if ($numrows>0) {
						while($row = $result->fetch_assoc()){
							$task_id = $row['id'];
							$task_name = $row['task'];

							echo '<li>
							<span>'.$task_name. '</span>
							<img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg"/>
							</li>';		
						}
					}
				}
				?>
			</ul>
		</div>
		<br>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Put item here..."/>
	</form>
	</div>

	<button class="btn btn-primary" id="button" data-toggle="modal" data-target=".bs-example-modal-lg">Register/Login</button>
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
     		 	<a href="/todo2/view/register-form.php">Register</a>
				<br>
				<br>
				<a href="/todo2/view/login-form.php">Login</a>
				<br>
    		</div>
  		</div>
	</div>	
</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
	add_task(); //calling the add task function

	function add_task(){
		$('.add-new-task').submit(function() {
			var new_task = $('.add-new-task input[name=new-task]').val();

			if(new_task != ''){
				$.post('includes/add-task.php', {task: new_task}, function(data){
					$('add-new-task input[name=new-task]').val();
					$(data).appendTo('.task-list ul').hide().fadeIn();
				});
			}
			return false;
		});
	}

	$('.delete-button').click(function(){
		var current_element = $(this);
		var task_id = $(this).attr('id');

		$.post('includes/delete-task.php', {id: task_id}, function(){
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	});
	});
</script>
</html>