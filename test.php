<?php
Error_reporting(E_ALL);
$numTest = htmlspecialchars($_GET["numTest"]);
$dir    = 'uploads';
$files = scandir($dir, 1);
echo "<h1>Тест № ".$numTest."</h1>";
echo "<br/>";
echo "<br/>";
$content = file_get_contents ('uploads/'.$files[$numTest].'');
$decodeData = json_decode ($content, true);
echo "<br/>";
echo "<br/>";
$countQuestions = count($decodeData);
?>

<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
echo '<form action="" method="POST">';
for ($i=0; $i<$countQuestions; $i++) {
	echo "<fieldset><legend>".$decodeData["$i"]["testQuestion"]."</legend>";
	$countTestAnswers = count($decodeData["$i"]["testAnswers"]);
	$wrightAnswers[] = ($decodeData["$i"]["wrightAnswer"]);

	for ($j=0; $j<$countTestAnswers; $j++) {
		echo '<label><input name="'.$i.'" type="radio" value="' . $decodeData["$i"]["testAnswers"][$j] . '">' . $decodeData["$i"]["testAnswers"][$j] . '</label>';
	}
	echo "</fieldset>";
}
echo '<input type="submit" value="Отправить"></form>';
echo "<br/>";
echo "<br/>";
echo "<br/>";

$result = 0;
for ($i=0; $i<$countQuestions; $i++) {
	if (!isset($_POST[$i])){
		echo "<br/>";
		echo "Ответьте на все вопросы и нажмите кнопку 'Отправить'";
		exit();
	}
	elseif ($wrightAnswers[$i] == $_POST[$i]) {
		$result = $result + 1;
	}
}
echo "Верных ответов: ".$result;
?>

<br />
<br />
<br />
<br />
<a href="admin.php">Загрузить тест</a>
<br />
<a href="list.php">Список тестов</a>
</body>
</html>
