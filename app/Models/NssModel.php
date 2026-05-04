<?php
namespace App\Models;
use CodeIgniter\Model;

class NssModel extends Model
{
    protected $table = '_nss_incharges';
    protected $primaryKey = '_id';
    protected $allowedFields = [
        '_name', '_designation', '_details', '_imgloc', '_academic_year'
    ];
}
