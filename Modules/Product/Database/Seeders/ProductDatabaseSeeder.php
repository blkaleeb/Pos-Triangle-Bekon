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
        'category_code' => 'CA_01',
        'category_name' => 'Random'
      ],
      [
        'category_code' => 'FZ',
        'category_name' => 'Frozen Food'
      ]
    );

    Unit::create(
      [
        'name' => 'Kilogram',
        'short_name' => 'Kg',
        'operator' => '*',
        'operation_value' => 1
      ],
      [
        'name' => 'Piece',
        'short_name' => 'PC',
        'operator' => '*',
        'operation_value' => 1
      ]
    );
  }
}
