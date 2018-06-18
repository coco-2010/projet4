<div class="page-backoffice">
    <h1 class="page-header">Liste Commentaire</h1>
    
    <div class="table-container">
        <h2>Commentaire signales</h2>
        <table width="100%" class="table" id="">
            <thead>
                <tr>
                    <th class='small-col'>Author</th>
                    <th class='small-col'>Date</th>
                    <th>Commentaire</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php
                foreach ($this->data_report as $key => $value){
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td class='small-col'>$value->author";
                            echo "<td class='small-col'>$value->date_post";
                            echo '<td>'.substr($value->description, 0, 200).'</td>';
                            if ($value->report == 1){echo "<td style='padding-left: 5px;'><a href='b/comment/editComment/$value->id' role='button' class='small-button comment-button-green'>Maintenir</a></td>";}
                            echo "<td style='padding-left: 5px;'><a href='b/comment/delComment/$value->id' role='button' class='small-button button-red'>Supprimer</a></td>";
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
                    <th class='small-col'>Author</th>
                    <th class='small-col'>Date</th>
                    <th>Commentaire</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php
                foreach ($this->data as $key => $value){
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td class='small-col'>$value->author";
                            echo "<td class='small-col'>$value->date_post";
                            echo '<td>'.substr($value->description, 0, 200).'</td>';
                            echo "<td><button class='button-block'>Maintenir</button></td>";
                            
                            echo "<td><a href='b/comment/delComment/$value->id' role='button' class='small-button button-red'>Supprimer</a></td>";
                            echo "</tr>";
                    echo "</tbody>"; 
                }
            ?>
        </table>
    </div>
            
</div>