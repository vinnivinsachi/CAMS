<?php /* Smarty version 2.6.19, created on 2012-08-21 10:31:29
         compiled from email/contact-us.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'email/contact-us.tpl', 8, false),)), $this); ?>
<html>
<body>

<table>

<tr>
<td>
<div class='headerText'>Message from online VEdance: <?php echo ((is_array($_tmp=$this->_tpl_vars['online_message']->ts_created)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %e, %Y %l:%M %p') : smarty_modifier_date_format($_tmp, '%b %e, %Y %l:%M %p')); ?>
</div>
<div class='message'>
<label>First name:</label><?php echo $this->_tpl_vars['online_message']->first_name; ?>
<br/>
<label>Last name:</label><?php echo $this->_tpl_vars['online_message']->last_name; ?>
<br/>
<label>Phone number:</label><?php echo $this->_tpl_vars['online_message']->phone_number; ?>
<br/>
<label>Email:</label><?php echo $this->_tpl_vars['online_message']->email; ?>
<br/>
<label>Message:</label><?php echo $this->_tpl_vars['online_message']->description; ?>
<br/>
</td>
</tr>

</table>