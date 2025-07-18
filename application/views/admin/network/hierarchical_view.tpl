{extends file="layout/base.tpl"}
{block name="header"}
<head>
    <link rel="stylesheet" href="../../assets/plugins/tree/jstree/themes/default/style.min.css" />
</head>
{/block}
{block name="body"}   
<div class="card" >
    <div class="card-header">Hierarchical view</div>
    <div class="mt-3" >
        <div class="card-header ">
            <div class="row align-items-center">
                <div id="SimpleJSTree" class="demo jstree-closed"></div>

            </div>
        </div>
    </div>
</div> 
{/block}
{block name="footer"}
<script src="../../assets/plugins/tree/jstree/jstree.js"></script>
<script src="../../assets/plugins/tree/jstree/jstree.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#SimpleJSTree').jstree({
            "plugins" : [ "unique", "dnd" ,"wholerow"],
            'core' : {
                'data' : {
                    'url' : "{base_url()}admin/network/hierarchical_json", 
                    'data' : function (node) {  
                        return { 'id' : node.id }; 
                    } ,

                    "dataType" : "json"
                } 
            },

        });
    });
</script>

{/block}