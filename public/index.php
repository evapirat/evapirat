<!DOCTYPE html>
<html lang="ru">

<?php
$head = '
	<meta charset="utf-8">
	<title>Изучаем PHP</title>
	<link rel="stylesheet" href="assets/css/style.css">
';

$headerContent = '
	<div class="content">
			<div class="logo">
				<img src="assets/logo.png" alt="logo">
				<a href="/">
					<h3>Музыкальный сервис</h3>
				</a>
			</div>
			<nav>
				<a href="/teams/index.html">Группы</a> |
				<a href="/albums">Альбомы</a> |
				<a href="/tracks">Треки</a> |
				<a href="/admin">Консоль</a>
			</nav>
		</div>
';

$mainContent = '
<div class="content">	
	<h1>SILENCE.NET</h1>
	<h3>Музыка – это тишина, которая живёт между звуками</h3>
	<h4>(В.А. Моцарт)</h4>
	<h3>Найди свою тишину</h3>
	<input type="button" value="Поиск в базе">
<div>
';

$footerContent = '
		<div class="content">
			<div class="block">
				<div class="logo">
					<img src="assets/logo.png" alt="logo">
					<h2>Музыкальный сервис</h2>
				</div>
			</div>

			<div class="block">
				<div class="head">КОМПАНИЯ</div>
				<div class="links">
					<p><a href="/about">О нас</a></p>
					<p><a href="/contacts">Контакты</a></p>
				</div>
			</div>
			<div class="block">
				<div class="head">ПОЛЕЗНЫЕ ССЫЛКИ</div>
				<div class="links">
					<p><a href="https://www.vehi.net/mbulgakov/master/01.html" target="_blank">Хорошая книга</a></p>
					<p><a href="https://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D1%81%D1%82%D0%B5%D1%80_%D0%B8_%D0%9C%D0%B0%D1%80%D0%B3%D0%B0%D1%80%D0%B8%D1%82%D0%B0" target="_blank">Справка</a></p>
				</div>
			</div>
		</div>
';
?>

<head>
	<?php echo $head; ?>
</head>
<body>
	<header>
		<?php echo $headerContent; ?>
	</header>

	<div class="main">
			<?php echo $mainContent; ?>
	</div>	

	<footer>
		<?php echo $footerContent; ?>
	</footer>
</body>
</html>