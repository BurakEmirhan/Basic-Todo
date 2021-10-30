<?php
	$errors = "";

	if (isset($_POST['submit'])) {
		$task = $_POST['task'];
		if (empty($task)) {
			$errors = "Burayı doldurmalısın.";
		}else {
			mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
			header('location: index.php');
		}
	}

	// Görev Silme

	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];
		mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
		header('location: index.php');
	}
 ?>

