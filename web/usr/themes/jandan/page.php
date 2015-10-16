<?php include('header.php'); ?>
<div id="content">
	<div class="title"><?php $this->title() ?></div>
    <div class="post f">
		<?php $this->content(); ?>
        <div class="break"></div>
    </div>
    <?php include('comments.php'); ?>
</div>
<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>
