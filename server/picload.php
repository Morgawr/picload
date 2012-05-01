<?php

if($_FILES["image"]["name"] == "")
{
	die("Do not call this page from inside a browser and make sure you are actually trying to upload an image.\n");
}

if (!exif_imagetype($_FILES["image"]["tmp_name"]) || (filesize($_FILES["image"]["tmp_name"])/1024 > 10000))
{
	die("File must be an image and less than 10MB\n");
}

if ($_FILES["image"]["error"] > 0)
{
	echo "An error has occurred: " . $_FILES["image"]["error"] . "\n";
}
else
{
	$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
	$newname = time() . "." . $ext;
	move_uploaded_file($_FILES["image"]["tmp_name"],"../p/" . $newname);
	echo "http://" . $_SERVER['HTTP_HOST'] . "/p/" . $newname . "\n";
}
  
?>
