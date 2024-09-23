<?php

	if(isset($_POST['emp']))
	{
		
		$base = $_POST['base'];
		
		include('../'.$base . "_db.php");
		

		$rs=$mysqli->query("SELECT * FROM contacto WHERE id_empresa='".$_POST['emp']."'");
		
		 //$option .= '<option value="0">Seleccione Contacto</option>';
		 
	     while ($fila = $rs->fetch_row()) { $option .= '<option value="'.$fila[0].'">'.$fila[2].'</option>';  }

		$mysqli->close();
			
	
		echo $option;
	}
	

?>
