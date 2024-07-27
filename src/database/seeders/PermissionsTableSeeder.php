<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'frontend_access',
            ],
            [
                'id'    => 18,
                'title' => 'footer_create',
            ],
            [
                'id'    => 19,
                'title' => 'footer_edit',
            ],
            [
                'id'    => 20,
                'title' => 'footer_show',
            ],
            [
                'id'    => 21,
                'title' => 'footer_delete',
            ],
            [
                'id'    => 22,
                'title' => 'footer_access',
            ],
            [
                'id'    => 23,
                'title' => 'home_access',
            ],
            [
                'id'    => 24,
                'title' => 'about_create',
            ],
            [
                'id'    => 25,
                'title' => 'about_edit',
            ],
            [
                'id'    => 26,
                'title' => 'about_show',
            ],
            [
                'id'    => 27,
                'title' => 'about_delete',
            ],
            [
                'id'    => 28,
                'title' => 'about_access',
            ],
            [
                'id'    => 29,
                'title' => 'order_create',
            ],
            [
                'id'    => 30,
                'title' => 'order_edit',
            ],
            [
                'id'    => 31,
                'title' => 'order_show',
            ],
            [
                'id'    => 32,
                'title' => 'order_delete',
            ],
            [
                'id'    => 33,
                'title' => 'order_access',
            ],
            [
                'id'    => 34,
                'title' => 'benner_create',
            ],
            [
                'id'    => 35,
                'title' => 'benner_edit',
            ],
            [
                'id'    => 36,
                'title' => 'benner_show',
            ],
            [
                'id'    => 37,
                'title' => 'benner_delete',
            ],
            [
                'id'    => 38,
                'title' => 'benner_access',
            ],
            [
                'id'    => 39,
                'title' => 'fasilitas_create',
            ],
            [
                'id'    => 40,
                'title' => 'fasilitas_edit',
            ],
            [
                'id'    => 41,
                'title' => 'fasilitas_show',
            ],
            [
                'id'    => 42,
                'title' => 'fasilitas_delete',
            ],
            [
                'id'    => 43,
                'title' => 'fasilitas_access',
            ],
            [
                'id'    => 44,
                'title' => 'fn_b_access',
            ],
            [
                'id'    => 45,
                'title' => 'table_create',
            ],
            [
                'id'    => 46,
                'title' => 'table_edit',
            ],
            [
                'id'    => 47,
                'title' => 'table_show',
            ],
            [
                'id'    => 48,
                'title' => 'table_delete',
            ],
            [
                'id'    => 49,
                'title' => 'table_access',
            ],
            [
                'id'    => 50,
                'title' => 'reservation_create',
            ],
            [
                'id'    => 51,
                'title' => 'reservation_edit',
            ],
            [
                'id'    => 52,
                'title' => 'reservation_show',
            ],
            [
                'id'    => 53,
                'title' => 'reservation_delete',
            ],
            [
                'id'    => 54,
                'title' => 'reservation_access',
            ],
            [
                'id'    => 55,
                'title' => 'takeaway_create',
            ],
            [
                'id'    => 56,
                'title' => 'takeaway_edit',
            ],
            [
                'id'    => 57,
                'title' => 'takeaway_show',
            ],
            [
                'id'    => 58,
                'title' => 'takeaway_delete',
            ],
            [
                'id'    => 59,
                'title' => 'takeaway_access',
            ],
            [
                'id'    => 60,
                'title' => 'product_create',
            ],
            [
                'id'    => 61,
                'title' => 'product_edit',
            ],
            [
                'id'    => 62,
                'title' => 'product_show',
            ],
            [
                'id'    => 63,
                'title' => 'product_delete',
            ],
            [
                'id'    => 64,
                'title' => 'product_access',
            ],
            [
                'id'    => 65,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 66,
                'title' => 'aboutweb_access',
            ],
            [
                'id'    => 67,
                'title' => 'menu_access',
            ],
            
        ];

        Permission::insert($permissions);
    }
}
