<?php
Error_reporting(E_ALL);
if (isset($_FILES['filename']['tmp_name']) == true){
	$file = $_FILES['filename']['tmp_name'];
}
if (isset($_FILES['filename']['name']) == true){
	$filename = $_FILES['filename']['name'];
}
if (!empty($file)) {
	ini_set('memory_limit', '32M');
	$maxsize = "100000000";
	$extentions = array( "txt", "json");
	$size = filesize ($_FILES['filename']['tmp_name']);
	$type = strtolower(substr($filename, 1+strrpos($filename,".")));
	$new_name = 'filename -'.time().'.'.$type;
	if($size > $maxsize) {
		echo "Файл больше 100 мб. Уменьшите размер вашего файла или загрузите другой. <br><a href='' onClick=window.close();>Закрыть окно</a>";
	}
	elseif(!in_array($type,$extentions)) {
		echo ' <b>Файл имеет недопустимое расширение</b>. Допустимыми являются форматы "txt" и "json". <br>';
	}
	else {
		if (copy($file, "uploads/".$filename)) {
			echo "Файл " . $filename . " загружен!";
		}
		else echo "Файл НЕ был загружен.";
	}
}

echo "<h1>Загруженные тесты:</h1>";
echo '<br />';
echo '<br />';
$dir    = 'uploads';
$files = scandir($dir);

echo '<br />';
foreach ($files as $key => $fileOne) {
	if ($key > 1) {
		echo $fileOne.'<br />';
	}
}
echo '<br />';
echo '<br />';
echo '<br />';
echo "<a href='admin.php'>Загрузить тест</a>";
echo '<br />';
echo "<a href='test.php?numTest=0'>Выбрать и пройти тест</a>";
echo '<br />';
?>