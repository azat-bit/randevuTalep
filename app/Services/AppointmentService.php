<?php

namespace App\Services;

use App\Repository\AppointmentRepository;

class AppointmentService
{
    protected $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function getAllAppointments()
    {
        return $this->appointmentRepository->all();
    }

    public function createAppointment(array $data)
    {
        return $this->appointmentRepository->create($data);
    }

    // Diğer iş mantığı metotları
}
