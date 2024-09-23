<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="estilotabla.css">
</head>
<body>
	<table id="reporte">
<tr>
<th>Edicion</th>
<th>Tutoriales</th>
<th>Paginas</th>
<th></th>
</tr>
<tr>
<td>SoloPhotoshop Magazine 1</td>
<td>7</td>
<td>51</td>
<td><div class="arrow"></div></td>
</tr>
<tr>
<td colspan="4">
<a href="http://solophotoshop.com/revista/1/">
<img src="solophotoshop-magazine-01.jpg" />
</a>
<h4>Tutoriales de SoloPhotoshop Magazine</h4>
<ul>
<li>Dorado Antiguo</li>
<li>Maravilla R&uacute;stica</li>
<li>Jard&iacute;n Resplandeciente</li>
</ul>
</td>
</tr>
<tr>
<td>SoloPhotoshop Magazine 2</td>
<td>7</td>
<td>52</td>
<td><div class="arrow"></div></td>
</tr>
<tr>
<td colspan="4">
<a href="http://solophotoshop.com/revista/2/">
<img src="solophotoshop-magazine-02.jpg" />
</a>
<h4>Tutoriales de SoloPhotoshop Magazine</h4>
<ul>
<li>Naranja Amanecer</li>
<li>Piel de Seda o Efecto Glamour</li>
</ul>
</td>
</tr>
</table>
<script type="text/javascript">
	$(document).ready(function(){
	$("#reporte tr:odd").addClass("odd");
	$("#reporte tr:not(.odd)").hide();
	$("#reporte tr:first-child").show();

	$("#reporte tr.odd").click(function(){
	$(this).next("tr").toggle();
	$(this).find(".arrow").toggleClass("up");
	});
	});
</script>
</body>
</html>