<?php

namespace App\Permission\Traits;

use App\Permission\Models\Role;

trait UserTrait {


    //es: desde aqui
    //en: from here

    public function roles(){

        return $this->belongsToMany(Role::class)->withTimesTamps();

    }

    public function havePermission($permission){

        foreach ($this->roles as $role ) {

            if ($role['full-access'] =='yes' ) {
                return true;
            }

            foreach ($role->permissions as $perm) {

                if ($perm->slug == $permission ) {
                    return true;
                }
            }



        }

        return false;
    }


}
