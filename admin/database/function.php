<?php

function upload_image()
{
	if(isset($_FILES["photo"]))
	{
		$extension = explode('.', $_FILES['photo']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = '../img/' . $new_name;
		move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($etudiant_id)
{
	include('../database/connect.php');
	$statement = $db->prepare("SELECT photo FROM enseignant WHERE id = '$etudiant_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["photo"];
	}
}

function get_total_all_records()
{
	include('../database/connect.php');
	$statement = $db->prepare("SELECT * FROM enseignant");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


?>