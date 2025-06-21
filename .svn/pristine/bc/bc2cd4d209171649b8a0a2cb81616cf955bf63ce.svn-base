
function autoComplete(element, userType, path){
    var rootPath = $("#rootPath").val();

    $( element ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: rootPath + userType + '/' + path,
                dataType: 'json',
                data: { keyword : element.value },
                type: 'post',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['result']
                        }
                    }));
                }
            });
        }
    });
}