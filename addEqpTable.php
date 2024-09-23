<table id="datatablesSimple" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Codigo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $printers_inf = mysqli_query($mysqli, 'SELECT * FROM equipos_produccion');
                                        while ($printer = mysqli_fetch_array($printers_inf)) {
                                            $nombre = $printer['nombre'];
                                            $marca = $printer['marca'];
                                            $modelo = $printer['modelo'];
                                            $codigo = $printer['codigo'];
                                            $id = $printer['id_equipo'];

                                            echo "<tr id='$id'>
                                                <td>$nombre</td>
                                                <td>$marca</td>
                                                <td>$modelo</td>
                                                <td>$codigo</td>
                                                <td>
                                                <button class='edit-btn' data-id='$id' style='background:none;border:none;cursor:pointer'><i class='fa-regular fa-pen-to-square' style='color:  #06409d;margin-right:10%'></i></button>
                                                <button class='delete-btn' data-id='$id' style='background:none;border:none;cursor:pointer'><i class='fa-solid fa-trash' style='color: #e50606;margin-left:10%'>
                                                </td>
                                                </tr>";
                                        };
                                        ?>
                                    </tbody>
                                </table>