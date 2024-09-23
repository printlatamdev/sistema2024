
<style type="text/css">
	* {
    font-size:14px;
}
#store_list {
    height:300px;
    width: 300px;
    border:1px solid black;
    margin:0;
    padding:0;
}
div#stores {
    margin:0;
    padding:0;
    overflow:auto;
    max-height:100%;
}
</style>



<body>
    <div id="store_list">
        <div id="stores">
             <h3 id="1">Store 1</h3>

            <div>
                <div class="store_addr">123 Busy St.
                    <br/>Somewhere, HI 96772
                    <br/>Somewhere, HI 96772
                    <br/>Somewhere, HI 96772
                    <br/>Somewhere, HI 96772
                    <br/>Somewhere, HI 96772
                    <br/>Somewhere, HI 96772</div>
            </div>
             <h3 id="2">Store 2</h3>

            <div>
                <div class="store_addr">123 Busy St.
                    <br/>Somewhere, HI 96772</div>
                <br/>Somewhere, HI 96772
                <br/>Somewhere, HI 96772
                <br/>Somewhere, HI 96772
                <br/>Somewhere, HI 96772</div>
             <h3 id="3">Store 3</h3>

            <div>
                <div class="store_addr">123 Busy St.
                    <br/>Somewhere, HI 96772</div>
            </div>
             <h3 id="4">Store 4</h3>

            <div>
                <div class="store_addr">123 Busy St.
                    <br/>Somewhere, HI 96772</div>
            </div>
             <h3 id="5">Store 5</h3>

            <div>
                <div class="store_addr">123 Busy St.
                    <br/>Somewhere, HI 96772</div>
            </div>
             <h3 id="6">Store 6</h3>

            <div>
                <div class="store_addr">123 Busy St.
                    <br/>Somewhere, HI 96772</div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
	$(function () {
    $(document).ready(function () {
        $("#stores").accordion({
            heightStyle: "content",
            icons: false,
            activate: function (event, ui) {
                var scrollTop = $("#stores").scrollTop();
                var top = $(ui.newHeader).offset().top;
                $("#stores").scrollTop(scrollTop + top - 5);
            }
        });
    });
});
</script>