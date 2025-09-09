<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Akses extends SpatiePermission
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'permissions';

    protected $guarded = ['id'];


}