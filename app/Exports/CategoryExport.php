<?php
namespace App\Exports;

use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoryExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    private $index = 1;
    public function collection()
    {
        return Category::get( ['name', 'description']);
    }
    public function map($category): array
    {
        return [
            $this->index++,
            $category->name,
            $category->description
        ];
    }
    public function headings(): array
    {
        return [
            'STT',
            'Name',
            'Description',
           
        ];
    }
}