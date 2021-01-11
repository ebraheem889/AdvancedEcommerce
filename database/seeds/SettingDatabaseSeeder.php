<?php

use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::setMany([
            'default_locale' => 'en' ,
            'default_timezone' => 'africa/cairo' ,
            'reviews_enabled' => true ,
            'auto_approve_reviews' => true ,
            'supported_currencies' => 'le' ,
            'default_currency' => 'le' ,
            'store_email' => 'admin@ecommerce.test' ,
            'search_engine' => 'mysql' ,
            'local_pickup_cost' => false ,
            'flat_rate_cost' => false ,
            'translatable' => [
                'store_name' => 'FleetCart',
                'free_shipping_label' => 'Free shipping',
                'local_label' => 'locale shipping',
                'outer_label' => 'outer shipping',
            ] ,
        ]);
    }
}
