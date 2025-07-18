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
<body class='pace-top'>
    <input type="hidden" id="rootPath" value="{base_url()}">
    {block name="body"}{/block}
    {block name=footer}
    <script src="{assets_url()}backend/js/vendor.min.js"></script>
    <script src="{assets_url()}backend/js/app.min.js"></script>
    {$smarty.block.child} 
    {/block}
</body>
</html>
