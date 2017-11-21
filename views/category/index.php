<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News site</title>

    <!-- Bootstrap -->
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/template/css/style.css">



</head>
<body>
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
</nav><br><br><br>

<!--Categories-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 left">
            <div class="list-group">
                <div class="categories">РАЗДЕЛЫ</div>
                <?php $active = 1; ?>
                <?php foreach ($categoryList as $category): ?>
                    <a href="<?php if($category['id'] != 1) echo '/category/'.$category['id']; else echo '/';?>"
                       class="list-group-item <?php if($active == 1 && $category['id'] == 1) echo "active"; ?>">
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
            <h2>Главные новости</h2>
        </div>
    </div>
</div>

<?php foreach ($newsList as $news): ?>
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8 news-item item-container">
                <img src="/upload/img/1.jpeg" alt="" width="160px" class="item-image">
                <div class="container-fluid">
                    <b><h4 class="news-title"><?php echo $news['title']; ?></h4></b>
                    <span><?php echo $news['short_description']; ?></span>
                </div>
                <div class="end-of-item">
                    <span class="news-theme">Новости по теме:</span>
                    <span><a href="#" class="added">Добавлено: <?php echo $news['add_date']; ?></a></span><br>
                    <div class="tag-fullreview-container">
                        <a href="<?php echo '/category/'.$news['category_id'];?>"><button class="btn btn-default tag-item"><?php echo $categoryForNews[$news['id']]['name'];?></button></a>
                        <a href="<?php echo '/news/'.$news['id']; ?>"><button class="btn-link full-review">Полный обзор -></button></a>
                    </div>
                </div>

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
<?php endforeach; ?>
<div class="container">
    <div class="text-center">
        <?php echo $pagination->get(); ?>
    </div>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>