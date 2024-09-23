<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<Script>
function pasadato(){
var dato = document.getElementById('textbox').value;
//alert(dato);
OpenPage('2.php?textbox='+dato);
}
function toggle(what) {
        var aobj = document.getElementById(what);
        if( aobj.style.display == 'none' ) {
               aobj.style.display = '';
        } else {
               aobj.style.display = 'none';
        }
}
function CrearXMLHttp(){
	XMLHTTP=false;
	if(window.XMLHttpRequest){
		return new XMLHttpRequest();
	}else if(window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}
// suponiendo que tu div se llama loading
function OpenPage(url){
	req=CrearXMLHttp();
	if(req){
		req.onreadystatechange = manejador;
		req.open("POST",url,true);
		req.send(null);
                toggle('loading'); // ojo aqui
	}
}
function manejador(){
	if(req.readyState == 4){
		if(req.status == 200){
                        toggle('loading'); // ojo aca
			document.getElementById("tdc").innerHTML=req.responseText;
		}else{
			alert("Error"+req.statusText)
		}
	}
}
</Script>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<p><?php if ($_POST['Algo'] != ""){ ?>Valor recibido por $_POST['Algo']:&nbsp;<strong><?php echo htmlentities($_POST['Algo']); ?><strong><?php } ?>&nbsp;</p>
<table width="200" border="0">
  <tr>
    <td id="tdc"><div id="loading" style="display:none;" align="left">
          <table width="50" border="1" style="border-collapse:collapse;">
            <tr>
              <td bgcolor="#FF0000"><span style="color:#FFFFFF; font-weight:bold;">Cargando...</span></td>
            </tr>
          </table>
      </div><p>Valor a pasar: 
  <input name="textbox" type="text" id="textbox" value="1" size="8" />
</p></td>
  </tr>
</table>
<p><a href="javascript:pasadato();">Pasar Valor</a></p>
<p>
  <label>
  <input type="submit" name="button" id="button" value="enviar" />
  </label>
</p>
</form>
<p>&nbsp;</p>
</body>
</html>