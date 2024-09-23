<?

$year=trim($_REQUEST['year']);
$empresa=trim($_REQUEST['empresa']);
$marca=trim($_REQUEST['marca']);
$proyecto=trim($_REQUEST['campo']);
$nivel=trim($_REQUEST['nivel']);
$tipo=trim($_REQUEST['tipo']);
$campo=trim($_REQUEST['campo']);



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="general/jquery-ui.css">
		<script src="general/jquery.min.js"></script>
		<script src="general/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script src="js/i18n/elfinder.es.js"></script>

		<!-- elFinder initialization (REQUIRED) --> 
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options


			

			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : 'php/connector.minimal6.php?empresa=<?=$empresa?>&marca=<?=$marca?>&proyecto=<?=$proyecto?>&nivel=<?=$nivel?>&year=<?=$year?>&tipo=<?=$tipo?>&campo=<?=$campo?>',  // connector URL (REQUIRED)
				    lang: 'es',
				    height: '600px'
				                  
				});


			});
		</script>









	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->

        <p style="font-family:verdana" ><?=$proyecto?></p>

		<div id="elfinder"></div>

	</body>
</html>
