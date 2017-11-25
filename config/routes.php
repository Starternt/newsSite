<?php
return array(

    'news/([0-9]+)' => 'news/view/$1',

    'admin/category/edit/([0-9]+)' => 'adminCategory/edit/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category/add' => 'adminCategory/add',
    'admin/category' => 'adminCategory/index',

    'admin/news/edit/([0-9]+)' => 'adminNews/edit/$1',
    'admin/news/delete/([0-9]+)' => 'adminNews/delete/$1',
    'admin/news/view/([0-9]+)' => 'adminNews/view/$1',
    'admin/news/add' => 'adminNews/add',
    'admin/news' => 'adminNews/index',

    'admin/cabinet' => 'admin/index',
    'admin' => 'admin/login',

    'category/([0-9]+)/page-([0-9]+)' => 'category/index/$1/$1',
    'category/([0-9]+)' => 'category/index/$1',

    'page-([0-9]+)' => 'site/index/$1',
    'logout' => 'admin/logout',
    '' => 'site/index'
);