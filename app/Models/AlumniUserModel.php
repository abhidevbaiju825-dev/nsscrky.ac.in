<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniUserModel extends Model
{
    protected $table            = 'alumni_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'email',
        'password_hash',
        'full_name',
        'phone',
        'dob',
        'gender',
        'blood_group',
        'passout_year',
        'address',
        'location',
        'profile_picture',
        'status',
        'approved_by',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
