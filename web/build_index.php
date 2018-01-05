<?php
/**
 * 首页静态化脚本
 * Author: Yusure
 * Blog: yusure.cn
 */
ini_set( 'date.timezone', 'PRC' );

/* 缓存过期时间 单位：秒 */
$expire = 86400;
/* 主动刷新密码  格式：http://test.com/build_index.php?password=123456 */
$password = 'uHYZteHP1ol9jP05';
$file_time = @filemtime( 'index.html' );
time() - $file_time > $expire && create_index();
isset( $_GET['password'] ) && $_GET['password'] == $password && create_index();

/**
 * 生成 index.html
 */
function create_index()
{
    ob_start();
    include( 'index.php' );
    $content = ob_get_contents();
    $content .= "\n<!-- Create time: " . date( 'Y-m-d H:i:s' ) . " -->";
    /* 异步调用更新 */
    $content .= "\n<script language=javascript src='build_index.php'></script>";
    ob_clean();
    $res = file_put_contents( 'index.html', $content );
    if ( $res !== false )
    {
        die( 'Create successful' );
    }
    else
    {
        die( 'Create error' );
    }
}