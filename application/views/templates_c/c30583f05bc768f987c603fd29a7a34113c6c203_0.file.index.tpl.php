<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 09:35:15
  from "/var/www/html/WORKS/BTCCLUB/application/views/login/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68523afb4058e8_66245615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c30583f05bc768f987c603fd29a7a34113c6c203' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/login/index.tpl',
      1 => 1749885843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/flash_message.tpl' => 1,
  ),
),false)) {
function content_68523afb4058e8_66245615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_100958480768523afb3f6ea3_35379904', "header");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_328489068523afb3f7cc7_36898386', "body");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_175460330568523afb404554_38591125', "footer");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "login/layout.tpl");
}
/* {block "header"} */
class Block_100958480768523afb3f6ea3_35379904 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_100958480768523afb3f6ea3_35379904',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "header"} */
/* {block "body"} */
class Block_328489068523afb3f7cc7_36898386 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_328489068523afb3f7cc7_36898386',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 
<div id="app" class="app app-full-height app-without-header">
    <div class="login">
        <div class="login-content">
            <?php $_smarty_tpl->_subTemplateRender("file:layout/flash_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php echo form_open('','class="form form-horizontal form-simple needs-validation" novalidate="" id="login-form"');?>

            <h1 class="text-center">Sign In</h1>
            <div class="text-inverse text-opacity-50 text-center mb-4">
                For your protection, please verify your identity.
            </div>
            <div class="mb-3">
                <label class="form-label">Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" placeholder="Enter Username" name="user_name" required  <?php if ($_smarty_tpl->tpl_vars['user_name']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"<?php }?> />
                <?php echo form_error('user_name');?>

            </div>
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    
                </div>
                <input type="password" id="dz-password" class="form-control" name="pass" required <?php if ($_smarty_tpl->tpl_vars['password']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" <?php }?> placeholder="Password">
                <?php echo form_error('pass');?>

            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
          
            <?php echo form_close();?>

        </div>

    </div>
    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
</div> 
<?php
}
}
/* {/block "body"} */
/* {block "footer"} */
class Block_175460330568523afb404554_38591125 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_175460330568523afb404554_38591125',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
    document.addEventListener('DOMContentLoaded', function() {
        const eyeSlashIcon = document.getElementById('eyeSlashIcon');
        const eyeIcon = document.getElementById('eyeIcon');
        const passwordField = document.getElementById('dz-password');

        eyeIcon.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'inline-block';
            } else {
                passwordField.type = 'password';
                eyeIcon.style.display = 'inline-block';
                eyeSlashIcon.style.display = 'none';
            }
        });

        eyeSlashIcon.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'inline-block';
            } else {
                passwordField.type = 'password';
                eyeIcon.style.display = 'inline-block';
                eyeSlashIcon.style.display = 'none';
            }
        });
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    var loginBtn = true;
    $(document).on("submit", "#login-form", function(event)
    {
        var form = $(this);
        event.preventDefault();

        if(loginBtn == true){
            $.ajax({
                url: '<?php echo base_url();?>
'+'login/authenticate-login',
                type: 'POST',
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function(){
                    loginBtn = false;
                    $(".btn-login-submit").html('<div class="spinner-border text-light" role="status"><span class="visually-hidden"></span></div>');
                    $(".error-login").html('');
                },
                complete: function (response, status)
                {
                    $(".btn-login-submit").html('<?php echo lang('button_login');?>
');
                },
                success: function (response, status)
                {
                    loginBtn = true;
                    if(response.status){
                      window.location = response.location;
                  }else{
                    $(".error-login").html(response.msg);
                } 
            },
            error: function (xhr, desc, err)
            {
                loginBtn = true;
                alert(desc);
            }
        });
        }
    });
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "footer"} */
}
