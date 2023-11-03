<?php
 /*Esta Clase hace la importacion de Excel*/

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use App\Imports\ImportPeople;
use App\Models\Person;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel\ServiceProvider;
use Maatwebsite\Excel\ExcelServiceProvider;

class ListPeople extends ListRecords
{
    protected static string $resource = PersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make();
        return view('filament.custom.upload-file', compact('data'));

    }
    public $file = '';

    public function save(){

            if ($this->file != '') {
                Excel::import(new ImportPeople, $this->file);

            }

    }
}
