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
            empty($row['name']) ||
            !isset($row['price']) ||
            empty($row['motor']) ||
            empty($row['potencia']) ||
            empty($row['aceleracion'])
        ) {
            return null;
        }

        if (!is_numeric($row['price'])) {
            return null;
        }

        Log::info(
            'Vehículo importado: ' . $row['name']
        );

        return Product::updateOrCreate(
            [
                'name' => $row['name']
            ],
            [
                'price' => $row['price'],
                'image' => $row['image'] ?? null,
                'motor' => $row['motor'],
                'potencia' => $row['potencia'],
                'aceleracion' => $row['aceleracion'],
                'category' => $row['category'] ?? null,
            ]
        );
    }
}