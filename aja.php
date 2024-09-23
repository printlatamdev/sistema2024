<script type="text/javascript" src="jquery.min.js"></script>
<style type="text/css">
.col1 {display: none; } .col2 {display: none; } .col3 {display: none; } table.show1 .col1 { display: table-cell; } table.show2 .col2 { display: table-cell; } table.show3 .col3 { display: table-cell; }

</style>


<table id="mytable"> <tr> <th onclick="toggleColumn(1)">Col 1 = A + B + C</th> <th class="col1">A</th> <th class="col1">B</th> <th class="col1">C</th> <th onclick="toggleColumn(2)">Col 2 = D + E + F</th> <th class="col2">D</th> <th class="col2">E</th> <th class="col2">F</th> <th onclick="toggleColumn(3)">Col 3 = G + H + I</th> <th class="col3">G</th> <th class="col3">H</th> <th class="col3">I</th> </tr> <tr> <td>20</td> <td class="col1">10</td> <td class="col1">10</td> <td class="col1">0</td> <td>20</td> <td class="col2">10</td> <td class="col2">8</td> <td class="col2">2</td> <td>20</td> <td class="col3">10</td> <td class="col3">8</td> <td class="col3">2</td> </tr> </table>



<script type="text/javascript">
 function toggleColumn(n) { var currentClass = document.getElementById("mytable").className; if (currentClass.indexOf("show"+n) != -1) { document.getElementById("mytable").className = currentClass.replace("show"+n, ""); } else { document.getElementById("mytable").className += " " + "show"+n; } }

</script>