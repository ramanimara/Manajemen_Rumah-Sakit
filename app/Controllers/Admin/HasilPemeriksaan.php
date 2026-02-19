<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HasilPemeriksaan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['title'] = 'Hasil Pemeriksaan';

        $data['results'] = $db->table('examinations e')
            ->select('
                e.exam_date,
                u_pasien.full_name AS patient_name,
                dpt.name AS department_name,
                u_dokter.full_name AS doctor_name,
                e.complaint,
                e.diagnosis,
                e.notes,
                a.status
            ')
            ->join('appointments a', 'a.appointment_id = e.appointment_id')
            ->join('patients p', 'p.patient_id = a.patient_id')
            ->join('users u_pasien', 'u_pasien.user_id = p.user_id')
            ->join('doctors d', 'd.doctor_id = e.doctor_id')
            ->join('users u_dokter', 'u_dokter.user_id = d.user_id')
            ->join('departments dpt', 'dpt.department_id = a.department_id')
            ->orderBy('e.exam_date', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/hasil_pemeriksaan', $data);
    }

    public function export()
    {
        $db = \Config\Database::connect();

        $results = $db->query("
            SELECT 
                e.exam_date,
                u_pasien.full_name AS patient_name,
                dpt.name AS department_name,
                u_dokter.full_name AS doctor_name,
                e.complaint,
                e.diagnosis,
                e.notes,
                a.status
            FROM examinations e
            JOIN appointments a ON a.appointment_id = e.appointment_id
            JOIN patients p ON p.patient_id = a.patient_id
            JOIN users u_pasien ON u_pasien.user_id = p.user_id
            JOIN doctors d ON d.doctor_id = e.doctor_id
            JOIN users u_dokter ON u_dokter.user_id = d.user_id
            JOIN departments dpt ON dpt.department_id = a.department_id
            ORDER BY e.exam_date DESC
        ")->getResultArray();

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=laporan_hasil_pemeriksaan.xls");

        echo "Tanggal\tPasien\tPoli\tDokter\tKeluhan\tDiagnosis\tCatatan\tStatus\n";

        foreach ($results as $row) {
            echo $row['exam_date'] . "\t" .
                $row['patient_name'] . "\t" .
                $row['department_name'] . "\t" .
                $row['doctor_name'] . "\t" .
                $row['complaint'] . "\t" .
                $row['diagnosis'] . "\t" .
                $row['notes'] . "\t" .
                $row['status'] . "\n";
        }

        exit;
    }

    public function print()
    {
        return $this->index();
    }
}
