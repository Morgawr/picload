<?php

if($_FILES["image"]["name"] == "")
{
	die("Do not call this page from inside a browser and make sure you are actually trying to upload an image.\n");
}

if (!(($_FILES["image"]["type"] == "image/gif")
  || ($_FILES["image"]["type"] == "image/jpeg")
  || ($_FILES["image"]["type"] == "image/png" )
  && ($_FILES["image"]["size"] < 10000)))
{
	die("Files must be either JPEG, GIF, or PNG and less than 10MB\n");
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
