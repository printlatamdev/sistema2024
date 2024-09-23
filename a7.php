<!DOCTYPE HTML>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
            <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" language="javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
         

<?$acor='accordion';?>
            <script>
$(function() {
    $( "#<?echo $acor;?>" ).accordion({
     collapsible: true,
     active: false,    

    });
    $("#h3").on( "click", function() {
        $("#h3").hide();
        return false;
    });
    $("#accordion").on("click", function(){
        $("#h3").show(); 
        return false;        
    });
  });
</script>

 <script>
$(function() {
    $( "#accordion2" ).accordion({
     collapsible: true,
     active: false,    

    });
    $("#h3").on( "click", function() {
        $("#h3").hide();
        return false;
    });
    $("#accordion").on("click", function(){
        $("#h3").show(); 
        return false;        
    });
  });
</script>











        </head>
        <body>
            <table class="table">
  <thead>
    <tr>
      <th width="100">#</th>
      <th width="100">First</th>
      <th width="100">Last</th>
      <th width="100">Handle</th>
        <th width="100">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>

        <th width="100"><div id="accordion2" style="width: 10px; height: 10px;">

                <h3></h3>

                <div style="width: 1300px; height: 600px;">
                    <iframe name="I1" id="I1" src="ac2.php" frameborder="0" style="  position:relative; margin-top: -20px "  width="100%" height="600px" scrolling="no">

                    </iframe>   
                </div>
               
            </div></th>
      <th width="100">1</th>
      <td width="100">Mark</td>
      <td width="100">Otto</td>
      <td width="100">@mdo</td>
      
    </tr>



    <tr>
       <th  width="100"><div id="<?echo $acor;?>" style="width: 10px; height: 10px;">

                <h3></h3>

                <div style="width: 1300px; height: 600px;">
                    <iframe name="I1" id="I1" src="ac2.php" frameborder="0" style="  position:relative; margin-top: -20px "  width="100%" height="600px" scrolling="no">

                    </iframe>   
                </div>
               
            </div></th>
       
      <th width="100">1</th>
      <td width="100">Mark</td>
      <td width="100">Otto</td>
      <td width="100">@mdo</td>
      
    </tr>

      <tr>

        <th width="100"></th>
      <th width="100">1</th>
      <td width="100">Mark</td>
      <td width="100">Otto</td>
      <td width="100">@mdo</td>
      
    </tr>

      <tr>

        <th width="100"></th>
      <th width="100">1</th>
      <td width="100">Mark</td>
      <td width="100">Otto</td>
      <td width="100">@mdo</td>
      
    </tr>



  
    
  </tbody>
</table>
            
        </body>
    </html>