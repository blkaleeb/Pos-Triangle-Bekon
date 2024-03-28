<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\Setting;

class SettingDatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Setting::create([
      'company_name' => 'Bekon Bandung',
      'company_email' => 'bekonbandung@gmail.com',
      'company_phone' => '0895344015030',
      'notification_email' => 'notification@test.com',
      'default_currency_id' => 1,
      'default_currency_position' => 'prefix',
      'footer_text' => 'Bekon Bandung © 2021',
      'company_address' => 'Taman Holis Indah F1-4, Bandung, Indonesia'
    ]);
  }
}
