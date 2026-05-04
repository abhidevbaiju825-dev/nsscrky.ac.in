<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniActivityModel extends Model
{
    protected $table            = 'alumni_activities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'title',
        'description',
        'image_url',
        'activity_date',
        'created_at',
    ];

    protected $useTimestamps = false;
}
