<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments" class="post">
    <?php if($this->allow('comment')): ?>
        <!--PC和WAP自适应版-->
        <div id="SOHUCS" sid="<?php echo $this->cid;?>" ></div>
        <script type="text/javascript"> 
            (function(){ 
            var appid = 'cytoOLGFw'; 
            var conf = 'prod_9c5813de16eca4bb8367381d1e8e88b8'; 
            var width = window.innerWidth || document.documentElement.clientWidth; 
            if (width < 960) { 
            window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); 
        </script>
    <?php else: ?>
        <div class="post-meta">评论已关闭</div>
    <?php endif; ?>
</div>