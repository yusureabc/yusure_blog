<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="footer noline">
&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
</footer>
</div><!-- end .container -->


<script type="text/javascript" src="<?php $this->options->themeUrl('js/m.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>