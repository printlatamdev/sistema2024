<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>


<style type="text/css">
   .input-sm{
        height: 20px;
        font-size: 9pt;
        width: 100%;
    }
    .letra{
        font-size: 9pt;
    }
    table {
        border-collapse: collapse;
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        width: 100%;
    }

    tr {
        border-bottom: 1px solid #000;
    }
    input:[type=text]{
        border-bottom: 1px solid #C00;
        border: 0;
        outline: none; 
    } 
    
</style>
<table width="100%">
            <thead style="background:#000;text-align:center;">
                <tr>
                    <td colspan="4">
                        <a class="btn_show" href="#!" style="color:#fff; font-size:12px"><a>hola</a></a>
                    </td>
                </tr>
            </thead>
            <tbody id="contenido" style="display:none">
                <tr>
                    <th> 
                    Peso RN:
                    </th>
                    <td>
                        <input type="text" class="input-sm">
                    </td>
                    <th>Parto:</th>
                    <td>
                        <input type="text" class="input-sm">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Obs. Perinatales
                    </td>
                    <td colspan="2">
                        <input type="text" class="input-sm">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Obs. Perinatales
                    </td>
                    <td colspan="2">
                        <input type="text" class="input-sm">
                    </td>
                </tr>
            </tbody>
                
        </table>


        <script type="text/javascript">
            $(function () {
    $('.btn_show').click(function (ev) {
            $('#contenido').slideToggle("slow");

    });
})
        </script>