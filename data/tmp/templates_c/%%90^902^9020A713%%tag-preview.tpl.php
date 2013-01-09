<?php /* Smarty version 2.6.19, created on 2013-01-09 14:31:31
         compiled from blogmanager/lib/tag-preview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'blogmanager/lib/tag-preview.tpl', 5, false),array('modifier', 'date_format', 'blogmanager/lib/tag-preview.tpl', 13, false),array('modifier', 'escape', 'blogmanager/lib/tag-preview.tpl', 15, false),array('function', 'geturl', 'blogmanager/lib/tag-preview.tpl', 14, false),)), $this); ?>

<h2>Category: <?php echo $this->_tpl_vars['tag']; ?>
</h2>


<?php if (count($this->_tpl_vars['tagPosts']) == 0): ?>
	<p>
		No posts found currently.
	</p>
<?php else: ?>
	<dl>
		<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>
		<dt>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->ts_created)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%a, %e %b') : smarty_modifier_date_format($_tmp, '%a, %e %b')); ?>
:
			<a href="<?php echo smarty_function_geturl(array('action' => 'preview'), $this);?>
?id=<?php echo $this->_tpl_vars['post']->getId(); ?>
">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->profile->title)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			</a>
			<?php if (! $this->_tpl_vars['post']->isLive()): ?>
				.....<span class="status draft">not published</span>
			<?php endif; ?>
			
		</dt>
		
		<dd>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->getTeaser(100))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		</dd>
		<?php endforeach; endif; unset($_from); ?>
	</dl>
<?php endif; ?>