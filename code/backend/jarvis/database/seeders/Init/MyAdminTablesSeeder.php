<?php

namespace Database\Seeders\Init;

use App\Enums\RoleTypeEnum;
use App\Source\Role\RoleSlug;
use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Models\Menu;
use Dcat\Admin\Models\Permission;
use Dcat\Admin\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MyAdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Administrator::count() > 0) {
            return;
        }

        // create a user.
        Administrator::truncate();
        Administrator::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'name' => 'Administrator',
        ]);

        // create a role.
        Role::truncate();
        Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());

        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name' => 'All permission',
                'slug' => '*',
                'http_method' => '',
                'http_path' => '*',
            ],
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'http_method' => 'GET',
                'http_path' => '/',
            ],
            [
                'name' => 'Login',
                'slug' => 'auth.login',
                'http_method' => '',
                'http_path' => "/auth/login,/auth/logout,/auth/setting,/bind-google2fa*,/enable-google2fa*",
            ],
            [
                'name' => 'User setting',
                'slug' => 'auth.setting',
                'http_method' => 'GET,PUT,POST',
                'http_path' => '/auth/setting,/bind-google2fa*,/enable-google2fa*',
            ],
            [
                'name' => 'Auth management',
                'slug' => 'auth.management',
                'http_method' => '',
                'http_path' => "/auth/roles,/auth/permissions,/auth/menu",
            ],
            [
                'name' => 'Merchant management',
                'slug' => 'merchant.management',
                'http_method' => 'GET,POST',
                'http_path' => "/merchant/*",
            ],
            [
                'name' => 'Merchant sub account management',
                'slug' => 'merchant.sub.account.management',
                'http_method' => 'GET',
                'http_path' => "/merchant/*",
            ],
            [
                'name' => 'Marketing manager management',
                'slug' => 'marketing.manager.management',
                'http_method' => 'GET',
                'http_path' => "/marketing-manager/*",
            ],
            [
                'name' => 'Proxy merchant management',
                'slug' => 'proxy.merchant.management',
                'http_method' => 'GET,POST',
                'http_path' => "/merchant/index,/merchant/login-password,/merchant/purchase-password,/merchant/login-allowlist,/merchant/operation-log,/merchant/bank-accounts,/merchant/withdraw,/merchant/withdraw-history,/proxy-merchant/*",
            ],
        ]);

        Role::first()->permissions()->save(Permission::first());

        // add default menus.
        Menu::truncate();

        // 保留 1 ~ 100 给特殊的角色使用，所以将此值设定为 101
        DB::update('ALTER TABLE admin_roles AUTO_INCREMENT=101');
    }
}
