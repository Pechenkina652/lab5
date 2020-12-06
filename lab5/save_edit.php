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
            if((isset($_POST['id']))&&(isset($_POST['index']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "Settlements":
                        if((isset($_POST['punct_name']))&&(isset($_POST['punct_type']))&&(isset($_POST['punct_area']))&&(isset($_POST['punct_population']))&&(isset($_POST['punct_region']))){
                            $punct_name = htmlentities(mysqli_real_escape_string($link, $_POST['punct_name']));
                            $punct_type = htmlentities(mysqli_real_escape_string($link, $_POST['punct_type']));
                            $punct_area = htmlentities(mysqli_real_escape_string($link, $_POST['punct_area']));
                            $punct_population = htmlentities(mysqli_real_escape_string($link, $_POST['punct_population']));
                            $punct_region = htmlentities(mysqli_real_escape_string($link, $_POST['punct_region']));
                            $query = "UPDATE $database.$index SET punct_name = '$punct_name', punct_type = '$punct_type', punct_area = '$punct_area', punct_population = '$punct_population', punct_region = '$punct_region' WHERE $database.$index.id_punct = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                header('location:index.php'); 
                              //  echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "Chain":
                        if((isset($_POST['chain_name']))&&(isset($_POST['chain_inn']))){
                            $chain_name = htmlentities(mysqli_real_escape_string($link, $_POST['chain_name']));
                            $chain_inn = htmlentities(mysqli_real_escape_string($link, $_POST['chain_inn']));
                            $query = "UPDATE $database.$index SET chain_name = '$chain_name', chain_inn = '$chain_inn' WHERE $database.$index.id_chain = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                               header('location:index.php'); 
                                //echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                     case "shops":
                         if((isset($_POST['Chain']))&&(isset($_POST['Settlements']))&&(isset($_POST['shops_volume']))&&(isset($_POST['shops_balance']))&&(isset($_POST['shops_fio']))&&(isset($_POST['shops_address']))){
                            $Chain = htmlentities(mysqli_real_escape_string($link, $_POST['Chain']));
                            $Settlements = htmlentities(mysqli_real_escape_string($link, $_POST['Settlements']));
                            $shops_volume = htmlentities(mysqli_real_escape_string($link, $_POST['shops_volume']));
                            $shops_balance = htmlentities(mysqli_real_escape_string($link, $_POST['shops_balance']));
                            $shops_fio = htmlentities(mysqli_real_escape_string($link, $_POST['shops_fio']));
                            $shops_address = htmlentities(mysqli_real_escape_string($link, $_POST['shops_address']));
                            $query = "UPDATE $database.$index SET id_chain = '$Chain', id_punct='$Settlements', shops_volume='$shops_volume', shops_balance='$shops_balance', shops_fio='$shops_fio', shops_address='$shops_address' WHERE $database.$index.id_shop = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                header('location:index.php'); 
                                //echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                }
            }
        ?>
	</body>
</html>