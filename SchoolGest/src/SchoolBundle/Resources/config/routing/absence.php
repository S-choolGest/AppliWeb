<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('absence_index', new Route(
    '/',
    array('_controller' => 'SchoolBundle:Absence:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('absence_show', new Route(
    '/{id}/show',
    array('_controller' => 'SchoolBundle:Absence:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('absence_new', new Route(
    '/new',
    array('_controller' => 'SchoolBundle:Absence:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('absence_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'SchoolBundle:Absence:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('absence_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'SchoolBundle:Absence:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
