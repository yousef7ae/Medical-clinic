<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['خدمة 1', 'خدمة 2', 'خدمة 3', 'خدمة 4'];
        $categories = ['عيادة الانف والحنجرة', 'عيادة الاسنان', 'عيادة العيون', 'عيادة العظام'];

        Setting::create([
            'name' => 'logo',
            'value' => '../dashboard/img/logo-white.png',
        ]);
        Setting::create([
            'name' => 'description',
            'value' => 'هلا بك في موقع عيادة بيست كلنك ',
        ]);
        Setting::create([
            'name' => 'site_name',
            'value' => 'عيادة بيست كلنك',
        ]);

        foreach ($services as $key => $item) {

            Service::create([
                'title' => $item,
                'description' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
//                'image' => '../dashboard/images/services/services-' . ++$key . '.png',
                'status' => 1,

            ]);

        }

        foreach ($categories as $key => $item) {

            Category::create([
                'name' => $item,
                'mobile' => rand(1111111111,9999999999),
//                'image' => '../dashboard/images/categories/categories-' . ++$key . '.png',
                'status' => 1,

            ]);

        }


        Page::create([
            'title' => 'مرحبا بيك في بيست كلينك',
            'slug' => 'about',
            'url' => 'https://www.youtube.com/watch?v=ILX3thHnTBY',
            'description' => 'تأسس بيست كلينك” على يد البروفيسور/محمد غالب اسماعيل – استشاري جراحة التجميل بمدينة شفا عمرو عام ٢٠٠١، كأول مركز تجميل في دولة فلسطين لتوفير جميع الخدمات الطبية التي تختص بالتجميل والجلدية،وجراحة اليوم الواحد

تأسس بيست كلينك” على يد البروفيسور/محمد غالب اسماعيل – استشاري جراحة التجميل بمدينة شفا عمرو عام ٢٠٠١، كأول مركز تجميل في دولة فلسطين لتوفير جميع الخدمات الطبية التي تختص بالتجميل والجلدية،وجراحة اليوم الواحد',
            'image' => '../front/img/img-2.jpg',
        ]);

        Page::create([
            'title' => 'خدماتنا',
            'slug' => 'services',
            'description' => 'هذا الجزء من الموقع يشمل خدمات يتم تقديمها إلى كافة السكان، ويشمل تفصيلاً للإجراءات المطلوبة من أجل الحصول على الخدمات المستندات التي يجب تقديمها، دفع الرسوم(في حالة تطلب ذلك) ومكان الحصول على الخدمات.',
        ]);

        Page::create([
            'title' => 'عيادة بيست كلينك للخدمات الطبية',
            'slug' => 'Subscribe',
            'description' => 'اشترك الآن لتلقي آخر التحديثات من Thrones والخدمات الجديدة والنصائح المفيدة',
        ]);

    }
}
