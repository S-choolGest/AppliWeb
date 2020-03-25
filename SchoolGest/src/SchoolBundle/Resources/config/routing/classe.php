<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('classe_index', new Route(
    '/',
    array('_controller' => 'SchoolBundle:Classe:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('classe_show', new Route(
    '/{idClasse}/show',
    array('_controller' => 'SchoolBundle:Classe:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('classe_new', new Route(
    '/new',
    array('_controller' => 'SchoolBundle:Classe:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('classe_edit', new Route(
    '/{idClasse}/edit',
    array('_controller' => 'SchoolBundle:Classe:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('classe_delete', new Route(
    '/{idClasse}/delete',
    array('_controller' => 'SchoolBundle:Classe:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
