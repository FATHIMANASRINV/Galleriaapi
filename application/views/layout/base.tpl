<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <title> {$title} | {$site_details['name']} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{assets_url()}images/logo/{$site_details['favicon']}" type="image/x-icon">
    {block name=header}
    <link href="{assets_url()}backend/css/vendor.min.css" rel="stylesheet">
    <link href="{assets_url()}backend/css/app.min.css" rel="stylesheet">
    <link href="{assets_url()}backend/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet"> 
    <link href="{assets_url()}backend/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">

    <style type="text/css">
        .fa-1sm{
            font-size:1.3em !important;
        }
        @media print{
            .hidden-print{
                display:none !important;
            }
        }
    </style>
    {$smarty.block.child} 
    {/block}
</head>
<body>
    <input type="hidden" id="rootPath" value="{base_url()}">
    <div id="app" class="app">
        {include file="layout/top_nav_bar.tpl"}
        {include file="layout/menu.tpl"}
        <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
        <div id="content" class="app-content">
         {include file="layout/flash_message.tpl"}
         {block name=body}{/block}
     </div>
     <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
 </div>
 {block name=footer}
 <script src="{assets_url()}backend/js/vendor.min.js"></script>
 <script src="{assets_url()}backend/js/app.min.js"></script>
 <script src="{assets_url()}backend/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
 <script src="{assets_url()}backend/plugins/jvectormap-content/world-mill.js"></script>
 <script src="{assets_url()}backend/plugins/apexcharts/dist/apexcharts.min.js"></script>
 <script src="{assets_url()}backend/js/demo/dashboard.demo.js"></script>
 <script src="{assets_url()}backend/plugins/summernote/dist/summernote-lite.min.js"></script>

 <script type="text/javascript">
    function changeCurrency(currency_id) {
        $.ajax({
            type:'POST',
            url:'{base_url('login/change-currency')}',
            data: { currency_id: currency_id },
            dataType:'json',
        })
        .done(function( html ) {
            window.location.reload();
        });
    }$(document).on("click","#messageDropdown",function() {

        $.ajax({
            type:'POST',
            url:'{base_url()}'+'{log_user_type()}'+'/autocomplete/get-user-message',
            dataType:'json',
            beforeSend: function() {
                $('.list-group-item').hide();
                $(".loading").delay(3).fadeIn("slow");
            },
        })
        .done(function(response) { 
            if (response.success) {
                $(".notif").html(response.recent_message)
            }               
            $(".loading").delay(3).fadeOut("slow");

        });
    });

</script>
{$smarty.block.child} 
{/block}
</body>
</html>
