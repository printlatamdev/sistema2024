<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Firma Electronica</title>
<script src="jquery.min.js"></script>
<script src="signature_pad.js"></script>

<body>

<!-- Contenedor y Elemento Canvas -->

<form id="form" action="savedraw.php" method="post">


    <input type="text" name="nombre">
   

    <input type="hidden" name="pacient_id" value='<?php echo $user->id; ?>'>
    <input type="hidden" name="base64" value="pruebaaaa" id="base64">
     






    <button id="saveandfinish" class="btn btn-success">Guardar y Finalizar</button>
</form>




  <div id="signature-pad" class="signature-pad" >
      <div class="description">Firmar Aqui</div>
    <div class="signature-pad--body">
      <canvas style="width: 980px; height: 420px; border: 1px black solid; " id="canvas"></canvas>
    </div>
  </div>

<!-- Formulario que recoge los datos y los enviara al servidor -->
 



<script type="text/javascript">

var wrapper = document.getElementById("signature-pad");

var canvas = wrapper.querySelector("canvas");
var signaturePad = new SignaturePad(canvas, {
  backgroundColor: 'rgb(255, 255, 255)'
});

function resizeCanvas() {

  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);

  signaturePad.clear();
}

window.onresize = resizeCanvas;
resizeCanvas();

</script>
<script>

   document.getElementById('form').addEventListener("submit",function(e){

    var ctx = document.getElementById("canvas");
      var image = ctx.toDataURL(); // data:image/png....
      document.getElementById('base64').value = image;
   },false);

</script>
  </body>
</html>

