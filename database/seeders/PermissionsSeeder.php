<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $permissionsList = [

            'users show',
            'users create',
            'users edit',
            'users print',
            'users delete',

            'employees show',
            'employees create',
            'employees edit',
            'employees delete',

            'roles show',
            'roles create',
            'roles edit',
            'roles delete',

            'categories show',
            'categories create',
            'categories edit',
            'categories delete',

            'visits show',
            'visits create',
            'visits edit',
            'visits delete',

            'sliders show',
            'sliders create',
            'sliders edit',
            'sliders delete',

            'services show',
            'services create',
            'services edit',
            'services delete',

            'posts show',
            'posts create',
            'posts edit',
            'posts delete',

            'ads show',
            'ads create',
            'ads edit',
            'ads delete',

            'pages show',
            'pages create',
            'pages edit',
            'pages delete',

            'prescriptions show',
            'prescriptions create',
            'prescriptions edit',
            'prescriptions delete',

            'analyses show',
            'analyses create',
            'analyses edit',
            'analyses delete',

            'consultations show',
            'consultations create',
            'consultations edit',
            'consultations delete',

            'reservations show',
            'reservations create',
            'reservations edit',
            'reservations delete',

            'revenues show',
            'revenues create',
            'revenues edit',
            'revenues delete',

            'expenses show',
            'expenses create',
            'expenses edit',
            'expenses delete',

            'insurances show',
            'insurances create',
            'insurances edit',
            'insurances delete',

            'menus show',
            'menus create',
            'menus edit',
            'menus delete',

            'statistics show',
            'statistics create',
            'statistics edit',
            'statistics delete',

            'applicants show',
            'applicants delete',

            'contacts show',
            'contacts delete',

            'subscribes show',
            'subscribes delete',

//            'notifications show',
            'settings show',

        ];
        $roles = [
            'Admin' => $permissionsList,
            'Administrator' => $permissionsList,
            'Doctor' => [],
            'Nurse' => [],
            'Employee' => [],
            'Patient' => [],
            'Secretarial' => [],
        ];

        foreach ($roles as $role => $permissions) {
            $Role = Role::findOrCreate($role);
            foreach ($permissions as $permission) {
                Permission::findOrCreate($permission);
                $Role->syncPermissions(Permission::whereIn('name', $permissions)->get());
            }
        }
    }
}
