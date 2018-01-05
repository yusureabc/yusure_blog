<?php
/**
 * 文件缓存插件
 * 
 * @package FileCache
 * @author Shion
 * @version 1.0.0
 * @link http://www.shionco.com
 */
class FileCache_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
        Typecho_Plugin::factory('index.php')->begin = array('FileCache_Plugin', 'getCache');
        Typecho_Plugin::factory('index.php')->end = array('FileCache_Plugin', 'setCache');
        Typecho_Plugin::factory('Widget_Feedback')->finishComment = array('FileCache_Plugin', 'finish');
        $cache_dir = './usr/plugins/FileCache/Cache/';
        if (!file_exists($cache_dir))
        {
            if (mkdir($cache_dir,0777) && chmod($cache_dir,0777))
            {
                return('建立缓存文件夹成功, 插件成功激活!');
            } else {
                throw new Typecho_Plugin_Exception('建立缓存文件夹失败, 请检查权限设置！');
            }
        } else {
            return('缓存文件夹已存在, 插件成功激活!');
        }
    }

    public static function deactivate(){}

    public static function config(Typecho_Widget_Helper_Form $form){}

    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    public static function getCache()
    {
        clearstatcache();
        $request = new Typecho_Request;
        if ($request->isPost())
        {
            $file_path = self::getPath(str_replace('/comment', '', $request->getPathinfo()));
            if (file_exists($file_path))
            {
                @chmod($file_path,0777);
                @unlink($file_path);
            }
        } else {
            $file_path = self::getPath($request->getPathinfo());
            if (file_exists($file_path))
            {
                if (self::isValid($file_path))
                {
                    $handle = @fopen($file_path, 'rb');
                    if (@flock($handle, LOCK_SH|LOCK_NB))
                    {
                        fpassthru($handle);
                        flock($handle, LOCK_UN);
                        fclose($handle);
                        exit;
                    }
                    fclose($handle);
                } else {
                    @chmod($file_path,0777);
                    @unlink($file_path);
                }
            }
        }
    }

    public static function setCache()
    {
        $request = new Typecho_Request;
        $file_path = self::getPath($request->getPathinfo());
        if (!file_exists($file_path))
        {
            $handle = @fopen($file_path, 'wb');
            if (@flock($handle, LOCK_EX|LOCK_NB))
            {
                fwrite($handle, ob_get_contents()."<!-- This Is A Cache File Created At ".date("Y-m-d H:i:s", time()+28800)." Power By http://www.shionco.com -->");
                flock($handle, LOCK_UN);
            }
            fclose($handle);
        }
    }

    public static function getPath($pathinfo)
    {
        $cache_dir = './usr/plugins/FileCache/Cache/';
        $file_name = md5($pathinfo).'.tmp';
        $cache_dir .= substr($file_name, 0, 1).'/';
        if (!file_exists($cache_dir))
        {
            @mkdir($cache_dir,0777);
            @chmod($cache_dir,0777);
        }
        return $cache_dir.$file_name;
    }

    public static function isValid($file_path)
    {
        $mtime = filemtime($file_path);
        if (time() - $mtime > 10800)
        {
            return false;
        } else {
            return true;
        }
    }

    public static function finish($data)
    {
        $cid = $data->stack[0]['cid'];
        $routingTable = Typecho_Widget::widget('Widget_Options')->routingTable;
        $db = Typecho_Db::get();
        $row = $db->fetchRow($db->select('slug')->from('table.contents')->where('cid = %s', $cid));
        $slug = $row['slug'];
        $pathinfo = str_replace('[slug]', $slug, $routingTable[0]['post']['url']);
        $file_path = self::getPath($pathinfo);
        if (file_exists($file_path))
        {
            @chmod($file_path,0777);
            @unlink($file_path);
        }
    }
}
