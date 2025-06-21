<div id="sidebar" class="app-sidebar">
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <div class="menu">
            {* <div class="menu-header"></div> *}
            {foreach from=$SIDE_MENU item=category key=cat}
         {*    <li class="sidebar-main-title">
                <div>
                    <h6 class="lan-{$cat}">{lang($cat)}</h6>
                </div>
            </li> *}
            <div class="menu-header">{lang($cat)}</div>
            {$counter = 0}
            {assign var=sub_menu_count value=0}
            {foreach from=$category item=v key=k}
            {$sub_menu_count=count($v.submenu)} 
            {if !$sub_menu_count}
            <div class="menu-item {if $v.is_selected == 'active'}active{/if}">
                <a href="{$v.link}" class="menu-link">
                    <span class="menu-icon"><i class="{$v.icon} "></i></span>
                    <span class="menu-text">{lang($v.text)}</span>
                </a>
            </div>
            {else}
            <div class="menu-item has-sub {if $v.is_selected == 'active'}expand{/if}">
                <a href="#" class="menu-link">
                    <span class="menu-icon">
                        <i class=" {$v.icon}"></i>
                    </span>
                    <span class="menu-text">{lang($v.text)}</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    {foreach from=$v.submenu item=i}
                    <div class="menu-item {$i.is_selected}">
                        <a href="{$i.link}" class="menu-link">
                            <span class="menu-text">{lang($i.text)}</span>
                        </a>
                    </div>
                    {/foreach}

                </div>
            </div>
            {/if} 
            {/foreach}
            {/foreach}
            {* <div class="menu-header">Components</div> *}
            {* <div class="menu-header">Users</div> *}
        </div>
       {*  <div class="p-3 px-4 mt-auto">
            <a href="https://seantheme.com/hud/documentation/index.html" target="_blank" class="btn d-block btn-outline-theme">
                <i class="fa fa-code-branch me-2 ms-n2 opacity-5"></i> Documentation
            </a>
        </div> *}
    </div>
</div>