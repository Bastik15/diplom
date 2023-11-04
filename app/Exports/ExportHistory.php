<?php

namespace App\Exports;

use App\Http\Resources\HistoryResource;
use App\Models\History;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportHistory implements FromCollection, WithHeadings
{
    public function collection()
    {
        return HistoryResource::collection(History::orderBy('created_at', 'desc')->get());
    }

    public function headings(): array
    {
        return ["#", "Артикул", "Название", "Страна производитель", "Цена за 1шт (руб)", "Приход (Количество)", "Дата прихода", "Контрагент", "Расход (Количество)", "Дата расхода", "ФИО Тех. специалиста", "Итого на складе"];
    }
}
