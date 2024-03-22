<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhitelistResource\Pages;
use App\Filament\Resources\WhitelistResource\RelationManagers;
use App\Models\Whitelist;
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
use Filament\Tables\Actions\ViewAction;
class WhitelistResource extends Resource
{
    protected static ?string $model = Whitelist::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 6;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('whitelist')
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
                Tables\Columns\TextColumn::make('whitelist')->searchable(),
                Tables\Columns\TextColumn::make('system.system')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListWhitelists::route('/'),
            'create' => Pages\CreateWhitelist::route('/create'),
            'view' => Pages\ViewWhitelist::route('/{record}'),
            'edit' => Pages\EditWhitelist::route('/{record}/edit'),
        ];
    }    
}
