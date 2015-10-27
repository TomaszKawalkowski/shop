<?php

require_once('src/connection.php');
require_once('meta.html');
require_once('menu.php');
?>
    <br><br><br><br><br><br>
<?Php

?>
    <div class="row">
        <div class="container">
            <div class="col-8-sm">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Car Group</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Picture</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?Php

                    $ret = Product::showAllProducts();
                    $y = count($ret);

                    for ($i = 0; $i < $y; $i++) {
                        echo '
                     <tr>
                        <td>';
                        $groupname = $ret[$i]->getProductGroup();

                        $t = Group::showNamebyId($groupname);
                        echo $t->getGroupName() . '
                        </td>

                        <td>';

                        $groupname = $ret[$i]->getName();
                        echo $groupname . '

                        </td>
                        <td>';

                        $groupname = $ret[$i]->getPrice();
                        echo $groupname . '

                        </td>
                       <td>';

                        $groupname = $ret[$i]->getDescription();
                        echo $groupname . '

                        </td>

                        <td>';

                        $groupname = $ret[$i]->getStock();
                        echo $groupname . '

                        </td>


                        </tr>';
                    } ?>
                    </tbody>
                </table>
            </div>


        </div>


    </div>

<?Php


require_once('main_body.html');

require_once('footer.html');
