<?php

namespace App\Controllers\Pasien;

<<<<<<< HEAD
use App\Controllers\BaseController;

class Pasien extends BaseController
=======
use CodeIgniter\Controller;

class Pasien extends Controller
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /* ===============================
     * HELPER: ambil patient_id dari session
     * =============================== */
    private function getPatientId()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return null;
        }

        $patient = $this->db->table('patients')
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        return $patient ? $patient->patient_id : null;
    }

    /* ===============================
     * 1. DASHBOARD PASIEN
     * =============================== */
    public function index()
    {
        if (!session()->get('user_id')) {
<<<<<<< HEAD
            return redirect()->to('/');
        }

        return view('Pasien/dashboard');
    }

    // Alias untuk index jika di routes dipanggil /dashboard
    public function dashboard()
    {
        return $this->index();
=======
            return redirect()->to('/login');
        }

        return view('pasien/dashboard');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
    }

    /* ===============================
     * 2. FORM BOOKING
     * =============================== */
    public function booking()
    {
        $patientId = $this->getPatientId();

        if (!$patientId) {
<<<<<<< HEAD
            return redirect()->to('/');
=======
            return redirect()->to('/login');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
        }

        $data['departments'] = $this->db
            ->table('departments')
            ->get()
            ->getResult();

<<<<<<< HEAD
        return view('Pasien/booking', $data);
    }

    /* ===============================
     * 2b. AJAX: AMBIL DOKTER & JADWAL
     * =============================== */

    // Dipanggil saat milih Poliklinik
    public function getDoctorsByDept($deptId)
    {
        $doctors = $this->db->table('doctors')
            ->select('doctors.doctor_id, users.full_name') // Ambil full_name dari tabel users
            ->join('users', 'users.user_id = doctors.user_id') // Gabungkan tabel doctors dan users
            ->where('doctors.department_id', $deptId)
            ->get()
            ->getResult();

        return $this->response->setJSON($doctors);
    }

    // Dipanggil saat milih Dokter
    public function getSchedulesByDoctor($doctorId)
    {
        // Pastikan nama tabel kamu 'doctor_schedules'
        $schedules = $this->db->table('doctor_schedules')
            ->where('doctor_id', $doctorId)
            ->get()
            ->getResult();

        return $this->response->setJSON($schedules);
    }

    /* ===============================
     * 2c. SIMPAN BOOKING
=======
        return view('pasien/booking', $data);
    }

    /* ===============================
     * 2b. SIMPAN BOOKING
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
     * =============================== */
    public function store()
    {
        $patientId = $this->getPatientId();

        if (!$patientId) {
<<<<<<< HEAD
            return redirect()->to('/');
=======
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $departmentId = $this->request->getPost('department_id');

        // 🔍 Ambil 1 dokter berdasarkan poli
        $doctor = $db->table('doctors')
            ->where('department_id', $departmentId)
            ->get()
            ->getRow();

        if (!$doctor) {
            return redirect()->back()->with('error', 'Dokter untuk poli ini belum tersedia.');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
        }

        $data = [
            'patient_id'    => $patientId,
            'schedule_date' => $this->request->getPost('schedule_date'),
<<<<<<< HEAD
            'department_id' => $this->request->getPost('department_id'),
            'doctor_id'     => $this->request->getPost('doctor_id'),
            'schedule_id'   => $this->request->getPost('schedule_id'),
            'status'        => 'waiting'
        ];

        // Validasi simpel
        if (empty($data['doctor_id']) || empty($data['schedule_id'])) {
            return redirect()->back()->with('error', 'Mohon pilih dokter dan jadwal terlebih dahulu.');
        }

        $this->db->table('appointments')->insert($data);
=======
            'department_id' => $departmentId,
            'doctor_id'     => $doctor->doctor_id,
            'status'        => 'waiting'
        ];

        $db->table('appointments')->insert($data);
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909

        return redirect()->to('/pasien/riwayat')->with('success', 'Booking berhasil dibuat!');
    }


    /* ===============================
     * 3. RIWAYAT APPOINTMENT
     * =============================== */
    public function riwayat()
    {
        $patientId = $this->getPatientId();

        if (!$patientId) {
<<<<<<< HEAD
            return redirect()->to('/');
=======
            return redirect()->to('/login');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
        }

        $data['appointments'] = $this->db->query("
            SELECT 
                a.appointment_id,
                a.schedule_date,
                a.status,
                d.name AS department
            FROM appointments a
            JOIN departments d ON d.department_id = a.department_id
            WHERE a.patient_id = ?
            ORDER BY a.schedule_date DESC
        ", [$patientId])->getResult();

<<<<<<< HEAD
        return view('Pasien/riwayat', $data);
=======
        return view('pasien/riwayat', $data);
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
    }

    /* ===============================
     * 4. MONITOR ANTRIAN
     * =============================== */
    public function antrian()
    {
        $patientId = $this->getPatientId();

        if (!$patientId) {
<<<<<<< HEAD
            return redirect()->to('/');
=======
            return redirect()->to('/login');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
        }

        $data['queues'] = $this->db->query("
            SELECT 
                q.queue_number,
                q.status,
                a.schedule_date,
<<<<<<< HEAD
                d.name AS department,
                a.appointment_id
=======
                d.name AS department
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
            FROM queues q
            JOIN appointments a ON a.appointment_id = q.appointment_id
            JOIN departments d ON d.department_id = a.department_id
            WHERE a.patient_id = ?
              AND q.status != 'done'
            ORDER BY q.queue_id DESC
        ", [$patientId])->getResult();

<<<<<<< HEAD
        return view('Pasien/antrian', $data);
=======
        return view('pasien/antrian', $data);
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
    }

    /* ===============================
     * 5. DETAIL PEMERIKSAAN
     * =============================== */
    public function detail_pemeriksaan($appointment_id)
    {
        $patientId = $this->getPatientId();

        if (!$patientId) {
<<<<<<< HEAD
            return redirect()->to('/');
=======
            return redirect()->to('/login');
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
        }

        // pemeriksaan
        $data['pemeriksaan'] = $this->db
            ->table('examinations')
            ->where('appointment_id', $appointment_id)
            ->get()
            ->getRow();

        // resep
        if ($data['pemeriksaan']) {
            $data['resep'] = $this->db->query("
                SELECT 
<<<<<<< HEAD
                    m.name,
=======
                    m.name AS nama_obat,
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
                    pi.dosage,
                    pi.quantity,
                    pi.instructions
                FROM prescriptions p
                JOIN prescription_items pi ON p.prescription_id = pi.prescription_id
                JOIN medicines m ON pi.medicine_id = m.medicine_id
                WHERE p.exam_id = ?
            ", [$data['pemeriksaan']->exam_id])->getResult();
        } else {
            $data['resep'] = [];
        }

        // pembayaran
        $data['pembayaran'] = $this->db
            ->table('payments')
            ->where('appointment_id', $appointment_id)
            ->get()
            ->getRow();

<<<<<<< HEAD
        return view('Pasien/detail_pemeriksaan', $data);
    }
}
=======
        return view('pasien/detail_pemeriksaan', $data);
    }
}
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
