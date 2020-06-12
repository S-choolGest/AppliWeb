<?php

namespace BibliothequeBundle\EventListener;

use ADesigns\CalendarBundle\Entity\EventEntity;
use ADesigns\CalendarBundle\Event\CalendarEvent;
use BibliothequeBundle\Entity\Emprunt;
use Doctrine\ORM\EntityManager;

class CalendarEventListener
{
    private $entityManager;

   /* public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }*/

    public function loadEvents(CalendarEvent $calendarEvent, $emprunts)
    {
        $startDate = $calendarEvent->getStartDatetime();
        $endDate = $calendarEvent->getEndDatetime();

        // The original request so you can get filters from the calendar
        // Use the filter in your query for example

        $request = $calendarEvent->getRequest();
        $filter = $request->get('filter');


        // load events using your custom logic here,
        // for instance, retrieving events from a repository

        /*$emprunts = $this->entityManager->getRepository('BibliothequeBundle:Emprunt')
            ->createQueryBuilder('emprunts')
            ->where('emprunts.event_datetime BETWEEN :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
            ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'))
            ->getQuery()->getResult();*/

        // $companyEvents and $companyEvent in this example
        // represent entities from your database, NOT instances of EventEntity
        // within this bundle.
        //
        // Create EventEntity instances and populate it's properties with data
        // from your own entities/database values.

        foreach($emprunts as $emprunt) {

            $eventEntity = new EventEntity("Livre à rendre : ", $emprunt->getDatedebut(), $emprunt->getDatefin());
            // create an event with a start/end time, or an all day event
            if ($emprunt->getAllDayEvent() === false) {
                $eventEntity = new EventEntity("Emprunt", $emprunt->getDatedebut(), $emprunt->getDatefin());
            } else {
                $eventEntity = new EventEntity("emprunt", $emprunt->getDatedebut(), null, true);
            }

            //optional calendar event settings
            $eventEntity->setAllDay(true); // default is false, set to true if this is an all day event
            $eventEntity->setBgColor('#FF0000'); //set the background color of the event's label
            $eventEntity->setFgColor('#FFFFFF'); //set the foreground color of the event's label
            $eventEntity->setUrl('http://www.google.com'); // url to send user to when event label is clicked
            $eventEntity->setCssClass('my-custom-class'); // a custom class you may want to apply to event labels

            //finally, add the event to the CalendarEvent for displaying on the calendar
            $calendarEvent->addEvent($eventEntity);
        }
    }
}