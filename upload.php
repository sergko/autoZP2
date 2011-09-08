<?php
//$uploaddir = '/var/www/uploads/';
$uploaddir = "C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\autoZP\\";
if (move_uploaded_file(	$_FILES['userfile']['tmp_name'], $uploaddir . 
						$_FILES['userfile']['name'])) {
    print "File is valid, and was successfully uploaded.";
} else {
    print "There some errors!";
}
?>