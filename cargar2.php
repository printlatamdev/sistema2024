<!DOCTYPE html>
<html>
<body>

<p>This example demonstrates how to assign an "onclick" event to a p element.</p>

<p id="demo" onclick="hola()">Click me.</p>

<script>
function hola() {
  document.getElementById("demo").innerHTML = "YOU CLICKED ME!";
}
</script>

</body>
</html>
