<?php
    require "FunctionLibrary.php";
    Logger();
?>


<!DOCTYPE html>
<html>
<meta charset="utf8">
<meta name="viewport", content="width=device-width, initial-scale=1.0">
<title>
    Потрясающе крутой сайт.
</title>

<body style="padding-left: 20px; padding-right: 20px;">
    <h1>
        Список статей:
    </h1>
    <div style="font-size: 17px;">
        <?php for ($i=0; $i < count($allArticles); $i++) : ?> 
            <a href="article.php?name=<?= $allArticles[$i]["name"]?>">
                <?=$allArticles[$i]["header"] ?> <br>
            </a>
        <?php endfor ?>
    </div>
</body>

<footer>
</footer>

</html>