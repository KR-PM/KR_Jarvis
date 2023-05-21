<?php

namespace Database\Seeders\Deploy;

use Carbon\Carbon;
use Dcat\Admin\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenuTableSeeder extends Seeder
{
    private string $tableName = 'admin_menu';
    private array $defaultData = [
        'id' => 0,
        'parent_id' => 0,
        'order' => 0,
        'title' => 'default',
        'icon' => 'fa-bars',
        'uri' => null,
        'created_at' => 0,
        'updated_at' => 0,
    ];

    /**
     * id 为 admin_menu 流水号，不可重复
     * @var array
     */
    private array $selfData = [
        ['id' => 1, 'parent_id' => 0, 'title' => 'dashboard', 'icon' => 'fa-bar-chart', 'uri' => '/', 'order' => 1,],
        ['id' => 2, 'parent_id' => 0, 'title' => 'admin', 'icon' => 'fa-tasks', 'uri' => '', 'order' => 999,],
        ['id' => 3, 'parent_id' => 2, 'title' => 'users', 'icon' => 'fa-users', 'uri' => 'auth/users', 'order' => 3,],
        ['id' => 4, 'parent_id' => 2, 'title' => 'roles', 'icon' => 'fa-user', 'uri' => 'auth/roles', 'order' => 4,],
        ['id' => 5, 'parent_id' => 2, 'title' => 'permission', 'icon' => 'fa-ban', 'uri' => 'auth/permissions', 'order' => 5,],
        ['id' => 6, 'parent_id' => 2, 'title' => 'menu', 'icon' => 'fa-bars', 'uri' => 'auth/menu', 'order' => 6,],
        ['id' => 7, 'parent_id' => 0, 'title' => 'manage', 'icon' => 'fa-bars', 'uri' => '', 'order' => 7,],

        ['id' => 100, 'parent_id' => 7, 'title' => 'announcements', 'icon' => 'fa-caret-right', 'uri' => 'announcements'],
        ['id' => 101, 'parent_id' => 7, 'title' => 'banners', 'icon' => 'fa-caret-right', 'uri' => 'banners'],
        ['id' => 102, 'parent_id' => 7, 'title' => 'users', 'icon' => 'fa-caret-right', 'uri' => 'users'],
        ['id' => 103, 'parent_id' => 7, 'title' => 'lotteryNames', 'icon' => 'fa-caret-right', 'uri' => 'lotteryNames'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $existedIds = $this->getExistedIds();

        $nowDatetime = Carbon::now();

        $insertData = [];
        foreach ($this->selfData as $row) {
            if (!isset($existedIds[$row['id']])) {
                $existedIds[$row['id']] = true;

                $row['created_at'] = $nowDatetime;
                $row['updated_at'] = $nowDatetime;

                $insertData[] = array_merge($this->defaultData, $row);

                $this->command->info('add menu item：'.$row['title']);
            }
        }

        DB::table($this->tableName)->insert($insertData);
    }

    /**
     * @return array
     */
    protected function getExistedIds(): array
    {
        $menus = Menu::onWriteConnection()->select('id')->get();
        if ($menus->isEmpty()) {
            return [];
        }

        $menuList = $menus->toArray();
        return array_column($menuList, 'id', 'id');
    }
}
