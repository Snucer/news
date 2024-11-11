<?php 
include("path.php");
include SITE_ROOT . "/app/database/db.php";

$post = selectOne('news', ['id' => $_GET['id']]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/work_news_style.css">
</head>
<body>
    <div class="wrapper">
        <!-- header_START-->
        <?php include("app/include/header.php");?>
        <!-- header_END-->
        <main class="main__work_news">
            <div class="container">
                <div class="news__inner">
                    <p class="news__inner-way"><a href="<?= BASE_URL ?>">Главная</a> /  <span><?=$post['title']?></span></p>
                    <h1 class="news__inner-title"><?=$post['title']?></h1>
                    <p class="news__inner-item-date"><?= printDate($post['date'], "d.m.Y")?></p>
                    <div class="news__inner-item">
                        <div class="news__inner-item-content">
                            <h2 class="news__inner-item-secondtitle"><?=strip_tags($post['announce'])?></h2>
                            <div class="news__inner-item-text"><?=nl2br($post['content'])?></div>
                        </div>
                        <div class="news__inner-item-img">
                            <img src="<?=BASE_URL . '/assets/images/' . $post['image']?>" alt="#">
                        </div>
                    </div>
                    <a href="<?=BASE_URL?>" class="news__inner-item-btn">← НАЗАД К НОВОСТЯМ</a>
                </div>
            </div>
        </main>
        <!-- footer_START-->
        <?php include("app/include/footer.php");?>
        <!-- footer_END-->
    </div>
</body>
</html>