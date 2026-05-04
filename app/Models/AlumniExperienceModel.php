<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniExperienceModel extends Model
{
    protected $table            = 'alumni_experience';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'alumni_id',
        'company',
        'designation',
        'description',
        'from_year',
        'to_year'
    ];

    protected $useTimestamps = false;
}
