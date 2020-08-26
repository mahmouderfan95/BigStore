<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Astrotomic\Translatable\Translatable;

class SettingDatabaseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_local' => 'ar',
            'default_timezone'  => 'Africa/cairo',
            'reviewes_enabled'  => true,
            'store_email'       => 'bigShow@admin.com',
            'search_engin'      => 'mysql',
            'local_shipping_cost'   => 0,
            'outer_shipping_cost'   => 0,
            'free_shipping_cost'    => 0,
            'store_name'            => 'BigShow',
            'free_shpping_lable'    => true,
            'local_lable'           => true,
            'outer_lable'           => true,
            'translatable' => [
                'store_name'    => 'BigShow Store',
                'free_shpping_lable'    => 'free shpping',
                'local_lable'   => 'inner lable',
                'outer_lable'   => 'outer lable'
            ],
        ]);
    }
}
