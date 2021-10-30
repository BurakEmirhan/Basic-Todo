<?php
	if (isset($_POST['submit'])) {
		$task = $_POST['task'];
		if (empty($task)) {
			$_SESSION['error'] = "Burayı doldurmalısın.";
		}else {
			if (isset($_SESSION['error'])) {
				unset($_SESSION['error']);
			}
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

