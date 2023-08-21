<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$auth=Auth::check();

$name=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
$type=$_FILES['photo']['type'];

if($type=="image/jpeg" or $type=="image/png")
{
    $table=new UsersTable(new MySQL);
    $table->updatePhoto($auth->id,$name);

    $auth->photo=$name;

    move_uploaded_file($tmp,"photos/$name");
}

HTTP::redirect("/profile.php");