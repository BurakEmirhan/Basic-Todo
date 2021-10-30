<?php
session_start();

require_once('./db.php');
/**
* Adding new task to the database
*/
if (isset($_POST['submit'])) {
	$task = $_POST['task'];
	if (empty($task)) {
		$_SESSION['error'] = "Burayı doldurmalısın.";
	}else {
		if (isset($_SESSION['error'])) {
			unset($_SESSION['error']);
		}
		mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
		$_SESSION['success'] = 'Görev Başarıyla Eklendi!';
	}
	header('Location: index.php');
}

/**
* Removing a existing task from database
*/
if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];
	mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
	header('Location: index.php');
}
 ?>

