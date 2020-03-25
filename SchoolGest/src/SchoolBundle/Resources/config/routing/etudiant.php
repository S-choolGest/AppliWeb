<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('etudiant_index', new Route(
    '/',
    array('_controller' => 'SchoolBundle:Etudiant:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('etudiant_show', new Route(
    '/{id}/show',
    array('_controller' => 'SchoolBundle:Etudiant:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('etudiant_new', new Route(
    '/new',
    array('_controller' => 'SchoolBundle:Etudiant:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('etudiant_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'SchoolBundle:Etudiant:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('etudiant_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'SchoolBundle:Etudiant:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
