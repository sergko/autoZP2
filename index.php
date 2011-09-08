<?php
//require ("files.inc");
//require ("upload.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Шаблон сайта</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
<hr>
<form enctype="multipart/form-data" action="./upload.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="30000">
Send this file: <input name="userfile" type="file">
<input type="submit" value="Send File">
</form>
<form action="./convzp.php" method="post">
<!--<input type="hidden" name="convzp" value="1">
-->
<input type="submit"  value="ConvZP!" />
</form>

</body>