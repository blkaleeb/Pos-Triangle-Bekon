<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Category;
use Modules\Setting\Entities\Unit;

class ProductDatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    Category::create(
      [
        'category_code' => 'FZ_01',
        'category_name' => 'Frozen Food'
      ]
    );

    Category::create(
      [
        'category_code' => 'SP_01',
        'category_name' => 'Bumbu'
      ]
    );

    Unit::create(
      [
        'name' => 'Piece',
        'short_name' => 'pcs',
        'operator' => '*',
        'operation_value' => 1
      ]
    );

    Unit::create(
      [
        'name' => 'Kilogram',
        'short_name' => 'kg',
        'operator' => '*',
        'operation_value' => 1
      ]
    );
  }
}
