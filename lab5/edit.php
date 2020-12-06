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
		if((isset($_GET['id']))&&(isset($_GET['query']))){
		    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
            $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
            switch($index){
                case "Settlements":
                    $query = "SELECT * FROM $database.$index WHERE id_punct='$id'";
                    $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                    $rows = array();
                    echo("<h3>Изменение внесенных данных</h3>");
                    echo("<form id='form' method='post' action='save_edit.php'>");
                    while ($row=mysqli_fetch_array($result)){
                        $rows = $row;
                    }
                    echo("<input type='hidden' name='id' value='$id'>");
                    echo ("<table>");
                    echo ("<tr>");
                    echo ("<th>Наименование:</th>");
                    echo ("<th><input name='punct_name' type='text' maxlength='60' value='$rows[1]'/></th>");
                    echo ("</tr>");
                    echo ("<tr>");
                    echo ("<th>Тип:</th>");
                    echo ("<th><input name='punct_type' type='text' maxlength='60' value='$rows[2]'/></th>");
                    echo ("</tr>");
                    echo ("<tr>");
                    echo ("<th>Площадь:</th>");
                    echo ("<th><input name='punct_area' type='text' maxlength='60' value='$rows[3]'/></th>");
                    echo ("</tr>");
                    echo ("<tr>");
                    echo ("<th>Население:</th>");
                    echo ("<th><input name='punct_population' type='text' maxlength='9' value='$rows[4]'/></th>");
                    echo ("</tr>");
                    echo ("<tr>");
                    echo ("<th>Регион:</th>");
                    echo ("<th><input name='punct_region' type='text' maxlength='60' value='$rows[5]'/></th>");
                    echo ("</tr>");
                    echo ("<tr>");   
                    echo("<input type='hidden' name='index' value='$index'>");
                    echo ("<th><input type='submit' value='Изменить запись'/></th>");      
                    echo ("</tr>");
                    echo ("</table>");
                    echo("</form>");
                break;
                case "Chain":
                    $index = "Chain";
                    $query = "SELECT * FROM $database.$index WHERE id_chain='$id'";
                    $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                    $rows1 = array();
                    echo("<h3>Изменение внесенных данных</h3>");
                    echo("<form id='form' method='post' action='save_edit.php'>");
                    while ($row=mysqli_fetch_array($result)){
                        $rows1 = $row;
                    }
                    echo("<input type='hidden' name='id' value='$id'>");
                    echo ("<table>");
                    echo ("<tr>");
                    echo ("<th>Название:</th>");
                    echo ("<th><input name='chain_name' type='text' maxlength='60' value='$rows1[1]'/></th>");
                    echo ("</tr>");
                    echo ("<tr>");
                    echo ("<th>ИНН:</th>");
                    echo ("<th><input name='chain_inn' type='number' min='100000000' max='999999999' value='$rows1[2]'/></th>");
                    echo ("</tr>");
                    echo("<input type='hidden' name='index' value='$index'>");
                    echo ("<th><input type='submit' value='Изменить запись'/></th>");      
                    echo ("</tr>");
                    echo ("</table>");
                    echo("</form>");
                break;
                case "shops_view":
                    $index = "shops";
                    $query = "SELECT * FROM $database.$index WHERE id_shop='$id'";
                    $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                    $rws = array();
                    echo("<h3>Изменение внесенных данных</h3>");
                    echo("<form id='form' method='post' action='save_edit.php'>");
                    while ($row=mysqli_fetch_array($result)){
                        $rws = $row;
                    }
                    echo("<input type='hidden' name='id' value='$id'>");
                    $queryTab = "Chain";
                    $query = "SELECT * FROM $database.$queryTab";
                    $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                    $id = "Chain";
                    echo("<label for='$id'>Сеть магазинов: </label>");
                    echo("<select id='$id' name='$id'>");
                    echo("<option value=''></option>");
                    while ($row=mysqli_fetch_array($result)){
                        if($rws[1]==$row[0]){
                            echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                        } else{
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
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
                        if($rws[2]==$row[0]){
                            echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                        } else{
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                    }
                    echo("</select><br><br>");
                    echo("Объём продаж: <input name='shops_volume' type='number' min='1' max='999999' value='$rws[3]' /><br><br>");
                    echo("Баланс: <input name='shops_balance' type='number' min='1' max='999999' value='$rws[4]' /><br><br>");
                    echo("ФИО директора: <input name='shops_fio' type='text' maxlength='60' value='$rws[5]' /> <br><br>");
                    echo("Адрес: <input name='shops_address' type='text' maxlength='100' value='$rws[6]' /> <br><br>");
                    echo("<input type='hidden' name='index' value='$index'>");
                    echo("<input type='submit' value='Изменить запись'/> <br>");
                    echo("</form>");
                    echo("</fieldset>");
                break;
            }
		}
		?>
	</body>
</html>