<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcurementResource\Pages;
use App\Filament\Resources\ProcurementResource\RelationManagers;
use App\Models\Procurement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


use App\Models\System;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns;


class ProcurementResource extends Resource
{
    protected static ?string $model = Procurement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('system_id')
                ->label('System')
                ->required()
                ->options(System::all()->pluck('system', 'id'))
                ->searchable(),

                Grid::make(2)
                ->schema([
                    TextInput::make('procurement')
                    ->required()
                    ->maxLength(300),
                    TextInput::make('year')
                    ->numeric() 
                    ->required()
                    ->maxLength(4),
                    TextInput::make('distributor'),
                    TextInput::make('reseller'),
                    TextInput::make('approved_budget_contract')
                    ->prefix('P')
                    ->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2),
                    TextInput::make('winning_bid_price')
                    ->prefix('P')
                    ->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2),
                  
                
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProcurements::route('/'),
            'create' => Pages\CreateProcurement::route('/create'),
            'view' => Pages\ViewProcurement::route('/{record}'),
            'edit' => Pages\EditProcurement::route('/{record}/edit'),
        ];
    }    
}
