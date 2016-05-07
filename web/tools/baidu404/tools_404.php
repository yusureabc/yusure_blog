<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <title> URL提取工具 </title>
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.6.2/css/amazeui.min.css">
</head>
<body>

<form class="am-form" method="post" >
  <fieldset>
    <legend> URL提取工具　Author: Yusure 2015.5.2 </legend>
    <div class="am-form-group">
      <label for="doc-ta-1"> 请粘贴凌乱的链接 </label>
      <textarea name="url_contents" rows="15" id="doc-ta-1"><?php echo isset($_POST['url_contents']) ? $_POST['url_contents'] : ''; ?></textarea>
    </div>
    <p><button type="submit" class="am-btn am-btn-default"> 解析 </button></p>
  </fieldset>
</form>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="./jquery.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="http://cdn.amazeui.org/amazeui/2.6.2/js/amazeui.min.js"></script>
</body>
</html>

<?php
define( 'IS_POST', $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false );
if ( IS_POST )
{
    $url_contents = $_POST['url_contents'];
    $url_contents = DeleteHtml( $url_contents );
    $url_reg = '/http:\/\/[0-9a-z\.\/\-]+\/[0-9a-z\.\/\-]+\.([0-9a-z\.\/\-]+)/';
    if ( preg_match_all( $url_reg, $url_contents, $args ) )
    {
       $url_args = $args[0];
    }
    $url_args = trim_str( $url_args, '-' );
    $txt_name = date( 'Ymd-H-i-s', time() );
    write_txt( $txt_name . '.txt', $url_args );   
    download_file( $txt_name );
}



/* function  Start */

/**
 * 去除空白内容
 * @author Yusure  http://yusure.cn
 * @date   2016-05-02
 * @param  [param]
 * @param  [type]     $str [description]
 */
function DeleteHtml($str) 
{ 
    $str = trim($str); //清除字符串两边的空格
    $str = strip_tags($str,""); //利用php自带的函数清除html格式
    $str = preg_replace("/\t/","",$str); //使用正则表达式替换内容，如：空格，换行，并将替换为空。
    $str = preg_replace("/\r\n/","",$str); 
    $str = preg_replace("/\r/","",$str); 
    $str = preg_replace("/\n/","",$str); 
    $str = preg_replace("/ /","",$str);
    $str = preg_replace("/  /","",$str);  //匹配html中的空格
    return trim($str); //返回字符串
}

/**
 * 去除特殊字符
 * @author Yusure  http://yusure.cn
 * @date   2016-05-02
 * @param  [param]
 * @param  [type]     $data [description]
 * @param  string     $arg  [description]
 * @return [type]           [description]
 */
function trim_str( $data, $arg = ' ' )
{
    foreach ( (array)$data as $k => $v )
    {
        $data[ $k ] = trim( $v, $arg );
    }
    return $data;
}

/**
 * 写文件
 * @author Yusure  http://yusure.cn
 * @date   2016-05-02
 * @param  [param]
 * @param  [type]     $data [description]
 * @return [type]           [description]
 */
function write_txt( $name='', $data='' )
{
    if ( is_array( $data ) )
    {
        foreach ( $data as $k => $v )
        {
            write_txt( $name, $v );
        }
    }
    else
    {
        file_put_contents( $name, print_r( $data, true ).PHP_EOL, FILE_APPEND );
    }
}

function download_file( $file )
{
    $url = 'download.php?file=' . $file;
    echo ("<script>window.open('".$url."');</script>"); 
}