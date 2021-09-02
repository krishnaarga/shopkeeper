<?php

require_once '../config.php';

$products = new Products();
$products = json_decode($products->productList());

$count = 0;
foreach($products as $product):
    $count++;
?>
<tr>
    <td><?= $count; ?></td>
    <td><?= $product->product_name; ?></td>
    <td><?= $product->product_price; ?></td>
    <td></td>
</tr>
<?php
endforeach;
