<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
</head>
<body>
                        <select class="selectpicker"  data-live-search="true" >
                            <option value="Laravel">Laravel</option>
                            <option value="Symfony">Symfony</option>
                            <option value="Codeigniter">Codeigniter</option>
                            <option value="CakePHP">CakePHP</option>
                            <option value="Zend">Zend</option>
                            <option value="Yii">Yii</option>
                            <option value="Slim">Slim</option>
                        </select>
                        <script>
    $(document).ready(function(){
        $('.selectpicker').selectpicker();
    });
</script>
</body>
</html>