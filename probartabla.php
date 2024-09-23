<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Mostrar/ocultar filas y columnas</title>

<style>
/* clase para ocultar el div al inicio */

.oculto {
display:none;

}


</style>

<script type="text/javascript">
<!--
/*****************************Ocultar div**************************/

var visto = null;
function ver(num) {

obj = document.getElementById(num);
obj.style.display = (obj==visto) ? 'none' : 'block';
if (visto != null)
visto.style.display = 'none';
visto = (obj==visto) ? null : obj;
}

-->
</script>
</head>
<body>

<table>

<tr >
<td><b><span style="cursor:pointer" onclick="ver('admisiones')"> Titulo uno </span></b></td>
</tr>

<tr id="admisiones" class="oculto">
<td>
<table>

<tr><td>
<a href="#"> Texto uno </a>
</td></tr>

<tr >
<td><a href="#"> Texto uno.uno </a></td>
</tr>


</table>
</td>
</tr>



<tr >
<td style="cursor:pointer"><span onClick="ver('nada')"><b> Titulo dos </b></span></td>
</tr>

<tr id="nada" class="oculto">
<td>
<table>

<tr><td>
<a href="#"> Texto dos </a>
</td></tr>

<tr >
<td><a href="#"> Texto dos.uno </a></td>
</tr>


</table>
</td>
</tr>

<tr >
<td><span style="cursor:pointer" onClick="ver('condi')"><b> Titulo tres </b></span></td>
</tr>

<tr id="condi" class="oculto">
<td>
<table>

<tr><td>
<a href="#"> Texto tres </a>
</td></tr>

<tr >
<td><a href="#"> Texto tres.uno </a></td>
</tr>


</table>
</td>
</tr>



</table>

</body>
</html>