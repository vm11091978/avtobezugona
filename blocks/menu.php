<?php
	$arr_url = array(); // это будет одномерный массив из url родительских элементов
	foreach ($data_bd2 as $elem) {
		$arr_url[] = $elem['url'];
	}

	//----Формирование меню-------------
	for ($i = 0; $i < count($data_bd); $i++) {
		$id = $data_bd[$i]['id'];
		$name = $data_bd[$i]['name'];
		$url = $data_bd[$i]['url'];

		if ($id == 2 AND $ftr == false) {
			$drop_menu = 'drop-menu';
			$statist = $stati;
		} else {
			$drop_menu = '';
			$statist = '';
		}
		
		if ($current_url == $url OR ($id == 2 AND in_array($current_url, $arr_url) == true)) {
			echo '<li class="'.$drop_menu.' '.$ftr.'activ"><a href="javascript:void(0)">'.$name.'</a>'.$statist.'</li>';
		} else {
			echo '<li class="'.$drop_menu.'"><a href="/'.$url.'">'.$name.'</a>'.$statist.'</li>';
		}
	}