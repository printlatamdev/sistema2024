<div id="gg-accordion-01" class="gg-accordion gg-panel-group">
    <div class="gg-panel">
        <div class="gg-panel-heading">
            <h4 class="gg-panel-title">
                <a class="collapsed" data-toggle="gg.collapse" 
                    data-ajax-url="ajax/data.php"
                    data-ajax-params='{"zone":"1","cache":"yes"}'>
                    <span class="gg-icon">
                        <i class="fa fa-plus-square gg-collapse"></i>
                        <i class="fa fa-minus-square gg-expand"></i>
                    </span>
                    AJAX Collapsible Group Item #1
                </a>
            </h4>
        </div>
        <div class="gg-panel-collapse collapse">
        </div>
    </div>

    <div class="gg-panel">
        <div class="gg-panel-heading">
            <h4 class="gg-panel-title">
                <a class="collapsed" data-toggle="gg.collapse"
                    data-ajax-url="ajax/data.php"
                    data-ajax-params='{"zone":"2","cache":"no"}'
                    data-ajax-cache="false">
                    <span class="gg-icon">
                        <i class="fa fa-plus-square gg-collapse"></i>
                        <i class="fa fa-minus-square gg-expand"></i>
                    </span>
                    AJAX Collapsible Group Item #2
                </a>
            </h4>
        </div>
        <div class="gg-panel-collapse collapse">
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#gg-accordion-01').ggAccordion({
    theme: 'slate',
    radius: true,
    cache: true
});
</script>


