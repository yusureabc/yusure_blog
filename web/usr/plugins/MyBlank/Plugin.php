<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 给文章外链加nofollow和target属性
 * 
 * @package 给文章外链加nofollow和target属性 
 */
class MyBlank_Plugin implements Typecho_Plugin_Interface {

    public static function activate() {
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('MyBlank_Plugin', 'dealContent');
    }

    public static function deactivate() {
        
    }

    public static function config(Typecho_Widget_Helper_Form $form) {
        
    }

    public static function personalConfig(Typecho_Widget_Helper_Form $form) {
        
    }

    public static function dealContent($content, $widget) {
        $preg = '/<a .*?href="(.*?)".*?>/is';
        preg_match_all($preg, $content, $match);
        $domain = @trim($_SERVER['HTTP_HOST']);
        foreach ($match[1] as $key => $val) {
            if (stripos($val, $domain) === FALSE) {
                $content = str_replace($match[0][$key], "<a href='$val' target='_blank' rel='nofollow'>", $content);
            }
        }
        return $content;
    }
}