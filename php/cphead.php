<?php
	include '../php/dbh.php';
	$email = $_POST['email'];
	$msg = $_POST['message'];
	$pHead = $_POST['projHead'];

	$sql = "SELECT * FROM tptable, users WHERE tptable.pHead = users.uID AND tpID LIKE ".$_POST['projID'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $tpTitle = $row['tpTitle'];

    $sql = "SELECT * FROM users WHERE uID LIKE '".$pHead."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $pMail = $row['uName'];

    $result = mail($pMail, "[TE3DBungalow] Notification", "[".$email." on ".$tpTitle."]: ".$msg, "From: te3dAdmin@gmail.com");
	header("Location: ../html/project.php?pid=".$_POST['projID']);
?>