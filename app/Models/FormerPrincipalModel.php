<?php
namespace App\Models;

use CodeIgniter\Model;

class FormerPrincipalModel extends Model
{
    protected $table = '_former_principal';
    protected $primaryKey = '_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        '_name',
        '_from_date',
        '_to_date',
        '_imgloc'
    ];

    protected $useTimestamps = false;

    /**
     * Get all former principals ordered by from_date descending (most recent first)
     */
    public function getAll()
    {
        return $this->orderBy('_from_date', 'DESC')->findAll();
    }
}
