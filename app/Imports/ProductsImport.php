<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (
            empty($row['sku']) ||
            empty($row['name']) ||
            !isset($row['price']) ||
            !isset($row['stock'])
        ) {
            return null;
        }

        if (
            !is_numeric($row['price']) ||
            !is_numeric($row['stock'])
        ) {
            return null;
        }
        
        Log::info('Producto importado: ' . $row['sku']);

        return Product::updateOrCreate(
            [
                'sku' => $row['sku']
            ],
            [
                'name' => $row['name'],
                'description' => $row['description'] ?? '',
                'price' => $row['price'],
                'stock' => $row['stock'],
                'image' => $row['image'] ?? null,
                'category' => $row['category'] ?? null,
            ]
        );
    }
}