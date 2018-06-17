<div class="page-backoffice">
    <h1 class="page-header">Liste Commentaire</h1>
    
    <?php //$Paginator->paginate($param, $param2, $link);?>
    <div class="table-container">
        <h2>Commentaire signales</h2>
        <table width="100%" class="table" id="">
            <thead>
                <tr>
                    <th style='width: 12.5%;'>Author</th>
                    <th style='width: 12.5%;'>Date</th>
                    <th>Commentaire</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php
                foreach ($this->data_report as $key => $value){
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td style='width:12.5%;'>$value->author";
                            echo "<td style='width: 12.5%;'>$value->date_post";
                            echo '<td>'.substr($value->description, 0, 200).'</td>';
                            if ($value->report == 1){echo "<td><a href='b/comment/editComment/$value->id' role='button' class='button-edit'>Maintenir</a></td>";}
                            echo "<td><a href='b/comment/delComment/$value->id' role='button' class='button-delete'>Supprimer</a></td>";
                            echo "</tr>";
                    echo "</tbody>"; 
                }
            ?>
        </table>
        <table>
            <h2>Commentaires</h2>
        <table width="100%" class="table" id="">
            <thead>
                <tr>
                    <th style='width: 12.5%;'>Author</th>
                    <th style='width: 12.5%;'>Date</th>
                    <th>Commentaire</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php
                foreach ($this->data as $key => $value){
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td style='width:12.5%;'>$value->author";
                            echo "<td style='width: 12.5%;'>$value->date_post";
                            echo '<td>'.substr($value->description, 0, 200).'</td>';
                            echo "<td><button class='button-block'>Maintenir</button></td>";
                            
                            echo "<td><a href='b/comment/delComment/$value->id' role='button' class='button-delete'>Supprimer</a></td>";
                            echo "</tr>";
                    echo "</tbody>"; 
                }
            ?>
        </table>
    </div>
            
</div>