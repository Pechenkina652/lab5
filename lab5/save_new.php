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
		    if(isset($_POST['index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "Settlements":
                        if((isset($_POST['punct_name']))&&(isset($_POST['punct_type']))&&(isset($_POST['punct_area']))&&(isset($_POST['punct_population']))&&(isset($_POST['punct_region']))){
                            $punct_name = htmlentities(mysqli_real_escape_string($link, $_POST['punct_name']));
                            $punct_type = htmlentities(mysqli_real_escape_string($link, $_POST['punct_type']));
                            $punct_area = htmlentities(mysqli_real_escape_string($link, $_POST['punct_area']));
                            $punct_population = htmlentities(mysqli_real_escape_string($link, $_POST['punct_population']));
                            $punct_region = htmlentities(mysqli_real_escape_string($link, $_POST['punct_region']));
                            $query = "INSERT INTO $database.$index (id_punct, punct_name, punct_type, punct_area, punct_population, punct_region) VALUES (NULL, '$punct_name', '$punct_type', '$punct_area', '$punct_population', '$punct_region')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                 header('location:index.php'); 
                                //echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "Chain":
                        if((isset($_POST['chain_name']))&&(isset($_POST['chain_inn']))){
                            $chain_name = htmlentities(mysqli_real_escape_string($link, $_POST['chain_name']));
                            $chain_inn = htmlentities(mysqli_real_escape_string($link, $_POST['chain_inn']));
                            $query = "INSERT INTO $database.$index (id_chain, chain_name, chain_inn) VALUES (NULL, '$chain_name', '$chain_inn')";
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
                            $query = "INSERT INTO $database.$index (id_shop, id_chain, id_punct, shops_volume, shops_balance, shops_fio, shops_address) VALUES (NULL, '$Chain', '$Settlements', '$shops_volume', '$shops_balance', '$shops_fio', '$shops_address')";
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