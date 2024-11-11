<?php 
    include "path.php";
    include "app/database/db.php";

    // Погинация
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 4;
    $offset = $limit * ($page - 1);
    $total_pages = ceil(countRow('news') / $limit);
    
    $posts = selectAll('news', $limit, $offset);
    $last_post = selectFirst('news');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <!-- header_START-->
            <?php include("app/include/header.php");?>
        <!-- header_END-->
        <main class="main">
            <section class="top" style="background-image: url('<?=BASE_URL . '/assets/images/' . $last_post['image']?>'); background-repeat: no-repeat; background-size: 100% auto; background-position: center;">
                <div class="container">
                    <div class="top__inner" style="">
                        <h1 class="top-title"><?=$last_post['title'];?></h1>
                        <p class="top-text"><?=strip_tags($last_post['announce']);?></p>
                    </div>
                </div>
            </section>
            <section class="news">
                <div class="container">
                    <h2 class="news-title">НОВОСТИ</h2>
                    <div class="news__inner">
                        <ul class="news__list">
                            <?php foreach($posts as $post): ?>
                            <li class="news__item">
                                <a href="<?php echo BASE_URL . 'work_news.php?id=' . $post['id'];?>">
                                    <p class="new__item-date"><?= printDate($post['date'], "d.m.Y")?></p>
                                    <h3 class="new__item-title"><?=$post['title']; ?></h3>
                                    <p class="new__item-text"><?=strip_tags($post['announce']);?></p>
                                    <a class="new__item-btn" href="<?php echo BASE_URL . 'work_news.php?id=' . $post['id'];?>">Подробнее →</a>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- pagination_START-->
            <?php include("app/include/pagination.php");?>
            <!-- pagination_END-->
        </main>
        <!-- footer_START-->
        <?php include("app/include/footer.php");?>
        <!-- footer_END-->
    </div>
</body>
</html>