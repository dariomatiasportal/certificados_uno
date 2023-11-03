<?php

namespace App\Filament\Resources\DetalleResource\Pages;

use App\Filament\Resources\DetalleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetalle extends EditRecord
{
    protected static string $resource = DetalleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
