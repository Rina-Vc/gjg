<?php
    include('./includes/session.php');
    if(!$_SESSION['flag']) header('Location: /signin/');
/**
 * @var $db
 */
include_once('./includes/db.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная страница</title>
</head>
<body>
<div id="wrapper">
    <?php require "header.php" ?>

    <div id="sidebar">
        <h5 style="margin: 0">версия 1.1.2</h5>
        <h3>Категории услуг</h3>
        <p width="10" height="10">
            <?php

            $conn = new mysqli('localhost', 'root', '', 'photo_center');

            $sql =  "SELECT category_id, `name` FROM categories";
            if ($result = $conn->query($sql)){
                echo"<table class='table'>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td style='padding: 10px'><a href='index.php?category=".$row["category_id"]."'>" . $row["name"] . "</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                $result->free();
            }
            $conn->close();
            ?>
            <p>
                <a href="/">Сбросить фильтр</a>
            </p>
        </p>
    </div>
    <div class="content">
        <ul class="books-list">

            <?php
            if(isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page=1;
            };
            $start_from = ($page-1) * 9;
            $conn = new mysqli('localhost', 'root', '', 'photo_center');
            $sql = isset($_GET['category']) ? "SELECT service_id, title, price FROM services WHERE category_id = '".$_GET['category']."' ORDER BY title ASC LIMIT $start_from, 9" : "SELECT service_id, title, price FROM services ORDER BY title ASC LIMIT $start_from, 9";
            $rs_result = mysqli_query($db, $sql);
            if($result = $conn->query($sql)){
                foreach ($result as $row){
                    ?>
                    <li>
                        <div class="card">
<!--                            --><?php
//                                if($row['image'] != NULL && $row['image'] != ''){
//                            ?>
<!--                                <p>-->
<!--                                    <img src="--><?//= $row['image'] ?><!--" alt="Обложка">-->
<!--                                </p>-->
<!--                            --><?php //} ?>
                            <h3>
                                <?= $row['title'] ?>
                            </h3>
                            <p>
                                <?= $row['price'] ?>
                            </p>
                            <form style="margin-bottom: 50px" action="/cart/cartAdd.php" method="post">
                                <input type="hidden" name="service_id" value='<?= $row['service_id'] ?>'>
                                <button class="form_auth_button" type="submit" onclick="changeText(this)" data-show="true" ></button>
                            </form>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
            <?php
                $sql = "SELECT COUNT(title) FROM services";
                $rs_result = mysqli_query($db, $sql);
                $row = mysqli_fetch_row($rs_result);
                $total_records = $row[0];
                $total_pages = ceil($total_records / 9);
                if(!isset($_GET['category'])){
                    for ($i=1; $i<=$total_pages; $i++) {
                        echo "<a href='index.php?page=".$i."'/>".$i."</a>";
                    };
                }
            ?>

    </div>
</div>
</body>
</html>