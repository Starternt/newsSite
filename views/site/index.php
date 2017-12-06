<?php include_once ROOT . '/views/layouts/header.php' ?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">News site</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Главная страница</a></li>
                        <li class=""><a href="/admin">Вход в кабинет</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav><br><br><br>

    <!--Categories-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 left">
                <div class="list-group">
                    <div class="categories">РАЗДЕЛЫ</div>
                    <?php $active = 1; ?>
                    <?php foreach ($categoryList as $category): ?>
                        <a href="<?php if ($category['id'] != 1) echo '/category/' . $category['id']; ?>"
                           class="list-group-item <?php if ($active == 1 && $category['id'] == 1) echo "active"; ?>">
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
                <h2 style="display:inline-block;">Главные новости</h2>
                <ul class="sort-list-category">
                    <li class="sort-options"><a href="/">Без сортировки</a></li>
                    <li class="sort-options"><a href="?sort=asc">Дата добавения: старые</a></li>
                    <li class="sort-options"><a href="?sort=desc">Дата добавения: новые</a></li>
                </ul>
            </div>

        </div>
    </div>

<?php foreach ($newsList as $news): ?>
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8 news-item item-container">
                <a href="<?php echo '/news/' . $news['id']; ?>">
                    <img src="<?php echo $pathsToImages[$news['id']]['path']; ?>" alt="No image" width="160px"
                         class="item-image">
                </a>
                <div class="container-fluid">
                    <b><h4 class="news-title"><?php echo $news['title']; ?></h4></b>
                    <span><?php echo $news['short_description']; ?></span>
                </div>
                <div class="end-of-item">
                    <span class="news-theme">Новости по теме:</span>
                    <span><a href="#" class="added">Добавлено: <?php echo $news['add_date']; ?></a></span><br>
                    <div class="tag-fullreview-container">
                        <a href="<?php echo '/category/' . $news['category_id']; ?>">
                            <button class="btn btn-default tag-item"><?php echo $categoryForNews[$news['id']]['name']; ?></button>
                        </a>
                        <a href="<?php echo '/news/' . $news['id']; ?>">
                            <button class="btn-link full-review">Полный обзор -></button>
                        </a>
                    </div>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    <div class="container">
        <div class="text-center">
            <?php echo $pagination->get(); ?>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/footer.php' ?>