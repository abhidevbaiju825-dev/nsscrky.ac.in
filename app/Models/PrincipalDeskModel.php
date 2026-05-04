<?php
namespace App\Models;

use CodeIgniter\Model;

class PrincipalDeskModel extends Model
{
    protected $table = '_principal_desk';
    protected $primaryKey = '_id';
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    // "go for best" - we'll allow standard fields + extended ones if we want to add them in DB later
    protected $allowedFields = [
        '_name', 
        '_qualification', 
        '_message', 
        '_email', 
        '_phone', 
        '_about', 
        '_imgloc'
    ];

    protected $useTimestamps = false; // Legacy table doesn't have created_at/updated_at unless we add it
    
    /**
     * Get the current active principal profile (assumes single row usually)
     */
    public function getActivePrincipal()
    {
        return $this->orderBy('_id', 'DESC')->first();
    }
}
