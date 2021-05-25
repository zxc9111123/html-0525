<?php
session_start();
$login="";
$password="";
if(isset($_POST["login"]))
{
    $login=$_POST["login"];
}
if(isset($_POST["password"]))
{
    $password=$_POST["password"];
}
if($login="root"&$password="root")
{
    header("Location:math+.php");
}
else
{
    header("Location:index.php");
}
$_SESSION["msg"]="帳號 $login 密碼 $password";
//echo "<h1>帳號 $login</h1>";
//echo "<h1>密碼 $password</h1>";
//進行轉址