






  <form class="form-inline" method="get">
        <div class="form-group">
          <select name="filter" class="form-control" onchange="form.submit()">
            <option value="0">Filtros de datos de empleados</option>
            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
            <option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Fijo</option>
            <option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Contratado</option>
                        <option value="3" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Outsourcing</option>
          </select>
        </div>
      </form>





<?

   
if (!isset($_GET['filter'])) {

$n=0;
 
  
}
else{

$n=$_REQUEST['filter'];
  
}

echo $n;




?>
