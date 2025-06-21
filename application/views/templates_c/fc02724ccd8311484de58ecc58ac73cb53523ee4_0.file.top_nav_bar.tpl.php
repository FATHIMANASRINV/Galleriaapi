<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 09:39:20
  from "/var/www/html/WORKS/BTCCLUB/application/views/layout/top_nav_bar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68523bf0970783_96857120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc02724ccd8311484de58ecc58ac73cb53523ee4' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/layout/top_nav_bar.tpl',
      1 => 1749879017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68523bf0970783_96857120 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <div id="header" class="app-header">
    <div class="desktop-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <div class="mobile-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <div class="brand">
        <a href="<?php echo base_url();?>
" class="brand-logo">
                   
                    <img src="<?php echo assets_url();?>
images/logo/<?php echo $_smarty_tpl->tpl_vars['site_details']->value['logo'];?>
" alt="Profile" height="60">
                </a>
            </div>
            <div class="menu">
                <div class="menu-item dropdown">
                    <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app" class="menu-link">
                        <div class="menu-icon"><i class="bi bi-search nav-icon"></i></div>
                    </a>
                </div>
               
               
                <div class="menu-item dropdown dropdown-mobile-full">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link" style="margin-right: -134px;">
                        <div class="menu-img online">
                            <img src="<?php echo assets_url();?>
backend/img/user/profile.jpg" alt="Profile" height="60">
                        </div>
                        <div class="menu-text d-sm-block d-none w-170px"><?php echo log_user_name();?>
</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                        <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('login/logout');?>
">LOGOUT <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
                    </div>
                </div>
            </div>
            <form class="menu-search" method="POST" name="header_search_form">
                <div class="menu-search-container">
                    <div class="menu-search-icon"><i class="bi bi-search"></i></div>
                    <div class="menu-search-input">
                        <input type="text" class="form-control form-control-lg" placeholder="Search menu...">
                    </div>
                    <div class="menu-search-icon">
                        <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
                    </div>
                </div>
            </form>
        </div><?php }
}
