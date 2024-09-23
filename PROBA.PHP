http://www.picssel.com/playground/jquery/openFormIframeandCloseOnsubmit_02feb12.

<!DOCTYPE html>
<html>
<head>
    <title>
        
    </title>
</head>
<body>

</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="author" content="Jose Francisco Diaz / picssel.com" />
<title>open form and close on submit</title>
<link rel="stylesheet" type="text/css" href="http://picssel.com/demos/demos.css" />
<link rel="stylesheet" type="text/css" href="fancybox2.0.4/jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="fancybox2.0.4/helpers/jquery.fancybox-buttons.css" />
<style type="text/css">
#wrap {width: 800px; margin: 0 auto;}
</style>
<script src="jquery.js"></script>
<script type="text/javascript" src="fancybox2.0.4/jquery.fancybox.js"></script>
<script type="text/javascript" src="fancybox2.0.4/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(".fancybox").fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        fitToView   : false,
        width       : '70%',
        height      : '70%',
        autoSize    : false,
        closeClick  : false,
        type        : 'iframe',
        openEffect  : 'none',
        closeEffect : 'none',
        afterClose  : function() { 
            window.location.reload();
        }
    }); // fancybox
}); // ready
</script>
</head>
<body>
<div id="logo"></div>
<div id="wrap">
<h2>Close fancybox (iframe) after submit</h2>
<p>Ref: <a href="#http://stackoverflow.com/q/9117975/1055987">http://stackoverflow.com/q/9117975/1055987</a></p>
<p>use method javascript:parent.$.fancybox.close();</p><br />
<a class="fancybox" id="newLink" href="formInIframe.html">open form in fancybox, type=iframe</a>


</div>

</body> 
</html>