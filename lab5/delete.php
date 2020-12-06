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
			if(isset($_GET['id'])&&isset($_GET['query'])){
                $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
                
                if($index=="Settlements"){
                    $index="Settlements";
                    $query = "DELETE FROM $database.$index WHERE id_punct='$id'";
                }
                if($index=="Chain"){
                    $index="Chain";
                    $query = "DELETE FROM $database.$index WHERE id_chain='$id'";
                }
                if($index=="shops_view"){
                    $index="shops";
                    $query = "DELETE FROM $database.$index WHERE id_shop='$id'";
                }
                
                $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                header("Location: index.php");
			}
		?>
	</body>
</html>
