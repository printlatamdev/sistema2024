<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Interactive Form</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"><link rel="stylesheet" href="add_pop/style.css">
<script type="text/javascript">// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});</script>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
    <div class="wrapper">
      <ul class="steps">
        <li class="is-active">Mueble</li>
        <li>Items</li>
        <li>Pliegos</li>
      </ul>
     

      <form class="form-wrapper">
        <fieldset class="section is-active">
          <h3>Ingrese datos de orden</h3>
   <!--Blue select-->
<select class="mdb-select md-form colorful-select dropdown-primary">
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
  <option value="5">Option 5</option>
</select>
<label class="mdb-main-label">Blue select</label>
<!--/Blue select-->
          <div class="button">Next</div>
        </fieldset>
        <fieldset class="section">
          <h3>Ingrese Pliegos</h3>
          <div class="row cf">
            <div class="four col">
              <input type="radio" name="r1" id="r1" checked>
              <label for="r1">
                <h4>Designer</h4>
              </label>
            </div>
            <div class="four col">
              <input type="radio" name="r1" id="r2"><label for="r2">
                <h4>Developer</h4>
              </label>
            </div>
            <div class="four col">
              <input type="radio" name="r1" id="r3"><label for="r3">
                <h4>Project Manager</h4>
              </label>
            </div>
          </div>
          <div class="button">Next</div>
        </fieldset>
        <fieldset class="section">
          <h3>Ingrese Pliegos 2</h3>
          <input type="password" name="password" id="password" placeholder="Password">
          <input type="password" name="password2" id="password2" placeholder="Re-enter Password">
          <input class="submit button" type="submit" value="Sign Up">
        </fieldset>
        <fieldset class="section">
          <h3>Account Created!</h3>
          <p>Your account has now been created.</p>
          <div class="button">Reset Form</div>
        </fieldset>
      </form>
    </div>
  </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>