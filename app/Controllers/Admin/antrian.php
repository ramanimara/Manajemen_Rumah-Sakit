<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Antrian extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['title'] = 'Antrian Pasien';

        $data['queues'] = $db->table('queues q')
            ->select('
                q.queue_number,
                q.status AS queue_status,
                a.appointment_id,
                u.full_name AS patient_name,
                d.name AS department_name
            ')
            ->join('appointments a', 'a.appointment_id = q.appointment_id')
            ->join('patients p', 'p.patient_id = a.patient_id')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('departments d', 'd.department_id = a.department_id')
            ->whereIn('q.status', ['waiting', 'called'])
            ->orderBy('q.queue_number', 'ASC')
            ->get()
            ->getResult();

        return view('admin/antrian', $data);
    }

    public function export()
    {
        $db = \Config\Database::connect();

        $data = $db->query("
        SELECT 
            q.queue_number,
            u.full_name AS patient_name,
            d.name AS department_name,
            q.queue_status
        FROM queues q
        JOIN appointments a ON a.appointment_id = q.appointment_id
        JOIN patients p ON p.patient_id = a.patient_id
        JOIN users u ON u.user_id = p.user_id
        JOIN departments d ON d.department_id = a.department_id
        ORDER BY q.queue_number ASC
    ")->getResultArray();

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=laporan_antrian.xls");

        echo "No Antrian\tNama Pasien\tPoli\tStatus\n";

        foreach ($data as $row) {
            echo $row['queue_number'] . "\t" .
                $row['patient_name'] . "\t" .
                $row['department_name'] . "\t" .
                $row['queue_status'] . "\n";
        }

        exit;
    }

    public function print()
    {
        $db = \Config\Database::connect();

        $data['queues'] = $db->query("
        SELECT 
            q.queue_number,
            u.full_name AS patient_name,
            d.name AS department_name,
            q.queue_status
        FROM queues q
        JOIN appointments a ON a.appointment_id = q.appointment_id
        JOIN patients p ON p.patient_id = a.patient_id
        JOIN users u ON u.user_id = p.user_id
        JOIN departments d ON d.department_id = a.department_id
        ORDER BY q.queue_number ASC
    ")->getResult();

        return view('admin/print_antrian', $data);
    }
}
