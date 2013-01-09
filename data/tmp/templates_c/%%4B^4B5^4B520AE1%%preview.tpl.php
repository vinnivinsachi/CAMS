<?php /* Smarty version 2.6.19, created on 2013-01-09 14:31:35
         compiled from blogmanager/preview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'geturl', 'blogmanager/preview.tpl', 11, false),array('modifier', 'escape', 'blogmanager/preview.tpl', 56, false),array('modifier', 'date_format', 'blogmanager/preview.tpl', 127, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/header.tpl", 'smarty_include_vars' => array('lightbox' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!--<script type="text/javascript" src="/htdocs/js_plugin/blogPreview.js"></script>
<script type="text/javascript" src="/htdocs/js_plugin/BlogImageManager.class.js"></script>
-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blogmanager/lib/left-column.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id='rightContainer'>
	<div class="box">

    <form method="post" action="<?php echo smarty_function_geturl(array('controller' => 'blogmanager','action' => 'setstatus'), $this);?>
" id="status-form">
    
    <div class="preview-status">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['post']->getId(); ?>
"/>
        
        <?php if ($this->_tpl_vars['post']->isLive()): ?>
            <div class="status live">
                This post IS published. To unpublish it click the <strong>Unpublish Post</strong> button below.
                <div>
                    <input type="submit" value="Unpublish post" name="unpublish" id="status-unpublish">
                    <input type="submit" value="Edit post" name="edit" id="status-edit">
                    <input type="submit" value="Delete post" name="delete" id="status-delete">
                </div>
            </div>
        <?php else: ?>
            <div class="status draft">
                This post is NOT published. To publish it on your blog, click the button below.
                <div>
                    <input type="submit" value="Publish post" name="publish" id="status-publish">
                    <input type="submit" value="Edit post" name="edit" id="status-edit">
                    <input type="submit" value="Delete post" name="delete" id="status-delete">
                </div>
            </div>
        <?php endif; ?>
        
    </div>
    
    </form>
    
    <form method="get" action="<?php echo smarty_function_geturl(array('action' => 'edit'), $this);?>
">
    	
            <input type="submit" value="Create new blog posts"/>
    </form>


    <fieldset id="preview-categories">
        <legend>Categories</legend>
        
        <ul>
        
            <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                <li>
        
                    <form method="post" action="<?php echo smarty_function_geturl(array('action' => 'categories'), $this);?>
">
                    <div>
                        <span style="color: black;"><?php echo ((is_array($_tmp=$this->_tpl_vars['cat'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['post']->getId(); ?>
" />
                        <input type="hidden" name="category" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                        <input type="submit" name="delete" value="delete" />
                    </div>
                    </form>
                </li>
            <?php endforeach; else: ?> 
                No categories for this post
            <?php endif; unset($_from); ?>
        </ul>
        
        <br/>
        
        <form method="post" action="<?php echo smarty_function_geturl(array('action' => 'categories'), $this);?>
">
            <div>
                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['post']->getId(); ?>
" />
                	<input name="category" />
                       
                <input type="submit" name="add" value="Add To Category" />
            </div>
        </form>
        
    </fieldset>

    <fieldset id="preview-tags">
        <legend>Tags</legend>
        
        <ul>
        
            <?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
                <li>
        
                    <form method="post" action="<?php echo smarty_function_geturl(array('action' => 'tags'), $this);?>
">
                    <div>
                        <span style="color: black;"><?php echo ((is_array($_tmp=$this->_tpl_vars['tag'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['post']->getId(); ?>
" />
                        <input type="hidden" name="tag" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tag'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                        <input type="submit" name="delete" value="delete" />
                    </div>
                    </form>
                </li>
            <?php endforeach; else: ?> 
                No tags for this post
            <?php endif; unset($_from); ?>
        </ul>
        
        <br/>
        
        <form method="post" action="<?php echo smarty_function_geturl(array('action' => 'tags'), $this);?>
">
            <div>
                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['post']->getId(); ?>
" />
                	<input name="tag" />
                      
                        <input type="submit" name="add" value="Add To Tag" />
            </div>
        </form>
        
    </fieldset>
    
    </div>
    
    
    <div class="box">

        <div class="box">
        
        Title: <?php echo $this->_tpl_vars['post']->profile->title; ?>

        </div>
    
        <div class="box">
            Created: <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->ts_created)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%x %X') : smarty_modifier_date_format($_tmp, '%x %X')); ?>

        </div>
        
        <div class="box">
            Link to: <?php echo $this->_tpl_vars['post']->profile->title_link; ?>

        </div>
        
        <div class="box">
            <?php echo $this->_tpl_vars['post']->profile->content; ?>

        </div>

   </div>
			
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>