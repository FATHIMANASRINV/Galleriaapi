function disableButton() {
    $("#register").hide();
}
function enableButton() {
    $("#register").show();
}
function trim(s) {
    return s.replace(/^\s+|\s+$/, "");
}
function checkStep(s, e) {
    1 == s ? enableButton() : disableButton();
}
function checkStepSponsor(s, e) {
    1 == s ? enableButton() : disableButton();
}

$(document).ready(function () {
    var s = $("#rootPath").val(),
    l = '<small class="text-warning"><div class="spinner-border spinner-border-sm text-success mt-2" role="status"></div> '+checking_sponser_user_name+'<small>';
    $("#sponsor_name").blur(function () {
        var e = s + "signup/checkUsernameAvailability";
        // $("#spinner_sponsor").addClass("fa-spin fa-cog blue-color"),
        $("#message_box").removeClass(),
        $("#message_box").addClass("messagebox"),
        $("#message_box").html(l).show().fadeTo(100, 1);
 
        $.post(e, { username: $("#sponsor_name").val() }, function (s) {
            "no" == trim(s)
            ? $("#message_box").fadeTo(100, 0.1, function () {
              $("#spinner_sponsor").removeClass("fa-spin fa-cog");
              var s = "<span class='help-block'><i class='fa fa-times fa-lg'></i> " + invalid_sponser_user_name + "</span>";
              $(this).addClass('invalid-feedback'),
              $(this).html(s).show().fadeTo(100, 1),
              $("#sponsor_name").attr("disabled", !1);
          })
            : $("#message_box").fadeTo(100, 0.1, function () {
              $("#spinner_sponsor").removeClass("fa-spin fa-cog"),
              $(this).addClass('valid-feedback'),
              $(this)
              .html('<span class=" help-block-sucess"> ' + sponser_name_validated + "  </span>")
              .show()
              .fadeTo(100, 1),
              $("#sponsor_name").attr("disabled", !1),
              checkStepSponsor(1);
          });
        });

    });
});
