<?require_once 'engine/class/table.php';?>
<?php
require_once 'connection.php';
?>
<!doctype html>
<html>
	<head>
        <meta charset="utf-8">
        <title>
            Печенкина А.В.
        </title>
	</head>
	<style>
	th, td{
		padding: 10px;
	}
	th{
		background:#ff9c78; 
		
	}
	td{
	    background:#ffebe8;
	}
    A:link {
        text-decoration: none; 
        font-weight: bold;
        color: #781000;
    } 
    A:visited { 
        text-decoration: none; 
        font-weight: bold;
        color: #781000;
    } 
    A:active { 
        text-decoration: none; 
        font-weight: bold;
        color: #781000;
    }
    A:hover {
        font-weight: bold;
        text-decoration: underline;
        color: #781000;
    } 
    </style>
    <body>
        <?
            echo("<div>");
            $queryTab = "Settlements";
            $headText = "Населенные пункты:";
            $arrayTitle = array("ID", "Наименование", "Тип", "Площадь", "Население", "Регион");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='new.php?Index="."Settlements"."'> Добавить населенный пункт</a> </div>");
            echo("</div>");
            
            $queryTab = "Chain";
            $headText = "Сети магазинов:";
            $arrayTitle = array("ID", "Название", "ИНН");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='new.php?Index="."Chain"."'> Добавить сеть магазинов</a> </div>");
            echo("</div>");
            
            $queryTab = "shops_view";
            $headText = "Точки продаж:";
            $arrayTitle = array("ID", "Сеть магазинов", "Населенный пукнт", "Объём продаж", "Баланс", "ФИО директора", "Адрес");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<a href='new.php?Index="."shops"."'> Добавить точку продаж</a>");
            echo("<br><br>");
            echo("<a href='gen_pdf.php'> PDF файл </a>");
            echo("///");
            echo("<a href='gen_xls.php'> XLS файл </a>");
        ?>
    </body>
</html>