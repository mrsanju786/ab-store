<?php

namespace App\Exports;

use App\Models\Dish;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DishExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dish::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'dish_name',
            'dish_price',
            'dish_code',
            'dish_images',
            'has_variant',
            'is_tax_inclusive',
            'is_discount',
            'category_id',
            'counter_id',
            'discount_ids',
            'chef_preparation',
            'dish_hsn',
            'dish_type',
            'stock_quantity',
            'edited_at',
            'edited_by',
            'is_active',
            'created_at',
            'updated_at'
        ];
    }
}
