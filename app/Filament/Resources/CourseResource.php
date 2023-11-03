<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nombre'),
                        TextInput::make('periodo'),
                        DatePicker::make('fecha_alta')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        TextInput::make('horas'),
                        Select::make('tipohs')
                        ->options([
                            'reloj' => 'reloj',
                            'catedras' => 'Catedras',
                        ]),
                        Select::make('modalidad')
                        ->options([
                            'presencial' => 'Presencial',
                            'virtual' => 'Virtual',
                        ]),
                        FileUpload::make('logo')
                            ->label('Carga la logo del certificado')
                            ->image(),
                        TextInput::make('objetivo'),
                        //TextInput::make('contenido'),
                        RichEditor::make('contenido'),
                        TextInput::make('planilla_id'),
                        TextInput::make('nota_final_aprobado'),
                        TextInput::make('nota_modulo_aprobado'),
                        TextInput::make('resultado'),
                        TextInput::make('activo'),

                        Select::make('resolution_id')
                        ->relationship(name: 'resolutions', titleAttribute: 'numero')


                    ])
                    ->columns(1),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre'),
                TextColumn::make('periodo'),
                TextColumn::make('fecha_alta'),
                TextColumn::make('horas'),
                TextColumn::make('horas'),
                TextColumn::make('resolutions.numero')
                //
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
