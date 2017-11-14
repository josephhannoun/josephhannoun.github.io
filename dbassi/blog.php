<?php

require ("connect.php");
session_start();

if (isset($_POST['title'])) {
    $titl = $mysqli->real_escape_string($_POST['title']);
}else{
	die("IM here dont try to mess around bro ;)");
}
if (isset($_POST['excerpt'])) {
    $exc = $mysqli->real_escape_string($_POST['excerpt']);
}else{
	die("IM here dont try to mess around bro ;)");
}

if (isset($_POST['description'])) {
    $descr = $mysqli->real_escape_string($_POST['description']);
}else{
	die("IM here dont try to mess around bro ;)");
}

if (isset($_POST['picture'])) {
    $pic = $mysqli->real_escape_string($_POST['picture']);
}else{
	die("IM here dont try to mess around bro ;)");
}

if (isset($_POST['url'])) {
    $ur = $mysqli->real_escape_string($_POST['url']);
}else{
	die("IM here dont try to mess around bro ;)");
}



$stmt = $mysqli->prepare("Select id From blog WHERE title = ? AND excerpt = ? AND description = ? AND picture = ? AND url = ?");
$stmt->bind_param("sssss", $titl , $exc , $descr , $pic , $ur);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id);
$count = $stmt->num_rows;

if($count != 0){
	$_SESSION["credentials1"] = false;
  echo("Im here1");
}else{

	$stmt = $mysqli->prepare("Insert INTO blog(title, excerpt,description, picture, url) VALUES(?,?,?,?,?) ");
  $stmt->bind_param("sssss", $titl , $exc , $descr , $pic , $ur);
	$stmt->execute();
	$_SESSION["credentials1"] = true;
	echo("Im here2");
}

//echo $name;
//while($user->fetch()){

//}


?>
