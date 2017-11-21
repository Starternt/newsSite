<?php
return array(

    'news/([0-9]+)' => 'news/view/$1',


    'category/([0-9]+)/page-([0-9]+)' => 'category/index/$1/$1',
    'category/([0-9]+)' => 'category/index/$1',

    'page-([0-9]+)' => 'site/index/$1',
    '' => 'site/index'
);