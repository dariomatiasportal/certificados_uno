<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResolutionResource\Pages;
use App\Filament\Resources\ResolutionResource\RelationManagers;
use App\Models\Resolution;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ResolutionResource extends Resource
{
    protected static ?string $model = Resolution::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('numero'),
                        TextInput::make('nombre_curso'),
                        DatePicker::make('fecha_alta')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        FileUpload::make('firma')
                            ->label('Carga la firma del curso')
                            ->image(),
                        FileUpload::make('plantilla')
                            ->label('Carga la plantilla en png.')
                            ->image(),
                        FileUpload::make('archivo')
                            ->label('Carga la Reso.')
                            ->acceptedFileTypes(['application/pdf'])
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                    ->prepend('custom-prefix-'),
                            ),
                        Select::make('unit_id')
                        ->relationship(name: 'units', titleAttribute: 'descripcion')


                    ])
                    ->columns(1),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('numero'),
                TextColumn::make('nombre_curso'),
                TextColumn::make('fecha_alta'),
                ImageColumn::make('firma')->circular(),
                ImageColumn::make('plantilla'),
                //TextColumn::make('plantilla'),
                TextColumn::make('archivo')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResolutions::route('/'),
            'create' => Pages\CreateResolution::route('/create'),
            'edit' => Pages\EditResolution::route('/{record}/edit'),
        ];
    }
}
