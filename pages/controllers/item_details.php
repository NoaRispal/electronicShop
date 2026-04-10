<?php
# Connection to database
# 
# query
#
# result 
$items_details = array('name' => 'item1', 'price' => '100$', 'description' => 'This is item 1 long description');
#
echo '<h2>Item:'.$items_details["name"].'</h2>';
echo '<p>Price:'.$items_details["price"].'</p>';
echo '<p>Description:'.$items_details["description"].'</p>';
?>
