<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table            = 'enquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'name',
        'phone',
        'email',
        'message',
        'status',
        'created_at'
    ];

    protected $useTimestamps = false; // We will handle created_at manually or set true and update allowedFields
}
