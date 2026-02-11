<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    /* ======================================================
       LAPORAN PEMBAYARAN
    ====================================================== */
    public function pembayaran()
    {
        $db = \Config\Database::connect();

        $data['title'] = 'Laporan Pembayaran';

        $data['payments'] = $db->table('payments p')
            ->select('
                p.payment_id,
                u.full_name as patient_name,
                d.name as department_name,
                p.total_amount,
                p.payment_method,
                p.payment_status,
                p.payment_date
            ')
            ->join('appointments a', 'a.appointment_id = p.appointment_id')
            ->join('patients pt', 'pt.patient_id = a.patient_id')
            ->join('users u', 'u.user_id = pt.user_id')
            ->join('departments d', 'd.department_id = a.department_id')
            ->orderBy('p.payment_date', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/laporan_pembayaran', $data);
    }

    /* ======================================================
       LAPORAN PENGAMBILAN OBAT
    ====================================================== */
    public function pengambilanObat()
    {
        $db = \Config\Database::connect();

        $data['title'] = 'Laporan Pengambilan Obat';

        $data['data'] = $db->table('medicine_pickups mp')
            ->select('
                mp.pickup_id,
                mp.pickup_date,
                u.full_name AS pasien,
                d.name AS poli,
                doc.specialization,
                a.schedule_date
            ')
            ->join('prescriptions pr', 'pr.prescription_id = mp.prescription_id')
            ->join('examinations e', 'e.exam_id = pr.exam_id')
            ->join('appointments a', 'a.appointment_id = e.appointment_id')
            ->join('patients p', 'p.patient_id = a.patient_id')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('doctors doc', 'doc.doctor_id = e.doctor_id')
            ->join('departments d', 'd.department_id = doc.department_id')
            ->orderBy('mp.pickup_date', 'DESC')
            ->get()
            ->getResult();

        return view('admin/laporan_pengambilan_obat', $data);
    }

    /* ======================================================
       EXPORT EXCEL PEMBAYARAN
    ====================================================== */
    public function exportExcel()
    {
        $db = \Config\Database::connect();

        $payments = $db->table('payments p')
            ->select('
                u.full_name as patient_name,
                d.name as department_name,
                p.total_amount,
                p.payment_method,
                p.payment_status,
                p.payment_date
            ')
            ->join('appointments a', 'a.appointment_id = p.appointment_id')
            ->join('patients pt', 'pt.patient_id = a.patient_id')
            ->join('users u', 'u.user_id = pt.user_id')
            ->join('departments d', 'd.department_id = a.department_id')
            ->get()
            ->getResultArray();

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=laporan_pembayaran.xls");

        echo "Nama Pasien\tPoli\tTotal\tMetode\tStatus\tTanggal\n";

        foreach ($payments as $row) {
            echo $row['patient_name'] . "\t" .
                $row['department_name'] . "\t" .
                $row['total_amount'] . "\t" .
                $row['payment_method'] . "\t" .
                $row['payment_status'] . "\t" .
                $row['payment_date'] . "\n";
        }

        exit;
    }

    /* ======================================================
       EXPORT EXCEL PENGAMBILAN OBAT
    ====================================================== */
    public function exportPengambilanObat()
    {
        $db = \Config\Database::connect();

        $data = $db->query("
            SELECT 
                mp.pickup_date,
                u.full_name AS pasien,
                d.name AS poli,
                a.schedule_date
            FROM medicine_pickups mp
            JOIN prescriptions pr ON pr.prescription_id = mp.prescription_id
            JOIN examinations e ON e.exam_id = pr.exam_id
            JOIN appointments a ON a.appointment_id = e.appointment_id
            JOIN patients p ON p.patient_id = a.patient_id
            JOIN users u ON u.user_id = p.user_id
            JOIN doctors doc ON doc.doctor_id = e.doctor_id
            JOIN departments d ON d.department_id = doc.department_id
            ORDER BY mp.pickup_date DESC
        ")->getResultArray();

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=laporan_pengambilan_obat.xls");

        echo "Tanggal Pickup\tPasien\tPoli\tTanggal Periksa\n";

        foreach ($data as $row) {
            echo "{$row['pickup_date']}\t{$row['pasien']}\t{$row['poli']}\t{$row['schedule_date']}\n";
        }

        exit;
    }
}
