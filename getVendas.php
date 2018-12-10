<?php

require 'getKey.php';

$ch = curl_init($site."rest/V1/orders?searchCriteria[pageSize]=50");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . json_decode($token)));
 
$result = curl_exec($ch);
$result = json_decode($result);
?>
<h3>Lista de Vendas</h3>

<table>
    <tr>
        <th>Total</th>
        <th>E-mail</th>
        <th>Frete</th>
    </tr>
    <?php foreach ($result->items as $item) :?>
        <tr>
            <td><?= $item->base_grand_total; ?></td>
            <td><?= $item->customer_email; ?></td>
            <td><?= $item->shipping_description; ?></td>
        </tr>        
    <?php endforeach;?>
</table>
<?php

// var_dump($result);