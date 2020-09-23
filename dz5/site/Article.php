<?php
    require "FunctionLibrary.php";
    Logger();
    $fileName = $_GET["name"];
    $articleData = GetArticle($fileName);
?>



<!DOCTYPE html>
<html>
<meta charset="utf8">
<meta name="viewport", content="width=device-width, initial-scale=1.0">
<title>
    Статья: 
    <?= $articleData["header"];?>
</title>

<header style="text-align: center;">
    <h1> <?=$articleData["header"];?> </h1>
</header>

<div style="padding-left: 25px; padding-right: 25px; font-size: 18px;">
    <?=$articleData["content"];?>
</div>

<footer>
    <div style="font-size: 34px; text-align: center; position: fixed; bottom: 45px; left: 0; width: 100%;">
        <a href="index.php">На главную</a>
    </div>
</footer>

</html>

