<?php

namespace App\Models\Registration;

use CodeIgniter\Model;

class QueueModel extends Model
{
    protected $table = 'queues';
    protected $primaryKey = 'queue_id';

    protected $useTimestamps = false; // ⬅️ TAMBAHKAN INI

    protected $allowedFields = [
        'appointment_id',
        'queue_number',
        'status',
        'call_time'
    ];
}
