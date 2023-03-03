<?php

namespace App\Imports;

use App\Models\Dish;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DishImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dish([
            'dish_name'     => $row['dish_name'],
            'dish_price'    => $row['dish_price'],
            'dish_code'    => $row['dish_code'],
            'dish_images'    => $row['dish_images'],
            'has_variant'    => $row['has_variant'],
            'is_tax_inclusive'    => $row['is_tax_inclusive'],
            'is_discount'    => $row['is_discount'],
            'category_id'    => $row['category_id'],
            'counter_id'    => $row['counter_id'],
            'discount_ids'    => $row['discount_ids'],
            'chef_preparation'    => $row['chef_preparation'],
            'dish_hsn'    => $row['dish_hsn'],
        ]);
    }
}
