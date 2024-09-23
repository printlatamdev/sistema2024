
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<table class="table">
    <tr  data-id="1" class="opciones">
        <td>
            Dale Click Aqui
        </td>
    </tr>
    <tr id="Tabla_Mostrar1">
        <td>
            <table class="table">
                <tr data-id="1" class="opciones"  >
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>

                 <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>
            </table>
        </td>
    </tr>

    
    
    
</table>

<script type="text/javascript">
  
function toggle(tableid){
  var id = jQuery(tableid).data('id')
  jQuery('#Tabla_Mostrar'+id).toggle();
}

jQuery(document).ready(function(){
  jQuery('.opciones').on('click', function(){
    toggle(this)
  })
});

</script>