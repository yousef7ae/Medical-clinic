<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Database\Seeder;

class MenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'title' => 'Header Menu',
            'slug' => 'Header Menu',
            'order' => '1',
        ]);

        Submenu::insert([
            ['name' => 'الرئيسية', 'url' => '/', 'order' => '1', 'menu_id' => $menu->id],
            ['name' => 'الخدمات', 'url' => '#services', 'order' => '2', 'menu_id' => $menu->id],
            ['name' => 'الأقسام الطبية', 'url' => '#sections', 'order' => '3', 'menu_id' => $menu->id],
            ['name' => 'فريق العمل', 'url' => '#team', 'order' => '4', 'menu_id' => $menu->id],
            ['name' => 'المقالات', 'url' => '#news', 'order' => '5', 'menu_id' => $menu->id],
            ['name' => 'من نحن', 'url' => '#about', 'order' => '6', 'menu_id' => $menu->id],
            ['name' => 'تواصل معنا', 'url' => '#connect', 'order' => '7', 'menu_id' => $menu->id],
        ]);

        $menu = Menu::create([
            'title' => 'Footer Menu',
            'slug' => 'Footer Menu',
            'order' => '1',
        ]);

        Submenu::insert([
            ['name' => 'من نحن', 'url' => '#about', 'order' => '1', 'menu_id' => $menu->id],
            ['name' => 'الاقسام', 'url' => '#sections', 'order' => '2', 'menu_id' => $menu->id],
            ['name' => 'الاطباء والصفقات', 'url' => '#', 'order' => '3', 'menu_id' => $menu->id],
            ['name' => 'الخدمات', 'url' => '#services', 'order' => '4', 'menu_id' => $menu->id],
            ['name' => 'اتصل بنا', 'url' => '#connect', 'order' => '5', 'menu_id' => $menu->id],
        ]);
    }
}
