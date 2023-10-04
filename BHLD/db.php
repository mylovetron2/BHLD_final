<?php
$conn = mysqli_connect('localhost','diavatly_ltd','cntt2019','diavatly_ltd') ;
mysqli_set_charset($conn,'utf8mb4');
if (!$conn)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>