<?php

namespace App\Exports;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProducts implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ProductResource::collection(Product::all());
    }

    public function headings(): array
    {
        return ["#", "Артикул", "Название", "Страна производитель", "Цена за 1шт (руб)", "Количество"];
    }
}
