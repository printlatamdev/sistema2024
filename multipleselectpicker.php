 <!-- Multiple Item Picker -->
  <div class="jumbotron">
    <h2>Multiple Item Picker</h2>
    <select class="selectpicker show-menu-arrow" 
            data-style="form-control" 
            data-live-search="true" 
            title="-- Select your coffee --"
            multiple="multiple">
      <option data-tokens="Espresso">Espresso</option>
      <option data-tokens="Americano">Americano</option>
      <option data-tokens="Mocha">Mocha</option>
      <option data-tokens="Capuccino">Capuccino</option>
      <option data-tokens="Affogato">Affogato</option>
      <option data-tokens="Long Black">Long Black</option>
      <option data-tokens="Macchiato">Macchiato</option>
    </select>
  </div><!--.jumbotron-->

  </div><!--.row-->
</div><!--.container-->

<footer>
  <center>
    Made with ♥ using <a href="https://silviomoreto.github.io/bootstrap-select/"> Bootstrap Select </a> by Silvio Moreto
  </center>
</footer>

<script type="text/javascript">
   /* Multiple Item Picker */
  $('.selectpicker').selectpicker({
    style: 'btn-default'
  });
</script> 