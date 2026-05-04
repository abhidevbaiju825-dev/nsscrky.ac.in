<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniEducationModel extends Model
{
    protected $table            = 'alumni_education';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'alumni_id',
        'course',
        'institution',
        'from_year',
        'to_year'
    ];

    protected $useTimestamps = false;
}
