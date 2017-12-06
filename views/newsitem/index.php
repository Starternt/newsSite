<?php include_once ROOT . '/views/layouts/header.php' ?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">News site</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Main page</a></li>
                        <li class=""><a href="#">Account</a></li>
                        <li class=""><a href="#">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 left">
                <div class="list-group">
                    <div class="categories">РАЗДЕЛЫ</div>
                    <?php $active = 1; ?>
                    <?php foreach ($categoryList as $category): ?>
                        <a href="<?php if ($category['id'] != 1) echo '/category/' . $category['id']; else echo '/'; ?> "
                           class="list-group-item <?php if ($category['id'] == $newsItem['category_id']) echo "active"; ?>">
                            <?php echo $category['name']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-3">
                <h2><?php echo $newsItem['title']; ?></h2>
            </div>
        </div>
    </div>

    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8 news-item item-container">
                <a href="<?php echo $pathToImage; ?>" data-lightbox="image-1">
                    <img src="<?php echo $pathToImage; ?>" alt="" width="100%" class="item-image-view">
                </a>
                <span><?php echo $newsItem['description']; ?></span>
                <div class="end-of-item-view">
                    <span class="news-theme-view">Новости по теме:</span>
                    <span><a href="#"
                             class="added-view pull-right">Добавлено: <?php echo $newsItem['add_date']; ?></a></span><br>
                    <div class="tag-fullreview-container">
                        <a href="<?php echo '/category/' . $newsItem['category_id']; ?>">
                            <button class="btn btn-default tag-item">
                                <?php echo $categoryForNewsItem; ?>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/footer.php' ?>