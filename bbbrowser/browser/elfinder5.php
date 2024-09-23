<?
$id=trim($_REQUEST['id']);
$user=trim($_REQUEST['user']);
$year=trim($_REQUEST['year']);
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
					url : 'php/connector.minimal5.php?id=<?=$id?>&user=<?=$user?>&year=<?=$year?>',  // connector URL (REQUIRED)
				    lang: 'es',
				    height: '600px'
				                  
				});


			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
