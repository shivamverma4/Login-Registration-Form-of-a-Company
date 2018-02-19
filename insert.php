<?php
$name = ''; $type = ''; $size = ''; $error = '';
	function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);


    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}

	if ($_POST) {

    		if ($_FILES["file"]["error"] > 0) {
        			$error = $_FILES["file"]["error"];
    		} 
    		else if (($_FILES["file"]["type"] == "image/gif") || 
			($_FILES["file"]["type"] == "image/jpeg") || 
			($_FILES["file"]["type"] == "image/png") || 
			($_FILES["file"]["type"] == "image/pjpeg")) {

        			$url = 'destination .jpg';

        			$filename = compress_image($_FILES["file"]["tmp_name"], $url, 60);
        			$buffer = file_get_contents($url);

        			/* Force download dialog... */
        			header("Content-Type: application/force-download");
        			header("Content-Type: application/octet-stream");
        			header("Content-Type: application/download");

			/* Don't allow caching... */
        			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        			/* Set data type, size and filename */
        			header("Content-Type: application/octet-stream");
        			header("Content-Transfer-Encoding: binary");
        			header("Content-Length: " . strlen($buffer));
        			header("Content-Disposition: attachment; filename=$url");

        			/* Send our file... */
        			echo $buffer;
    		}else {
        			$error = "Uploaded image should be jpg or gif or png";
    		}
	}

$name=$_GET["name"];
$email=$_GET["email"];
$phno=$_GET["phno"];
$pswrd=$_GET["pswrd"];

$con=mysqli_connect("localhost","root","","id897051_bscit");
mysqli_query($con,"insert into user (name,email,phno,pswrd) values('$name','$email','$phno','$pswrd')")
?>