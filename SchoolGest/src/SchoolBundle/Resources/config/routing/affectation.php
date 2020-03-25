<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('affectation_index', new Route(
    '/',
    array('_controller' => 'SchoolBundle:Affectation:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('affectation_show', new Route(
    '/{id}/show',
    array('_controller' => 'SchoolBundle:Affectation:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('affectation_new', new Route(
    '/new',
    array('_controller' => 'SchoolBundle:Affectation:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('affectation_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'SchoolBundle:Affectation:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('affectation_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'SchoolBundle:Affectation:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
