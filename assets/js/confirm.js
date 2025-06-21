var rootPath = $("#rootPath").val();

function trim(a)
{

    return a.replace(/^\s+|\s+$/, '');
}
function inactivate_news(id)
{

    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_will_not_recover").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_delete_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/tools/delete_new";


            $.post(check_user_available, {news_id: id}, function(data)
            {
                swal({
                    title: $("#text_deleted").html(), 
                    text: $("#text_news_deleted").html(), 
                    type: "success"
                },function() {
                });
                document.location.href = rootPath + "admin/tools/news_management";
            });

        } else {
            swal($("#text_cancelled").html(),$("#text_news_safe").html(), "error");
        }
    });

}

// function inactivate_events(id)
// {
//     swal({
//         title: $("#text_are_you_sure").html(),
//         text: $("#text_you_will_not_recover").html(),
//         type: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#DD6B55",
//         confirmButtonText: $("#text_yes_delete_it").html(),
//         cancelButtonText: $("#text_no_cancel_please").html(),
//         closeOnConfirm: false,
//         closeOnCancel: false
//     },
//     function (isConfirm) {
//         if (isConfirm) {
//             var check_user_available =  rootPath + "admin/tools/event_management/delete";


//             $.post(check_user_available, {news_id: id}, function(data)
//             {
//                 swal({
//                     title: $("#text_deleted").html(), 
//                     text: $("#text_news_deleted").html(), 
//                     type: "success"
//                 },function() {
//                 });
//                 document.location.href = rootPath + "admin/tools/event_management";
//             });

//         } else {
//             swal($("#text_cancelled").html(),$("#text_news_safe").html(), "error");
//         }
//     });

// }


function activate_package(id)
{
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_activate").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_activate_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/settings/update_package";

            $.post(check_user_available, {package_id: id , status: "yes"}, function(data)
            {
                swal({
                    title: $("#text_activated").html(), 
                    text: $("#text_package_activated").html(), 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/settings/package_settings";
                });
            });            
        } else {
            swal($("#text_cancelled").html(),$("#text_package_safe").html(), "error");
        }
    });
}

function inactivate_package(id)
{
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_deactivate").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_deactivate_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/settings/update_package";

            $.post(check_user_available, {package_id: id , status: "no"}, function(data)
            {
                swal({
                    title: $("#text_deactivated").html(), 
                    text: $("#text_package_deactivated").html(), 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/settings/package_settings";
                });
            });



        } else {
            swal($("#text_cancelled").html(),$("#text_package_safe").html(), "error");
        }
    });
}

function edit_package(id)
{
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_edit_package").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_edit_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            document.location.href = rootPath + "admin/settings/package_settings/"+id; 
        } else {
            swal($("#text_cancelled").html(),$("#text_package_safe").html(), "error");
        }
    });
}

function activate_rank(id)
{
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_activate_rank").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_activate_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/settings/update_rank";

            $.post(check_user_available, {rank_id: id , status: "yes"}, function(data)
            {


                swal({
                    title: $("#text_activated").html(), 
                    text: $("#text_rank_activated").html(), 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/settings/rank_settings";
                });
            });            
        } else {
            swal($("#text_cancelled").html(),$("#text_rank_safe").html(), "error");
        }
    });
}

function inactivate_rank(id)
{
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_deactivate_rank").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_deactivate_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/settings/update_rank";

            $.post(check_user_available, {rank_id: id , status: "no"}, function(data)
            {


                swal({
                    title: $("#text_deactivated").html(), 
                    text: $("#text_rank_deactivated").html(), 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/settings/rank_settings";
                });
            });
        } else {
            swal($("#text_cancelled").html(),$("#text_rank_safe").html(), "error");
        }
    });
}

function edit_rank(id)
{
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_edit_rank").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_edit_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            document.location.href = rootPath + "admin/settings/rank_settings/"+id; 
        } else {
            swal($("#text_cancelled").html(),$("#text_rank_safe").html(), "error");
        }
    });
}


$('.activate-row').click(function()
{
    var activateLink = $(this).data('srclink');
    var userId = $(this).data('srcid');

    swal({

        title: text_are_you_sure,
        text: text_you_want_activate_preuser,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: text_yes_activate_it,
        cancelButtonText: text_no_cancel_please,
        closeOnConfirm: false,
        closeOnCancel: false 
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/" + activateLink; 

            $.post(check_user_available, {preuser_id: userId , status: "yes"}, function(data)
            {
                swal({
                    title: text_activated, 
                    text: text_preuser_activated, 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/privileged_user/add_privileged_user";
                });
            });            
        } else {
            swal(text_cancelled, text_preuser_safe, "error");
        }
    });
});

$('.inactivate-row').click(function()
{   
    var inactivateLink = $(this).data('srclink');
    var userId = $(this).data('srcid');

    swal({
        title: text_are_you_sure,
        text: text_you_want_deactivate_preuser,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: text_yes_deactivate_it,
        cancelButtonText: text_no_cancel_please,
        closeOnConfirm: false,
        closeOnCancel: false

    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/" + inactivateLink;
            $.post(check_user_available, {preuser_id: userId , status: "no"}, function(data)
            {
                swal({
                    title: text_deactivated, 
                    text: text_preuser_deactivated, 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/privileged_user/add_privileged_user";
                });
            });
        } else {
            swal(text_cancelled, text_preuser_safe, "error");
        }
    });

}) ;



function inactivate_efile(id)
{
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_deactivate").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_deactivate_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/tools/delete_efiles";

            $.post(check_user_available, {efile_id: id}, function(data)
            {
                swal({
                    title: $("#text_deleted").html(), 
                    text: $("#text_efile_deleted").html(), 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/tools/view_efiles";
                });
            });



        } else {
            swal($("#text_cancelled").html(),$("#text_package_safe").html(), "error");
        }
    });
}
