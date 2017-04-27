<?php
define("DB_HOST", "localhost");
define("DB_USER","root");
define("DB_PWD","admin123");
define("DB_DBNAME","blog");
define("DB_CHARSET","UTF8");

//后台登陆名：admin 登陆密码：admin123

/*smarty模板配置*/
require ROOT.'/Smarty/Smarty.class.php';        #加载Smarty
$smarty = new Smarty;                           #实例化Smarty
$smarty->setTemplateDir(ROOT."/templates/");    #设置新的模板目录
$smarty->setCompileDir(ROOT."/templates_c/");   #设置新的编译目录
$smarty->setConfigDir(ROOT."/configs/");        #设置新的配置目录
$smarty->setCacheDir(ROOT."/cache/");           #设置新的缓存目录

$smarty->cache_lifetime = 0; //缓存时间 
$smarty->caching = false; //缓存方式

$smarty->left_delimiter = "{"; //左定界符
$smarty->right_delimiter = "}"; //右定界符

//实例化memcache
$mem = new Memcache();
$mem->connect('127.0.0.1',11211);