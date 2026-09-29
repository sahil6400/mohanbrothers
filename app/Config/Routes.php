<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('category/(:segment)', 'Category::view/$1');
$routes->get('category', 'Category::view/theory-of-machine-lab');
$routes->get('product/(:segment)', 'Product::view/$1');
$routes->get('product', 'Product::view/static-dynamic-balancing-apparatus');
$routes->post('enquiry', 'Enquiry::submit');

// Admin Panel Routes
$routes->group('admin', static function ($routes) {
    $routes->get('', 'Admin::index');
    $routes->get('login', 'Admin::login');
    $routes->post('login', 'Admin::attemptLogin');
    $routes->get('logout', 'Admin::logout');
    $routes->get('dashboard', 'Admin::dashboard');

    // Categories
    $routes->get('categories', 'Admin::categories');
    $routes->get('categories/create', 'Admin::createCategory');
    $routes->post('categories/store', 'Admin::storeCategory');
    $routes->get('categories/edit/(:segment)', 'Admin::editCategory/$1');
    $routes->post('categories/update/(:segment)', 'Admin::updateCategory/$1');
    $routes->post('categories/delete/(:segment)', 'Admin::deleteCategory/$1');

    // Products
    $routes->get('products', 'Admin::products');
    $routes->get('products/create', 'Admin::createProduct');
    $routes->post('products/store', 'Admin::storeProduct');
    $routes->get('products/edit/(:segment)', 'Admin::editProduct/$1');
    $routes->post('products/update/(:segment)', 'Admin::updateProduct/$1');
    $routes->post('products/delete/(:segment)', 'Admin::deleteProduct/$1');

    // Enquiries
    $routes->get('enquiries', 'Admin::enquiries');
    $routes->post('enquiries/update-status', 'Admin::updateEnquiryStatus');
    $routes->post('enquiries/delete/(:segment)', 'Admin::deleteEnquiry/$1');
    $routes->get('enquiries/export', 'Admin::exportEnquiries');
});
