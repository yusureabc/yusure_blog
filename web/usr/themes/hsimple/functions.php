<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowTags' => _t('显示Tags'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments','ShowTags', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
    
    $ac = new Typecho_Widget_Helper_Form_Element_Textarea('ac', NULL, "欢迎来到Codeinto,博客测试中...", _t('站点公告'), _t('支持HTML代码。'));
    $form->addInput($ac);

    $author_introduction = new Typecho_Widget_Helper_Form_Element_Textarea('author_introduction', NULL, "<p>业余码农一枚，喜欢Coding，爱好广泛，享受忙碌也乐于清闲，更多介绍请点击[关于]页面。</p>", _t('author introduction'), _t('支持HTML代码。'));
    $form->addInput($author_introduction);

    $test = new Typecho_Widget_Helper_Form_Element_Textarea('test', NULL, "示例标签内容", _t('示例标签'), _t('支持HTML代码。'));
    $form->addInput($test);
}


//--获取主题目录--
global $themeDir;
$themeDir = dirname(__FILE__);
$themeDir = preg_replace("/\\\/i", "/",dirname(__FILE__));
preg_match_all('/\/usr.*/im', $themeDir, $m);
$themeDir = $m[0][0];




//---例如24小时内发布的贴，需要一个标志来完成。这里是用判断输入特殊字符，再用CSS判断完成的。此代码由羽飞儿老师编写，案例可参考：
//------------------------------------------------------------------

function isNewPost($a){
$now = new Typecho_Date(Typecho_Date::gmtTime());
if($now->timeStamp-$a->date->timeStamp < 24*60*60){
	echo '<span class="new"></span>';
}
}
/*以上代码，加入到 functions.php 中，然后，在 index.php 中使用：<?php isNewPost($this);?>


注：这样就会输出一个new的文字，可应用于class里，然后，自定义输出背景图片等。*/






//----文章摘要-----------------
function summary($txt){
//去除图片防止和缩略图重复显示。
$html = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/im',"", $txt->content);
preg_match_all('/<p>.*?<\/p>/im', $html, $m);

//print_r ($m[0]);

//如果有一个以上的p
if(count($m[0])>0){
//echo('-第一个P字符串长度-'.strlen($m[0][0]).'<hr>');
	
	//如果第一个p字数小于200
	if(strlen($m[0][0])<200){
	//则输出第一个p+第二个p  (如果没有第二个p php好像会自动忽略)
	echo($m[0][0].$m[0][1]);
	}
	else{
	//输出第一个p
	echo($m[0][0]);
	}

}
else{
//echo('没有找到p，输出摘要：<hr>');
$txt->excerpt(300, '...');
}
//echo('<hr>-数量'.count($m[0]));



}

//-------提取第一幅图片作为缩略图--------
function thumbnail($img){
preg_match_all('/(?<=img.src=").*?(?=")/im', $img->content, $m); 

 if (count($m[0])>0){

echo($m[0][0]);
	 
 }
 else{
	 global $themeDir;
	 echo($themeDir."/img/nothumb.png");
	 }



	
}
/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/
//分类导航 for bootstrap 格式
function category_for_bootstrap_nav($a){
	$a->widget("Widget_Metas_Category_List")->to($category);
while($category->next()) {
    $noChild = count($category->children) === 0;
    //如果是父分类
    if(!$noChild){
	    echo <<<EOF
	    <li class="dropdown"><a href="{$category->name}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">$category->name<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
EOF;
	   	//获取子分类
	    $arr = $a->widget('Widget_Metas_Category_List')->getAllChildren($category->mid);
	    foreach( $arr as $zi_fen_lei)
	    {
	    	$a_zi_fen_lei = $a->widget('Widget_Metas_Category_List')->getCategory($zi_fen_lei);
	    	echo '<li><a href="'.$a_zi_fen_lei["permalink"].'">'.$a_zi_fen_lei["name"].'</a></li>';
	    }
	    //结束父分类
	    echo '</ul></li>';
    }
    //单分类
    elseif($category->levels == 0){
	    echo '<li><a href="'.$category->permalink.'">'.$category->name.'</a></li>';
    }
}
}