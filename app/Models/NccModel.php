<?php
namespace App\Models;
use CodeIgniter\Model;

class NccModel extends Model
{
    protected $table = '_ncc_incharge_member';
    protected $primaryKey = '_ncc_id';
    protected $allowedFields = [
        '_name', '_designation', '_type', '_addedby', '_profile_pic', '_created_at', '_academic_year'
    ];
}
