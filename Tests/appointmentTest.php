<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\DbSession;
use App\Models\Appointment;


class appointmentTest extends TestCase
{
    private $database;

    public function initDb(): void
    {
        $database = new DbSession();
        $database->mysql->query("DELETE FROM `appointment`");
        $database->mysql->query("ALTER TABLE `appointment` AUTO_INCREMENT = 1");
        $this->database = $database;
    }

    public function setUp(): void
    {
        $this->initDb();
    }
    
    public function test_appointment_is_saved()
    {
        $this->setUp();
        $appointment = new Appointment("Leah","duda php", "17.05.2021", 1);
        $appointment->save("Leah", "duda php");
        $result = $appointment::all();

        $this->assertEquals(1, count($result));

    }

    public function test_get_all_appointmnets()
    {
        $this->setUp();
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Anya','mevoamata');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Armando','ayua sergi');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Abdulha','no me sale');");
  

        $result = Appointment::all();

        $this->assertEquals(3, count($result));
    }

    public function test_find_appointment_by_id()
    {
        $this->setUp();
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Anya','mevoamata');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Armando','ayua sergi');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Abdulha','no me sale');");

        $appointmentToFind = Appointment::findById(3);
        $result = $appointmentToFind->getName();

        $this->assertEquals('Abdulha', $result);


    }

    public function test_appointment_is_deleted()
    {
        $this->setUp();
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Anya','mevoamata');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Armando','ayua sergi');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Abdulha','no me sale');");
  

        $appointmentdelete = Appointment::findById(1);
        $appointmentdelete->delete();

        $result = count(Appointment::all());

        $this->assertEquals(2,$result);
    }

    public function test_appointment_is_updated(){
        $this->setUp();
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Anya','mevoamata');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Armando','ayua sergi');");
        $this->database->mysql->query("INSERT INTO `appointment` (`name`, `Topic`) VALUES ('Abdulha','no me sale');");

        $appointmentToUpdate = Appointment::findById(2);
        $appointmentToUpdate->changeTopic('no puedo mas con el server');
        $appointmentToUpdate->Update();
        $result = $appointmentToUpdate->getTopic();
        
        $this->assertEquals('no puedo mas con el server', $result);


    }
}