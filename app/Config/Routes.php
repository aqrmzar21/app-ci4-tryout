<?php

use CodeIgniter\Router\RouteCollection;

/**
 $routes->get('/lic', function () {
   echo 'hello beb';
   });
   $routes->get('/coba/dex', 'Coba::dex');
   $routes->get('/coba', 'Coba::about');
   $routes->get('/pages/contact', 'Home::contact');
   $routes->get('/coba/(:any)', 'Coba::about/$1');
   // INFO:  any = angka, karakter, alfa; num = anka only, alpha = alfabet;, segment = apapun selain slas; alphanum = angka dan alfabet only
   $routes->get('/public', 'Coba::about');
   // cara membuat database dengan pemanfaatan routes
   $routes->get('create-db', function() {
     $forge = \Config\Database::forge();
     if ($forge->createDatabase('komik')) {
       echo 'Database created!';
   }
   });
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
// $routes->get('/pages/about', 'Home::about');
$routes->get('/pages/about', 'Orang::index');
// $routes->post('/pages/about/(:segment)', 'Orang::index/$1');

$routes->post('/pages/about', 'Orang::index');

$routes->get('/komik/create', 'Komik::create');
$routes->post('/komik/save', 'Komik::save');
// $routes->post('/komik/update', 'Komik::update');
$routes->post('/komik/update/(:num)', 'Komik::update/$1');
$routes->get('/komik/edit/(:segment)', 'Komik::edit/$1');
// $routes->post('/komik/delete', 'Komik::delete');
$routes->delete('/komik/(:num)', 'Komik::delete/$1');

$routes->get('/komik', 'Komik::index');
$routes->get('/komik/(:any)', 'Komik::detail/$1');
$routes->get('/pages/contact', 'Komik::comic');
$routes->get('/pages/contact/(:segment)', 'Komik::detail/$1');
