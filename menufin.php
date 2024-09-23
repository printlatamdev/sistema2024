<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Accordion table</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">



  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style type="text/css">



  @import url("https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.pcs:after {
  content: " pcs";
}

.cur:before {
  content: "$";
}

.per:after {
  content: "%";
}

* {
  box-sizing: border-box;
}

body {
  padding: .2em 2em;
}

table {
  width: 100%;
}
table th {
  text-align: left;
  border-bottom: 1px solid #ccc;
}
table th, table td {
  padding: .4em;
}

table.fold-table > tbody > tr.view td, table.fold-table > tbody > tr.view th {
  cursor: pointer;
}
table.fold-table > tbody > tr.view td:first-child,
table.fold-table > tbody > tr.view th:first-child {
  position: relative;
  padding-left: 20px;
}
table.fold-table > tbody > tr.view td:first-child:before,
table.fold-table > tbody > tr.view th:first-child:before {
  position: absolute;
  top: 50%;
  left: 5px;
  width: 9px;
  height: 16px;
  margin-top: -8px;
  font: 16px fontawesome;
  color: #999;
  content: "\f0d7";
  transition: all .3s ease;
}
table.fold-table > tbody > tr.view:nth-child(4n-1) {
  background: #17202A ;
}
table.fold-table > tbody > tr.view:hover {
  background: #E5E7E9;
}
table.fold-table > tbody > tr.view.open {
  background: #AED6F1 ;
  color: #17202A ;
}
table.fold-table > tbody > tr.view.open td:first-child:before, table.fold-table > tbody > tr.view.open th:first-child:before {
  transform: rotate(-180deg);
  color: #17202A ;
}
table.fold-table > tbody > tr.fold {
  display: none;
}
table.fold-table > tbody > tr.fold.open {
  display: table-row;
}

.fold-content {
  padding: .5em;
}
.fold-content h3 {
  margin-top: 0;
}
.fold-content > table {
  border: 2px solid #ccc;
}
.fold-content > table > tbody tr:nth-child(even) {
  background: #eee;
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->

<div  class="table-responsive" align="center">
<table class="fold-table"   >
   <thead class="bg-primary" >
                              <tr>

                                   <th width="125" align="center">OC</th>
                                 
                                 <th width="70" align="center">Marca</th>
                                  <th width="70" align="center">Origen</th>
                                 <th width="70" align="center">Destino</th>
                                 <!--<th>Producto</th>
                                <!-- <th>Motorista</th>
                                 <th>Placa</th> -->                               
                                 <th width="70" align="center">ETD</th>
                                 <th width="70" align="center">ETA</th>  
                                 <th width="70" align="center">Items</th>
                                                              
                              
                                
                                    <th width="70" align="center"> &nbsp;&nbsp;&nbsp;&nbsp; Accion</th>
                              


                                

                               </tr>
                            </thead>
  <tbody>
    <tr class="view">
      <td>Company Name2</td>
      <td class="pcs">457</td>
      <td class="cur">6535178</td>
      <td>-</td>
      <td class="per">50,71</td>
      <td class="per">49,21</td>
      <td class="per">0</td>
    </tr>
    <tr class="fold" bgcolor="#E8F8F5">
      <td colspan="2">
        <div class="fold-content">
          
          <table>
            <thead>
              <tr>
                <th>Company name2</th><th>Customer no</th><th>Customer name</th><th>Insurance no</th><th>Strategy</th><th>Start</th><th>Current</th><th>Diff</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sony</td>
                <td>13245</td>
                <td>John Doe</td>
                <td>064578</td>
                <td>A, 100%</td>
                <td class="cur">20000</td>
                <td class="cur">33000</td>
                <td class="cur">13000</td>
              </tr>
              <tr>
                <td>Sony</td>
                <td>13288</td>
                <td>Claire Bennet</td>
                <td>064877</td>
                <td>B, 100%</td>
                <td class="cur">28000</td>
                <td class="cur">48000</td>
                <td class="cur">20000</td>
              </tr>
              <tr>
                <td>Sony</td>
                <td>12341</td>
                <td>Barry White</td>
                <td>064123</td>
                <td>A, 100%</td>
                <td class="cur">10000</td>
                <td class="cur">22000</td>
                <td class="cur">12000</td>
              </tr>
            </tbody>
          </table>          
        </div>
      </td>
    </tr>
   
            </tbody>
          </table>          
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
<script type="text/javascript">
  $(function(){
  $(".fold-table tr.view").on("click", function(){
    $(this).toggleClass("open").next(".fold").toggleClass("open");
  });
});
</script>
</body>
</html>