<?php
function db_connect() {
	$con = mysqli_connect('localhost', 'root','', 'kadiya') or die("could not connect");
	return $con;
}
