<h2 style='text-align:center;'>Самые популярные книги на тему Android</h2>
<?
$table = 'python';
$products = get_products($table);
foreach($products as $item):
?>
	<table>
			  <tr>
		          <td><img src="image/<?=$item['img'];?>"</td> 
		          <td><p style='font-size:20px;'><?=$item['title'];?></p></td> 
		    	  <td><?=$item['text'];?></td>
			  </tr>
	</table>
<?endforeach;?>