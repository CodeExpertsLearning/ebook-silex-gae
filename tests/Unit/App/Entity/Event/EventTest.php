<?php
namespace CodeExperts\App\Entity;

use CodeExperts\App\TestCase;
use CodeExperts\App\Entity\Event;

class EventTest extends TestCase
{
    private $event;

    public function setUp()
    {
        $this->event = new Event();
    }

    public function assertPreConditions()
    {
        $this->assertTrue(
            class_exists($class = 'CodeExperts\App\Entity\Event'),
            'Class not found: ' . $class
        );
    }

    public function testIfSetterAndGetterHasWork()
    {
        $dataSet = [
            'title'       => "ZendCon",
            'description' => "ZEND PHP Developers Conference",
            'content'     => "ANY CONTENT",
            'venue'       => 'Las Vegas',
            'address'     => 'ANY_ADDRESS_HERE',
            'startDate'  => '2016-10-08',
            'endDate'    => '2016-10-12',
            'startTime'  => '09:00',
            'endTime'    => '18:00',
            'isActive'    => true,
            'createdAt'   => new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")),
            'updatedAt'   => new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")),
        ];

        foreach($dataSet as $key => $value)
        {
            $set = "set" . ucfirst($key);
            $set = $this->event->$set($value);

            $this->assertInstanceOf('CodeExperts\App\Entity\Event', $set);

            $get = "get" . ucfirst($key);

            $this->assertEquals($this->event->$get(), $dataSet[$key]);

        }
    }
}