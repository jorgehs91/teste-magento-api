<?php

require 'getKey.php';

$ch = curl_init($site."rest/V1/products?searchCriteria[pageSize]=20");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . json_decode($token)));
 
$result = curl_exec($ch);
$result = json_decode($result);
?>
<h3>Lista de Produtos</h3>

<table>
    <tr>
        <th>SKU</th>
        <th>Nome</th>
        <th>Preço</th>
    </tr>
    <?php foreach ($result->items as $item) :?>
        <tr>
            <td><?= $item->sku; ?></td>
            <td><?= $item->name; ?></td>
            <td><?= $item->price; ?></td>
        </tr>        
    <?php endforeach;?>
</table>
<?php

// var_dump($result);