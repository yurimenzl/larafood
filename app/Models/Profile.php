<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Permission not linked with this profile
     *
     * @return void
     */
    public function permissions_available($filter = null)
    {
        $permissions = Permission::whereNotIn('id', function ($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("profile_id={$this->id}");
        })->where(function ($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $permissions;
    }
}
