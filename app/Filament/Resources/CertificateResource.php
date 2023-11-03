<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Filament\Resources\CertificateResource\RelationManagers;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Resolution;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('rol'),
                    DatePicker::make('fecha_alta')
                        ->native(false)
                        ->displayFormat('d/m/Y'),
                    TextInput::make('periodo'),
                    DatePicker::make('usuario_alta')
                        ->native(false)
                        ->displayFormat('d/m/Y'),
                    TextInput::make('cuv'),
                    TextInput::make('certificado_estado'),
                    DatePicker::make('certificado_fecha_envio')
                        ->native(false)
                        ->displayFormat('d/m/Y'),
                    DatePicker::make('certificado_fecha_reenvio')
                        ->native(false)
                        ->displayFormat('d/m/Y'),
                    DatePicker::make('certificado_usuario_reenvio')
                        ->native(false)
                        ->displayFormat('d/m/Y'),

                    TextInput::make('nota'),

                    Select::make('id_person')
                    ->relationship(name:'people', titleAttribute: 'dni'),

                    Select::make('id_course')
                    ->relationship(name: 'courses', titleAttribute: 'nombre')


                ])
                ->columns(1),
            //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rol'),
                TextColumn::make('fecha_alta'),
                TextColumn::make('cuv'),
                TextColumn::make('nota'),
                TextColumn::make('person_id')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(  ),
                //Tables\Actions\Action::make('Download Pdf')
                //    ->icon('heroicon-o-rectangle-stack')
                //    ->url(fn (Certificate $datoscertificado) => route('certificate.pdf.download', $datoscertificado->id))
                //    ->openUrlInNewTab(),

                //Tables\Actions\Action::make('pdf')
                //    ->label('PDF')
                //    ->color('success')
                //    ->icon('heroicon-o-rectangle-stack')
                //    ->action(function (Certificate $record) {
                //        return response()->streamDownload(function () use ($record) {
                //            echo Pdf::loadHtml(
                //                Blade::render('pdf', ['record' => $record])
                //            )->stream();
                //        }, $record->id . '.pdf');
                //    }),

                    Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-o-rectangle-stack')
                    ->url(fn (Certificate $record) => route('pdf', $record))
                    ->openUrlInNewTab(),

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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
