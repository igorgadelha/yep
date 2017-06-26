<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Restaurantes
Breadcrumbs::register('restaurants', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Restaurantes', route('restaurants.index'));
});

Breadcrumbs::register('restaurants.create', function($breadcrumbs)
{
    $breadcrumbs->parent('restaurants');
    $breadcrumbs->push('Novo', route('restaurants.create'));
});

Breadcrumbs::register('restaurants.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('restaurants');
    $breadcrumbs->push('Editar', route( 'restaurants.edit', $id ));
});

Breadcrumbs::register('restaurants.itens', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('restaurants');
    $breadcrumbs->push('Produtos', route('restaurants.itens', $id ));
});
// Fim Restaurantes

// Home > Categorias
Breadcrumbs::register('categories', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Categorias de produto', route('categories.index'));
});

Breadcrumbs::register('categories.create', function($breadcrumbs)
{
    $breadcrumbs->parent('categories');
    $breadcrumbs->push('Novo', route('categories.create'));
});

Breadcrumbs::register('categories.edit', function($breadcrumbs, $data)
{
    $breadcrumbs->parent('categories');
    $breadcrumbs->push('Editar '. $data->name, route('categories.edit', $data->id ) );
});

// Fim Restaurantes


Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('general', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});
