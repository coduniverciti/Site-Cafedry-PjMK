<?
//	Функция поиск принимает один параметр word
function search($word){
	if($word === '') return false;
	$query_search = '';
	$arrayWord = explode(' ',$word); 
	foreach ($arrayWord as $key => $value) {
		if(isset($arrayWord[$key - 1]))
			$query_search .=' OR ';
		$query_search .= '`title` LIKE "%'.$value.'%" OR `textt` LIKE "%'.$value.'%"';
	}
	$query = "SELECT * FROM sotrudnik WHERE $query_search";
	$mysqli =new mysqli("localhost","root",'','kaf');
	$result_set = $mysqli->query($query);
	$mysqli->close();
	
	$i = 0;
	while ($row = $result_set->fetch_assoc()){
		$results[$i] = $row;
		$i++;
	}
	return $results;
}

echo "<h2 style='text-align:center;border-bottom:1px solid #000;padding-bottom:10px;'>Результат поиска.</h2>";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$word = trim(strip_tags((htmlspecialchars($_POST['textt']))));
	$results =search($word);
}
if(isset($_POST['word'])){
	if($results === false){
		echo "<h2>Вы задали пустой запрос.</h2>";
		exit;
	}
	if(count($results) === 0)
		echo "<h2>Ничего не найдено.</h2>";
	else
		 for ($i=0; $i < count($results); $i++){
			 echo '<table>';
			        echo '<tr>';
              		echo "<td class='img'><img src='images/".$results[$i]['img']."'></td>";
              		echo "'<td class='p'><h3>'".$results[$i]['title']."'</h3><p style='height: 50px; overflow: hidden;'>'"
					.$results[$i]['textt']."</p></td>";
              		echo '</tr>';
            echo '</table>';
         }
}