<?
$table ='sotrudnik';
$products = get_products($table);
foreach($products as $item):
?>
<div class='sotrudniki'>
	<h2><?=$item['title']?></h2>
	<img src="images/<?=$item['img']?>">
	<p><?=$item['textt']?></p>
</div>
<?endforeach;?>