<?php
    define("SPLITTER", "%%%X%%%");
    define("ARTICLES_PATH", $_SERVER['DOCUMENT_ROOT']. "/site/articles/");
    define("LOG_FILE_PATH", $SERVER['DOCUMENT_ROOT']. "logs/");
    define("HISTORY_FILE_NAME", "history_log.csv");

    $articleDirectoryFiles = scandir(ARTICLES_PATH);
    $allArticles = GetArticlesList($articleDirectoryFiles);

    function GetArticlesList($filePath)
    {
        $result = [];

        for ($i=0; $i < count($filePath); $i++) { 
            if (($filePath[$i] == '.' or $filePath[$i] == '..') == false)
            {
                $result[] = GetArticle($filePath[$i]);
            }
        }
        return $result;
    }

    function GetArticle($articleName)
    {
        $fileContent = file_get_contents(ARTICLES_PATH. $articleName);
        $headerAndContent = explode(SPLITTER, $fileContent);
        $result = [
            "name" => $articleName,
            "header" => $headerAndContent[0],
            "content" => $headerAndContent[1]
        ];
        return $result;
    }

    function Logger()
    {
        $connectionInfo = [
            $_SERVER["REMOTE_ADDR"],
            $_SERVER["REQUEST_URI"],
            "\"". date("d-m-y h:i:s"). "\""
        ];
        WriteToCSV($connectionInfo, LOG_FILE_PATH. HISTORY_FILE_NAME);
    }

    function WriteToCSV($info, $filePath)
    {
        $resultString = "";
        for ($i=0; $i < count($info); $i++) { 
            $resultString .= $info[$i];
            if ($i + 1 != count($info))
            {
                $resultString .= ",";
            }
        }
        $resultString .= "\n";
        $fileHandler = fopen($filePath, 'a');
        fwrite($fileHandler, $resultString);
        fclose($fileHandler);
    }
