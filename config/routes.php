<?php
return array(

    'news/([0-9]+)' => 'news/view/$1',
    'category/([0-9]+)/page-([0-9]+)' => 'category/index/$1/$1',

    'catalog/view/([0-9]+])' => 'catalog/view/$1',
    'catalog' => 'catalog/index', //actionIndex in CatalogController
    '' => 'site/index'
);