<?php
/**
 * 清空文件缓存
 * 
 * @package FileCache
 * @author Shion
 * @version 1.0.0
 * @link http://www.shionco.com
 */
function delcache($cache)
{
    $fh = opendir($cache);
    while (($file = readdir($fh)) !== false) {
        if($file!=".."&&$file!=".") {
            if(is_dir($cache."/".$file)) {
                delcache($cache."/".$file);
            } else {
                unlink($cache."/".$file);
            }
        }
    }
    closedir($fh);
}

if ( isset( $_GET['password'] ) && $_GET['password'] == 'Vfzrw5wIznJe2QRX' )
{
    delcache(dirname(__FILE__).'/Cache');
    die( 'Successful' );
}
else
{
    die( 'Error' );
}