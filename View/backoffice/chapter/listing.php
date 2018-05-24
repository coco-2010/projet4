<?php

$Chapter = new Chapter();

$data = $Chapter->getAllData();

?>


<div class="page-backoffice">
    <h1 class="page-header">Liste Chapitre</h1>
 
    <div class="table-container">
        <table width="100%" class="table" id="">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php
                foreach ($data as $key => $value){
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>$value->titre</td>";
                            echo "<td>$value->description</td>";
                            echo "<td><a href='b/edit/$value->id' role='button' class='button-edit'>Modifier</a></td>";
                            echo "<td><a href='b/del/$value->id' role='button' class='button-delete'>Supprimer</a></td>";
                            echo "</tr>";
                    echo "</tbody>";
                }
            ?>
        </table>
    </div>
            
</div>