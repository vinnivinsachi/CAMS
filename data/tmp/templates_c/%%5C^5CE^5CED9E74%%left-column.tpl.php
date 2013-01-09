<?php /* Smarty version 2.6.19, created on 2012-08-22 02:32:24
         compiled from blogmanager/lib/left-column.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'geturl', 'blogmanager/lib/left-column.tpl', 2, false),array('function', 'get_tag_summary', 'blogmanager/lib/left-column.tpl', 4, false),array('function', 'get_monthly_blogs_summary', 'blogmanager/lib/left-column.tpl', 51, false),array('modifier', 'count', 'blogmanager/lib/left-column.tpl', 6, false),array('modifier', 'escape', 'blogmanager/lib/left-column.tpl', 13, false),array('modifier', 'date_format', 'blogmanager/lib/left-column.tpl', 60, false),)), $this); ?>
<div id='leftContainer'>
<a href="<?php echo smarty_function_geturl(array('controller' => 'blogmanager','action' => 'edit'), $this);?>
">Create a new post</a><br />

<?php echo smarty_function_get_tag_summary(array('user_id' => $this->_tpl_vars['uploader_id'],'object' => 'post_cat','assign' => 'summary'), $this);?>


<?php if (count($this->_tpl_vars['summary']) > 0): ?>
	<div id="preview-tags" class="box">
		<h3>Categories</h3>
		<ul>
			<?php $_from = $this->_tpl_vars['summary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
			<li>
				<a href="<?php echo smarty_function_geturl(array('controller' => 'blogmanager'), $this);?>
?category=<?php echo $this->_tpl_vars['tag']['tag']; ?>
">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['tag']['tag'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				</a>
				
				(<?php echo $this->_tpl_vars['tag']['count']; ?>
 post<?php if ($this->_tpl_vars['tag']['count'] != 1): ?>s<?php endif; ?>)
			</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
<script type="text/javascript" src="/htdocs/js_plugin/BlogTagSummary.class.js"></script>
<script type="text/javascript">new BlogTagSummary('month-preview', 'preview-tags');</script>
	
<?php endif; ?>

<?php echo smarty_function_get_tag_summary(array('user_id' => $this->_tpl_vars['uploader_id'],'object' => 'post','assign' => 'summary'), $this);?>


<?php if (count($this->_tpl_vars['summary']) > 0): ?>
	<div id="preview-tags2" class="box">
		<h3>Tags</h3>
		<ul>
			<?php $_from = $this->_tpl_vars['summary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
			<li>
				<a href="<?php echo smarty_function_geturl(array('controller' => 'blogmanager'), $this);?>
?tag=<?php echo $this->_tpl_vars['tag']['tag']; ?>
">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['tag']['tag'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				</a>
				
				(<?php echo $this->_tpl_vars['tag']['count']; ?>
 post<?php if ($this->_tpl_vars['tag']['count'] != 1): ?>s<?php endif; ?>)
			</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
	
<script type="text/javascript" src="/htdocs/js_plugin/BlogTagSummary.class.js"></script>
<script type="text/javascript">new BlogTagSummary('month-preview', 'preview-tags2');</script>
	
<?php endif; ?>

 

<?php echo smarty_function_get_monthly_blogs_summary(array('user_id' => $this->_tpl_vars['uploader_id'],'object' => 'post','assign' => 'summary'), $this);?>


<?php if (count($this->_tpl_vars['summary']) > 0): ?>
	<div id="preview-months" class="box">
		<h3>Your Post Archives</h3>
		<ul>
			<?php $_from = $this->_tpl_vars['summary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['month'] => $this->_tpl_vars['numPosts']):
?>
				<li>
					<a href="<?php echo smarty_function_geturl(array('controller' => 'blogmanager'), $this);?>
?month=<?php echo $this->_tpl_vars['month']; ?>
">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['month'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B %Y') : smarty_modifier_date_format($_tmp, '%B %Y')); ?>

					</a>
					(<?php echo $this->_tpl_vars['numPosts']; ?>
 post<?php if ($this->_tpl_vars['numPosts'] != 1): ?>s<?php endif; ?>)
				</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
	
<script type="text/javascript" src="/htdocs/js_plugin/BlogMonthlySummary.class.js"></script>
<script type="text/javascript">new BlogMonthlySummary('month-preview', 'preview-months');</script>
	
	
<?php endif; ?>

</div>