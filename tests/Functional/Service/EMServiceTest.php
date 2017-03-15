<?php
namespace CodeExperts\Functional\Service;

use CodeExperts\App\FunctionalTestCase;
use CodeExperts\App\Service\EMService;

class EMServiceTest extends FunctionalTestCase
{
    public function testInsertANewUser()
    {
        $this->createUser();

        $user = $this->getEntityManagerTest()->getRepository("CodeExperts\\App\\Entity\\User")
                     ->find(1);

        $this->assertEquals("Son Goku", $user->getName());
        $this->assertEquals("goku@dbz.jp", $user->getEmail());
        $this->assertEquals("goku", $user->getUsername());
        $this->assertEquals(true, $user->getIsActive());
    }

    public function testUpdateANewUser()
    {
        $this->createUser();

        $user = $this->getEntityManagerTest()->getRepository("CodeExperts\\App\\Entity\\User")
            ->find(1);

        $user->setName("Son Goku Edited");

        $emService = new EMService($this->getEntityManagerTest());
        $emService->update($user);

        $user = $this->getEntityManagerTest()->getRepository("CodeExperts\\App\\Entity\\User")
            ->find(1);

        $this->assertEquals("Son Goku Edited", $user->getName());
        $this->assertEquals("goku@dbz.jp", $user->getEmail());
        $this->assertEquals("goku", $user->getUsername());
        $this->assertEquals(true, $user->getIsActive());
    }

    public function testInsertANewEvent()
    {
        $this->createEvent();

        $event = $this->getEntityManagerTest()->getRepository("CodeExperts\\App\\Entity\\Event")
            ->find(1);

        $this->assertEquals("8.PHP - Fórum Nacional de Profissionais PHP", $event->getTitle());
        $this->assertEquals("Content set test", $event->getContent());
        $this->assertEquals("Event Description", $event->getDescription());
        $this->assertEquals("São Luis - MA", $event->getVenue());
        $this->assertEquals("Address test", $event->getAddress());
        $this->assertEquals("2016-11-14", $event->getStartDate());
        $this->assertEquals("2016-11-14", $event->getEndDate());
        $this->assertEquals("09:00", $event->getStartTime());
        $this->assertEquals("20:00", $event->getEndTime());
        $this->assertEquals(true, $event->getIsActive());

    }

    public function testUpdateEvent()
    {
        $this->createEvent();

        $event = $this->getEntityManagerTest()->getRepository("CodeExperts\\App\\Entity\\Event")
            ->find(1);

        $event->setTitle("8.PHP - Title Edited!");
        $event->setStartDate("2016-11-12");

        $emService = new EMService($this->getEntityManagerTest());
        $emService->update($event);

        $event = $this->getEntityManagerTest()->getRepository("CodeExperts\\App\\Entity\\Event")
            ->find(1);

        $this->assertEquals("8.PHP - Title Edited!", $event->getTitle());
        $this->assertEquals("2016-11-12", $event->getStartDate());
    }
}