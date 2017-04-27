<?php /* Smarty version 3.1.27, created on 2015-09-06 10:37:40
         compiled from "E:\WWW\blog\templates\index.htm" */ ?>
<?php
/*%%SmartyHeaderCode:2985755eba6f44b2ff0_20516399%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcf5af7a7e60610581f828189995a54e07b2fbe7' => 
    array (
      0 => 'E:\\WWW\\blog\\templates\\index.htm',
      1 => 1441507054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2985755eba6f44b2ff0_20516399',
  'variables' => 
  array (
    'name' => 0,
    'cates' => 0,
    'cat' => 0,
    'article' => 0,
    'art' => 0,
    'pageinfo' => 0,
    'new_article' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55eba6f469a7f5_68655666',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55eba6f469a7f5_68655666')) {
function content_55eba6f469a7f5_68655666 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'E:\\WWW\\blog\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\WWW\\blog\\Smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '2985755eba6f44b2ff0_20516399';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
<link href="css/base.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="js/modernizr.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>
<body>
<div class="ibody">
  <header>
    <h1><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="/"></a></div>
    <nav id="topnav">
    <a href="./">首页</a>
<!--<?php
$_from = $_smarty_tpl->tpl_vars['cates']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$foreach_cat_Sav = $_smarty_tpl->tpl_vars['cat'];
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
</a>
    <?php
$_smarty_tpl->tpl_vars['cat'] = $foreach_cat_Sav;
}
?> -->
<!--<?php
$_from = $_smarty_tpl->tpl_vars['cates']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$foreach_cat_Sav = $_smarty_tpl->tpl_vars['cat'];
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
</a>
    <?php
$_smarty_tpl->tpl_vars['cat'] = $foreach_cat_Sav;
}
?> -->
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cat'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cates']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['name'] = 'cat';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total']);
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['cat_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['cat_name'];?>
</a>
    <?php endfor; endif; ?>
    </nav>
  </header>
  <article>
    <div class="banner">
      <ul class="texts">
        <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
        <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
      </ul>
    </div>
    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>


<?php
$_from = $_smarty_tpl->tpl_vars['article']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['art'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['art']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
$foreach_art_Sav = $_smarty_tpl->tpl_vars['art'];
?>
      <div class="blogs">
        <h3><a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['art']->value['art_id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['art']->value['art_title'],15,"…",true);?>
</a></h3>
        <figure><img src="./upload/<?php echo $_smarty_tpl->tpl_vars['art']->value['art_img'];?>
" ></figure>
        <ul>
          <p><?php echo $_smarty_tpl->tpl_vars['art']->value['description'];?>
</p>
          <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['art']->value['art_id'];?>
" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：<?php echo $_smarty_tpl->tpl_vars['art']->value['art_author'];?>
</span><span>分类：【<a href="/"><?php echo $_smarty_tpl->tpl_vars['art']->value['cat_name'];?>
</a>】</span><span>浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['art']->value['click_count'];?>
</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['art']->value['add_time'],"%Y:%m:%d");?>
</div>
      </div>
<?php
$_smarty_tpl->tpl_vars['art'] = $foreach_art_Sav;
}
?>
      
      <?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>

      
    </div>
  </article>
  <aside>
    <div class="avatar"><a href="about.html"><span>关于杨青</span></a></div>
    <div class="topspaceinfo">
      <h1>执子之手，与子偕老</h1>
      <p>于千万人之中，我遇见了我所遇见的人....</p>
    </div>
    <div class="about_c">
      <p>网名：无心山人	</p>
      <p>职业：JAVA程序员 </p>
      <p>籍贯：山东-济南</p>
      <p>电话：1325668****</p>
      <p>邮箱：357197332@qq.com</p>
    </div>
    <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
      <ul>
      <?php
$_from = $_smarty_tpl->tpl_vars['new_article']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['news']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_new'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_new']->value['iteration']++;
$foreach_news_Sav = $_smarty_tpl->tpl_vars['news'];
?>
      <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_new']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_new']->value['iteration'] : null)%2 == 0) {?>
        <li><a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['news']->value['art_id'];?>
" style="color: red;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['art_title'],18,"…",true);?>
</a></li>
      <?php } else { ?>
      <li><a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['news']->value['art_id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['art_title'],18,"…",true);?>
</a></li>
      <?php }?>
      <?php
$_smarty_tpl->tpl_vars['news'] = $foreach_news_Sav;
}
?>
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>
        <li><a href="/">犯错了怎么办？</a></li>
        <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
        <li><a href="/">春暖花开-走走停停-发现美</a></li>
        <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
        <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
        <li><a href="/">简单手工纸玫瑰</a></li>
        <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
        <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        <li><a href="/">徐昊个人博客</a></li>
        <li><a href="/">3DST技术社区</a></li>
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
  </aside>
  <?php echo '<script'; ?>
 src="js/silder.js"><?php echo '</script'; ?>
>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>
<?php }
}
?>