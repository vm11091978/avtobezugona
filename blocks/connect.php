<?php // файл connect.php
	//----Данные для подключения-------------
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "avtobezugona";

	//----Процедурный стиль-------------
	// Подключение к базе данных
	$link = mysqli_connect($host, $user, $password, $database);

	// Проверка соединения (конструкция die выполняет функцию вывода на экран сообщения об ошибке)
	if(!$link) {
		die('Соединение не удалось: Код ошибки: '.mysqli_connect_errno().' - '.mysqli_connect_error());
	}

	// Установка кодировки соединения
	if(!mysqli_set_charset($link, "utf8")) {
		die('Ошибка при загрузке набора символов utf8: '.mysqli_errno($link).' - '.mysqli_error($link));
	}