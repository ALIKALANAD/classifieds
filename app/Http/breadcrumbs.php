<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('/'));
});

Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    if ($category->parent_category) {
        $breadcrumbs->parent('category', $category->parent_category);
    } else {
        $breadcrumbs->parent('home');
    }
    $breadcrumbs->push($category->name, route('category.show', $category->id));
});

Breadcrumbs::register('post', function ($breadcrumbs, $category, $post) {
    $breadcrumbs->parent('category', $category);
    $breadcrumbs->push($post->title, route('category.post.show', [$category->id, $post->id]));
});