<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
// use Spatie\Permission\Models\Role as SpatieRole;

class Role extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];
     public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }
}
