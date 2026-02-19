<?php

namespace App\Controllers\Apoteker;

<<<<<<< HEAD
use App\Controllers\BaseController;
=======
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
use App\Models\Pharmacy\PrescriptionModel;
use App\Models\Pharmacy\PrescriptionItemModel;
use App\Models\Pharmacy\MedicineModel;
use App\Models\Pharmacy\MedicinePickupModel;
use App\Models\Cashier\PaymentModel;
<<<<<<< HEAD
=======
use App\Controllers\BaseController;
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909

class Apoteker extends BaseController
{
    protected $prescription;
    protected $item;
    protected $medicine;
    protected $pickup;
    protected $payment;

    public function __construct()
    {
        $this->prescription = new PrescriptionModel();
<<<<<<< HEAD
        $this->item         = new PrescriptionItemModel();
        $this->medicine     = new MedicineModel();
        $this->pickup       = new MedicinePickupModel();
        $this->payment      = new PaymentModel();
    }

=======
        $this->item = new PrescriptionItemModel();
        $this->medicine = new MedicineModel();
        $this->pickup = new MedicinePickupModel();
        $this->payment = new PaymentModel();
    }

    /**
     * daftar resep yang sudah dibayar
     */
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
    public function index()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('prescriptions');
        $builder->select('
<<<<<<< HEAD
            prescriptions.prescription_id,
            users.full_name as patient_name,
            examinations.diagnosis,
            payments.payment_status,
            medicine_pickups.pickup_id
        ');

=======
        prescriptions.prescription_id, 
        users.full_name as patient_name,
        medicine_pickups.pickup_id
    '); 
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
        $builder->join('examinations', 'examinations.exam_id = prescriptions.exam_id');
        $builder->join('appointments', 'appointments.appointment_id = examinations.appointment_id');
        $builder->join('patients', 'patients.patient_id = appointments.patient_id');
        $builder->join('users', 'users.user_id = patients.user_id');
        $builder->join('payments', 'payments.appointment_id = appointments.appointment_id');
<<<<<<< HEAD
        $builder->join('medicine_pickups', 'medicine_pickups.prescription_id = prescriptions.prescription_id', 'left');

        $builder->where('payments.payment_status', 'paid');
        $builder->groupBy('prescriptions.prescription_id');
=======

        // Join ke tabel pengambilan
        $builder->join('medicine_pickups', 'medicine_pickups.prescription_id = prescriptions.prescription_id', 'left');

        // Filter 1: Harus sudah dibayar
        $builder->where('payments.payment_status', 'paid');

        // Filter 2: HANYA yang BELUM ada di tabel medicine_pickups
        $builder->where('medicine_pickups.pickup_id IS NULL');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909

        $resep = $builder->get()->getResultArray();

        return view('apoteker/index', [
            'resep' => $resep,
            'title' => 'Dashboard Apoteker'
        ]);
    }

<<<<<<< HEAD
    public function getDetail($id)
    {
        $items = $this->item
            ->select('prescription_items.quantity, medicines.name')
=======
    /**
     * detail resep
     */
    public function detail($id)
    {
        $data['items'] = $this->item
            ->select('prescription_items.*, medicines.name')
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
            ->join('medicines', 'medicines.medicine_id = prescription_items.medicine_id')
            ->where('prescription_id', $id)
            ->findAll();

<<<<<<< HEAD
        return $this->response->setJSON($items);
    }

    public function pickup($id)
    {
        $db = \Config\Database::connect();

        // Cegah double pickup
        if ($this->pickup->where('prescription_id', $id)->first()) {
            return redirect()->back()->with('error', 'Resep sudah diambil sebelumnya.');
        }

        $db->transStart();
=======
        $data['prescription_id'] = $id;

        return view('apoteker/detail', $data);
    }

    /**
     * konfirmasi pengambilan obat
     */
    public function pickup($id)
    {
        $db = \Config\Database::connect();
        $db->transStart(); // Mulai proteksi
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909

        $items = $this->item->where('prescription_id', $id)->findAll();

        foreach ($items as $item) {
<<<<<<< HEAD
            $this->medicine
                ->set('stock', 'stock - ' . $item['quantity'], false)
=======
            $this->medicine->set('stock', 'stock - ' . $item['quantity'], false)
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
                ->where('medicine_id', $item['medicine_id'])
                ->update();
        }

        $this->pickup->insert([
            'prescription_id' => $id,
            'pickup_date'     => date('Y-m-d H:i:s'),
            'picked_by'       => session()->get('user_id')
        ]);

<<<<<<< HEAD
        $db->transComplete();
=======
        $db->transComplete(); // Selesaikan
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal memproses pengambilan obat.');
        }

<<<<<<< HEAD
        return redirect()->to('/apoteker')
                         ->with('success', 'Obat berhasil diserahkan.');
=======
        return redirect()->to('/apoteker')->with('success', 'Obat berhasil diserahkan');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
    }
}
