<?php

namespace App\Controllers;

use App\Logger\Log;
use App\Core\View;
use App\Models\Appointment;




class AppointmentController
{
    public function __construct()
    {
        if (isset($_GET["action"]) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "store")) {
            $this->store($_POST);
            return;
            
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "edit")) {
                $this->edit($_GET["id"]);
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "delete")) {
            $this->delete($_GET["id"]);
            return;
        }
        $this->index();
    }

    public function index(): void
    {
        $appointment = new Appointment();
        $appointments = $appointment->all();

        new View(
            "appointmentList",
            ["appointments" => $appointments,]
        );
    }

    public function create(): void
    {
        new View("createAppointment");
    }
    
    public function store(array $request): void 
    {   
        $newAppointment = new Appointment(); 
        $newAppointment->save($request["name"], $request["topic"]);
        $lastAppointment = Appointment::lastAppointment();
        $log = new Log("Create", "Created a new ticket",  $lastAppointment->getId());
        $log->LogInFile();

        $this->index();
    }
    public function edit($id):void 
    {
        $appointmentToEdit = Appointment::findById($id);
    
        new View(
            "editAppointments", 
            ["appointments" => $appointmentToEdit,]
        );
    }
    public function update(array $request, $id)
    {
        $appointmentToUpdate = Appointment::findById($id);
        $appointmentToUpdate->renameName($request["name"]);
        $appointmentToUpdate->changeTopic($request["topic"]);
        $appointmentToUpdate->Update();
        $log = new Log("Update", "Ticket updated", $id);
        $log->LogInFile();

        $this->index();
    }
    public function delete($id)
    {
        $newAppointment = new Appointment();
        $appointment = $newAppointment->findById($id);
        $appointment->Delete();
        $log = new Log("Delete", "Delete a ticket", $id);
        $log->LogInFile();

        $this->index();
    }
}
