<?php
session_start();
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."./lib".PATH_SEPARATOR.ROOT."./configs");
require_once 'image.func.php';
require_once 'string.func.php';
require_once 'mysql.func.php';
require_once 'config.php';
require_once 'common.func.php';
require_once 'admin.func.php';
require_once 'page.func.php';
require_once 'upload.func.php';
require_once 'index.func.php';
connent();