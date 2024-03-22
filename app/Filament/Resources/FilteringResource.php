<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilteringResource\Pages;
use App\Filament\Resources\FilteringResource\RelationManagers;
use App\Models\Filtering;
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
class FilteringResource extends Resource
{
    protected static ?string $model = Filtering::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('filtering')
            ->unique()
            ->required()
            ->maxLength(100),
            Select::make('system_id')
            ->label('System')
            ->required()
            ->options(System::all()->pluck('system', 'id'))
            ->searchable(),
            Grid::make(1)
            ->schema([
                MarkdownEditor::make('description'),
                MarkdownEditor::make('instruction'),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('filtering')->searchable(),
                Tables\Columns\TextColumn::make('system.system')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListFilterings::route('/'),
            'create' => Pages\CreateFiltering::route('/create'),
            'view' => Pages\ViewFiltering::route('/{record}'),
            'edit' => Pages\EditFiltering::route('/{record}/edit'),
        ];
    }    
}
