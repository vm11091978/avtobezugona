<?php
	require_once "blocks/connect.php";

	//----Функция вывода всех строк таблицы MySQL-------------
	function getAll($table, $parent_id) {
		global $link;

		// Выберем содержание базы данных:
		$query = "SELECT * FROM `$table` WHERE parent_id = $parent_id";

		// Функция Mysqli_query выполняет запрос к базе данных MySQL:
		if (!$result = mysqli_query($link, $query)) {
			die ('При извлечении записей возникла ошибка: '.$mysqli->errno.' - '.$mysqli->error);
		}
		// или так:	$result = mysqli_query($link, $query) or die(mysqli_error($link));

		// Преобразуем то, что отдала нам база в нормальный массив PHP $database:
		for ($array = array(); $row = mysqli_fetch_assoc($result); $array[] = $row);

		return $array;
	}

	// Получение данных для динамических страниц
	$current_url = trim(strrchr($_SERVER['REQUEST_URI'], '/'), '/'); // так мы получаем в переменную только часть url,
		// следующую за последним слешем, в отличие от варианта $current_url = substr($_SERVER['REQUEST_URI'], 1);
	$data_bd = getAll('pages', 0); // выберем из БД родительские элементы в переменную-массив
	$data_bd2 = getAll('pages', 2); // выберем из БД дочерние элементы переменную-массив

	// Узнаем значения title, description и contentblock для конкретного url из БД 'pages'
	$query = "SELECT * FROM pages WHERE url = '$current_url'"; // 
	$result = mysqli_query($link, $query) or die(mysqli_error($link)); // это объект
	$row = mysqli_fetch_assoc($result); // а это уже одномерный массив
	$title = $row['title']; // получим элемент с ключом 'title'
	$description = $row['description']; // получим элемент с ключом 'description'
	$contentblock = $row['contentblock']; // получим элемент с ключом 'contentblock'

	if (!file_exists("content/$contentblock.php")) {
		header("Location: /page_404.php"); //Редирект на страницу 404
		exit; //Прекращение выполнения текущего скрипта
	}

	// Сформируем подменю для пункта "Статистика угонов" и контент для соответствующей страницы
	$stati = "<ul>\n";
	for ($j = 0; $j < count($data_bd2); $j++) {
		$name2 = $data_bd2[$j]['name'];
		$url2 = $data_bd2[$j]['url'];
		$stati .= '<li><a href="'.$url2.'">'.$name2.'</a></li>'."\n";
	}
	$stati .= "</ul>\n";
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="<?=$description?>">
    <link type="image/x-icon" rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <?php
                require_once "blocks/header.php"
            ?>
			
            <nav class="menu">
                <ul>
					<?php
						require "blocks/menu.php";
					?>
                </ul>
            </nav>
        </header>

        <section>
            <?php
                require_once "blocks/section.php"
            ?>
        </section>
        <div class="content-block">
            <main>
                <?php
					if (file_exists("content/$contentblock.php")) {
						require_once "content/$contentblock.php";
					} else {
						header("Location: /page_404.php"); //Редирект на страницу 404
						exit; //Прекращение выполнения текущего скрипта
					}
                ?>
            </main>
            <aside>
                <?php
                    require_once "blocks/aside.php"
                ?>
            </aside>
        </div>

        <footer>
            <div class="color"></div>
            <nav class="ftr-menu">
                <ul>
					<?php
						$ftr = "ftr-";
						require "blocks/menu.php";
					?>
                </ul>
            </nav>
            <?php
                require_once "blocks/footer.php"
            ?>
        </footer>
    </div>

    <script src="js/script.js"></script>
</body>
</html>