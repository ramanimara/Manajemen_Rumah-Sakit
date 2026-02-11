<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Registration\AppointmentModel;
use Config\Database;

class Kedatangan extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        $appointments = $db->table('appointments')
            ->select('
                appointments.appointment_id,
                appointments.schedule_date,
                users.full_name AS patient_name,
                departments.name AS department_name
            ')
            ->join('patients', 'patients.patient_id = appointments.patient_id')
            ->join('users', 'users.user_id = patients.user_id')
            ->join('departments', 'departments.department_id = appointments.department_id')
            ->where('appointments.status', 'waiting')
            ->orderBy('appointments.created_at', 'ASC')
            ->get()
            ->getResultArray();

        return view('admin/kedatangan', [
            'title' => 'Kedatangan Pasien',
            'appointments' => $appointments
        ]);
    }

    public function konfirmasi($appointmentId)
    {
        $db = Database::connect();
        $db->transStart();

        // update appointment
        $db->table('appointments')
            ->where('appointment_id', $appointmentId)
            ->update(['status' => 'confirmed']);

        // generate nomor antrian
        $lastQueue = $db->table('queues')
            ->selectMax('queue_number')
            ->get()
            ->getRow();

        $queueNumber = ($lastQueue->queue_number ?? 0) + 1;

        $db->table('queues')->insert([
            'appointment_id' => $appointmentId,
            'queue_number'   => $queueNumber,
            'status'         => 'waiting'
        ]);

        $db->transComplete();

        return redirect()
            ->to('admin/kedatangan')
            ->with('success', 'Kedatangan pasien berhasil dikonfirmasi');
    }
}
