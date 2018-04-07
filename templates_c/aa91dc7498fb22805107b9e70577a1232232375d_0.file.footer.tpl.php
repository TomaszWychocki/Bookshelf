<?php
/* Smarty version 3.1.30, created on 2017-04-23 22:26:46
  from "D:\xampp\htdocs\templates\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fd0e06d31107_72873096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa91dc7498fb22805107b9e70577a1232232375d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\footer.tpl',
      1 => 1492979205,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/tmp.tpl' => 3,
  ),
),false)) {
function content_58fd0e06d31107_72873096 (Smarty_Internal_Template $_smarty_tpl) {
?>
            </div>
        <div id="footer">
            <div id="child">
                Copyright &copy; 2017 by BookShelf
            </div>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/tmp.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('what'=>"login_form"), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:templates/tmp.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('what'=>"register_form"), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:templates/tmp.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('what'=>"remind_form"), 0, true);
?>


</body>
</html><?php }
}
