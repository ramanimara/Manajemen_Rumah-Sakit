<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kedatangan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['title'] = 'Kedatangan Pasien';

        $data['patients'] = $db->table('appointments a')
            ->select('
                a.appointment_id,
                u.full_name AS patient_name,
                d.name AS department_name,
                a.status,
                a.created_at
            ')
            ->join('patients p', 'p.patient_id = a.patient_id')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('departments d', 'd.department_id = a.department_id')
            ->whereIn('a.status', ['waiting', 'confirmed'])
            ->orderBy('a.created_at', 'ASC')
            ->get()
            ->getResultArray();

        return view('admin/kedatangan', $data);
    }

    public function confirm($id)
    {
        $db = \Config\Database::connect();

        $db->table('appointments')
            ->where('appointment_id', $id)
            ->update(['status' => 'confirmed']);

        return redirect()->to('/admin/kedatangan')
            ->with('success', 'Pasien berhasil dikonfirmasi datang');
    }
}
