<?php
session_start();
require_once('./db.php');
$tasks = mysqli_query($db, "SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Yapılacaklar Listesi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="heading">
		<h2>ToDo</h2>
	</div>

	<form method="POST" action="actions.php">
		<?php if (isset($_SESSION['error'])) { ?>
			<p class="danger"><?php echo $_SESSION['error']; ?></p>
		<?php } ?>
		
		<?php if (isset($_SESSION['success'])) { ?>
			<p class="success"><?php echo $_SESSION['success']; ?></p>
		<?php } ?>

		<input type="text" name="task" class="task_input">
		<button type="submit" class="task_btn" name="submit">Görev Ekle</button>
	</form>

	<table>
		<thead>
			<tr>
				<th>N</th>
				<th>Görev</th>
				<th>Eylem</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr>
				<td><?php echo $i; ?></td>
				<td class="task"><?php echo $row['task']; ?></td>
				<td class="delete">
					<a href="actions.php?del_task=<?php echo $row['id']; ?>">x</a>
				</td>
			</tr>

			 <?php $i++; } ?>
			
		</tbody>
	</table>



</body>
</html>
