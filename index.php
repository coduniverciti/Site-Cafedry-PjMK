<?
include 'function.php';
		$title='';
			$id =strip_tags($_GET['id']);
				switch ($id){
					case 'index.inc':
						$title='Главный';
						break;
					case 'sotrudniki':
						$title='Сотрудники';
						break;
					case 'uchebniy_pos':
						$title='Учебные пособия';
						break;
					case 'okaf':
						$title='О Кафедре';
						break;
					case 'search_to_books':
						$title='Поиск';
						break;
					default:
						$title='Главный';
						break;
				}
			?>
<html>
<head>
	<title><?=$title;?></title>
	<link rel='stylesheet'href='stylee.css'>
	<link rel='stylesheet'href='style.css'>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div class="roditel">
		<div class='header'>
			<img src='logo/logo.png'>
			<div class='slova_teh'><p><span>Добро пожаловать в</span> <br>Ошский технологический колледж</p></div>
			<div class='menu'>
				<ul class='main-menu'>
					<li><a href='index.php?id=index.inc'>Главный</a>
					<li><a href='index.php?id=sotrudniki'>Сотрудники</a>
					<li><a href='index.php?id=uchebniy_pos'>Учебные пособия</a>
					<li class='opened'><a href='index.php?id=okaf'>О Кафедре</a>
				</ul>
			</div>
				<div class='search'>
					<form action='index.php?id=search_to_books' method='post'>
						<input type='text' name='textt' size='40' placeholder='Поиск по сайту'>
						<input type='submit' value='Поиск' name='word'>
					</form>
				</div>	
		</div>
		<div class='content'>
			<!--Слайдер-->
				 <div id="container">
					<div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
						<div id="slider">
							<ul>
								<li><img src="images/slide3.jpg" width="900" height="200" alt="Image Two" /></li>
								<li><img src="images/banner-1.jpg" width="900" height="200" alt="Image Three" /></li>
								<li><img src="images/slide5.jpg" width="900" height="200" alt="Image Four" /></li>
							</ul>
						</div>
						<div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
						<ul id="pagination" class="pagination">
							<li onclick="slideshow.pos(0)"></li>
							<li onclick="slideshow.pos(1)"></li>
							<li onclick="slideshow.pos(2)"></li>
							<li onclick="slideshow.pos(3)"></li>
						</ul>
					</div>

<script type="text/javascript">
var slideshow=new TINY.slider.slide('slideshow',{
    id:'slider',
    auto:4,
    resume:false,
    vertical:false,
    navid:'pagination',
    activeclass:'current',
    position:0,
    rewind:false,
    elastic:true,
    left:'slideleft',
    right:'slideright'
});
</script>
			<!--Слайдер-->
			<!--Контент-->
			<div class='content_in'>
			<?
			$stranisy =strip_tags($_GET['id']);
				switch ($stranisy){
					case 'index.inc':
						include'stranisa/index.inc.php';
						break;
					case 'sotrudniki':
						include'stranisa/sotrudniki.inc.php';
						break;
					case 'uchebniy_pos':
						include'stranisa/uchebniy_pos.inc.php';
						break;
					case 'okaf':
						include'stranisa/okaf.inc.php';
						break;
					case 'search_to_books':
						include'search_to_books.php';
						break;
					default:
						include'stranisa/index.inc.php';
						break;
				}
			?>
			</div>
			<!--Контент-->
		</div>
		<div class='footer'>
			<h2>2016 г Мансур уулу Аскар</h2>
		</div>
	</div>
</body>
</html>