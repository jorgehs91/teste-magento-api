<?php

require 'getKey.php';

$ch = curl_init($site."rest/V1/customers/search?searchCriteria[pageSize]=20");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . json_decode($token)));
 
$result = curl_exec($ch);
$result = json_decode($result);
?>
<h3>Lista de Clientes</h3>

<table>
    <tr>
        <th>E-mail</th>
        <th>Nome</th>
        <th>Sobrenome</th>
    </tr>
    <?php foreach ($result->items as $item) :?>
        <tr>
            <td><?= $item->email; ?></td>
            <td><?= $item->firstname; ?></td>
            <td><?= $item->lastname; ?></td>
        </tr>        
    <?php endforeach;?>
</table>
<?php

// var_dump($result);