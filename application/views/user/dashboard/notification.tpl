
<div class="menu-header-content bg-primary text-fixed-white">
    <div class="d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fs-15 fw-semibold text-fixed-white">Notifications</h6>
        {if $recent_message}
        <a class="badge rounded-pill bg-warning pt-1 text-fixed-black" href="{base_url()}{log_user_type()}/mail/mark_all_read">Mark All Read</a>
        {/if}
    </div>
    {if $recent_message}
    <p class="dropdown-title-text subtext mb-0 text-fixed-white op-6 pb-0 fs-12 ">You have {$recent_message_count} unread Notifications</p>
    {/if}
</div>
<div><hr class="dropdown-divider"></div>
<ul class="list-unstyled mb-0" id="header-notification-scroll">
    {if $recent_message}
    {foreach $recent_message as $v}
    <li class="dropdown-item px-3">
        <div class="d-flex">
            <span class="avatar avatar-md me-2 avatar-rounded flex-shrink-0 bg-pink">
                <i class="la la-file-alt fs-20"></i>
            </span>
            <div class="ms-3">
                <a href="{base_url()}{log_user_type()}/mail/email_detail/{$v.enc_id}/1"><h5 class="notification-label text-dark mb-1">{$v.from_user_name}</h5></a>
                <div class="notification-subtext">{$v.date}</div>
            </div>
            <div class="ms-auto" >
                <a href="{base_url()}{log_user_type()}/mail/email_detail/{$v.enc_id}/1"><i class="las la-angle-right text-end text-muted icon"></i></a>
            </div>
        </div>
    </li>
    {/foreach}
    {else}
    <li class="dropdown-item px-3">{lang('no_new_messages')}...!!</li>
    {/if}
</ul>
<div class="text-center dropdown-footer">
    <a href="{base_url(log_user_type())}/mail/inbox" class="text-primary fs-13">{lang('view_all')}</a>
</div>
