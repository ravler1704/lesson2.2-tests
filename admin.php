<h1>Загрузка тестов</h1>
<form action="list.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	<input type="file" name="filename" /><br /> 
	<input type="submit" value="Загрузить" /><br />
</form>
<br />
<a href="test.php?numTest=0">Выбрать и пройти тест</a>
<br />
<a href="list.php">Список тестов</a>
<br />

