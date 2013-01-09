<?php /* Smarty version 2.6.19, created on 2012-08-22 02:32:08
         compiled from account/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'geturl', 'account/login.tpl', 6, false),array('modifier', 'escape', 'account/login.tpl', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/header.tpl", 'smarty_include_vars' => array('lightbox' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="bottomBody" style="background-color:#f3f3f3;">
<div id="leftContainer">
    <div class='box'>
    <div class='titleBarBig'><strong>Log into your account</strong></div>
    <form method="post" action="<?php echo smarty_function_geturl(array('action' => 'login','controller' => 'account'), $this);?>
" id="login-form" style='width:100%; float:left'>
    
        <input type="hidden" name="redirect" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['redirect'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
        
                <div>
                     <label for="form_username">Username:</label>
                     <input type="text" id="form_username" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
                    
                     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'partials/error.tpl', 'smarty_include_vars' => array('error' => $this->_tpl_vars['errors']['username'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                   
                </div>
                <div>
                    <label for="form_password">Password:</label>
                    <input type="password" id="form_password" name="password" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" AUTOCOMPLETE="off"/>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'partials/error.tpl', 'smarty_include_vars' => array('error' => $this->_tpl_vars['errors']['password'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
                </div>
        
        <a href="/account/fetchpassword">Forgot your password?</a>
        
        
        
            <button class="submit" value="Login" name="login">Login</button>		
    
    </form>
    </div>



</div>


<?php echo '
    
    <script type="text/javascript">
		new loginFormEnhancer(\'registration-form\');
	</script>

'; ?>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>