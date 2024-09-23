<?php if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    echo $_GET['q'];
    exit;
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(function(){    
        $("#btn").click(function(e) {
            e.preventDefault();
            var val = "Hi";
            $.ajax ({
                url: "j.php",
                //wrong query. you are not passing key , so here q is key
                data: 'q=' + val,
                success: function(returnResponseData) {
                alert('Ajax return data is: ' + returnResponseData);
                }
            });
        });
    });
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <form name="numbers" id="numbers">    
        <input type="text" name="number" id="number">
        <input type="submit" name='button' id="btn" value="submit">
    </form>
</body>
</html>