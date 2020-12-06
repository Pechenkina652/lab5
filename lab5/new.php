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
    <body>
    <?
    if(isset($_GET['Index'])){
        $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
        switch($index){
            case "Settlements":
                echo("<h2>Добавление населенного пункта:</h2>");
                echo("<form id='form' method='post' action='save_new.php'>");
                echo ("<table>");
                echo ("<tr>");
                echo ("<th>Наименование:</th>");
                echo ("<th><input name='punct_name' type='text' maxlength='60'/></th>");
                echo ("</tr>");
                echo ("<tr>");
                echo ("<th>Тип:</th>");
                echo ("<th><input name='punct_type' type='text' maxlength='60'/></th>");
                echo ("</tr>");
                echo ("<tr>");
                echo ("<th>Площадь:</th>");
                echo ("<th><input name='punct_area' type='text' maxlength='60'/></th>");
                echo ("</tr>");
                echo ("<tr>");
                echo ("<th>Население:</th>");
                echo ("<th><input name='punct_population' type='text' maxlength='9'/></th>");
                echo ("</tr>");
                echo ("<tr>");
                echo ("<th>Регион:</th>");
                echo ("<th><input name='punct_region' type='text' maxlength='9'/></th>");
                echo ("</tr>");
                echo ("<tr>");   
                echo("<input type='hidden' name='index' value='$index'>");
                echo ("<th><input type='submit' value='Внести запись'/></th>");      
                echo ("</tr>");
                echo ("</table>");
                echo("</form>");
            break;
            case "Chain":
                echo("<h2>Добавление сети магазинов</h2>");
                echo("<form id='form' method='post' action='save_new.php'>");
                echo ("<table>");
                echo ("<tr>");
                echo ("<th>Название:</th>");
                echo ("<th><input name='chain_name' type='text' maxlength='60'/></th>");
                echo ("</tr>");
                echo ("<tr>");
                echo ("<th>ИНН:</th>");
                echo ("<th><input name='chain_inn' type='number' min='100000000' max='999999999'/></th>");
                echo ("</tr>");
                echo("<input type='hidden' name='index' value='$index'>");
                echo ("<th><input type='submit' value='Внести запись'/></th>");      
                echo ("</tr>");
                echo ("</table>");
                echo("</form>");
            break;
            case "shops":
                echo("<h2>Добавление точки продажи</h2>");
                echo("<form id='form' method='post' action='save_new.php'>");
                $queryTab = "Chain";
                $query = "SELECT * FROM $database.$queryTab";
                $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                $id = "Chain";
                echo("<label for='$id'>Сеть магазинов: </label>");
                echo("<select id='$id' name='$id'>");
                echo("<option value=''></option>");
                while ($row=mysqli_fetch_array($result)){
                    echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                    
                }
                echo("</select><br><br>");
                        
                $queryTab = "Settlements";
                $query = "SELECT * FROM $database.$queryTab";
                $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                $id = "Settlements";
                echo("<label for='$id'>Населенный пункт: </label>");
                echo("<select id='$id' name='$id'>");
                echo("<option value=''></option>");
                while ($row=mysqli_fetch_array($result)){
                    echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                }
                echo("</select><br><br>");
                echo("Объём продаж: <input name='shops_volume' type='number' min='1' max='999999' /><br><br>");
                echo("Баланс: <input name='shops_balance' type='number' min='1' max='999999' /><br><br>");
                echo("ФИО директора: <input name='shops_fio' type='text' maxlength='60' /> <br><br>");
                echo("Адрес: <input name='shops_address' type='text' maxlength='100' /> <br><br>");
                echo("<input type='hidden' name='index' value='$index'>");
                echo("<input type='submit' value='Внести запись'/>");
                echo("</form>");
            break;
        }
    }
	?>
	</body>
</html>