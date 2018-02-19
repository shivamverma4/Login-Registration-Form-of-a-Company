<?php 
	$con=mysqli_connect("localhost","root","","id897051_bscit");
	$result=mysqli_query($con,"select * from user");
	$r="";
	while( $row = mysqli_fetch_assoc( $result ) ){
		$r=$r."<tr><td>{$row["name"]}</td><td>{$row["email"]}</td><td>{$row["pswrd"]}</td></tr>";
	}
	echo $r;
?>