<?php 
$conn = mysqli_connect("localhost","root","","grt_crm");
$sender = $_REQUEST['sender'];
$content = $_REQUEST['content'];
$inNumber = $_REQUEST['inNumber'];

$myFile = "file.txt";
$fh = fopen($myFile, 'W') or die ("Can't open file");
fwrite($fh, "number:" . $sender . "message:" . $content);
fclose($fh);
		 $query = "insert into temp ('number','message') values ('$number','$message')";
		 mysqli_query($db, $query);
?>