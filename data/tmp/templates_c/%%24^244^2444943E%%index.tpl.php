<?php /* Smarty version 2.6.19, created on 2013-01-09 14:31:26
         compiled from blogmanager/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'geturl', 'blogmanager/index.tpl', 28, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/header.tpl", 'smarty_include_vars' => array('lightbox' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blogmanager/lib/left-column.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
<div id="rightContainer">
<?php if ($this->_tpl_vars['isXmlHttpRequest']): ?>
		<?php if ($this->_tpl_vars['tagPosts']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blogmanager/lib/tag-preview.tpl", 'smarty_include_vars' => array('posts' => $this->_tpl_vars['tagPosts'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php elseif ($this->_tpl_vars['month']): ?>
		
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blogmanager/lib/month-preview.tpl", 'smarty_include_vars' => array('month' => $this->_tpl_vars['month'],'posts' => $this->_tpl_vars['recentPosts'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
<?php else: ?>

	
	<div id="content">
	<?php if ($this->_tpl_vars['totalPosts'] == 1): ?>
		<p>
			There is currently <strong class="style1">1</strong> post in your blog.
		</p>
	<?php else: ?>
		<p>
			There are currenlty <strong class="style1"><?php echo $this->_tpl_vars['totalPosts']; ?>
</strong> posts. 
		</p>
	<?php endif; ?>
	
	
	<form method="get" action="<?php echo smarty_function_geturl(array('action' => 'edit'), $this);?>
">
		<input type="submit" value="Create new entry"/>
	</form>
	
	<div id="month-preview">
		<?php if ($this->_tpl_vars['tagPosts']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blogmanager/lib/tag-preview.tpl", 'smarty_include_vars' => array('posts' => $this->_tpl_vars['tagPosts'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php elseif ($this->_tpl_vars['month']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blogmanager/lib/month-preview.tpl", 'smarty_include_vars' => array('month' => $this->_tpl_vars['monthPost'],'posts' => $this->_tpl_vars['recentPosts'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<span class="contentTip">Please select from your categories and archives to view exisitng posts</span>
		<?php endif; ?>
	</div>
	
	
	</div>
	
	
	
<?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>