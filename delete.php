<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$id=$_GET['id'];

$table= new UsersTable(new MySQL);
$table->delete($id);

HTTP::redirect('/admin.php');