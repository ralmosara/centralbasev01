<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObjectResource\Pages;
use App\Filament\Resources\ObjectResource\RelationManagers;
use App\Models\TblObject;
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
class ObjectResource extends Resource
{
    protected static ?string $model = TblObject::class;
    protected static ?string $navigationLabel = 'Objects';
    protected static ?string $breadcrumb = "Objects";
    protected static ?string $pluralModelLabel = "Objects";
    protected static ?string $title = "Header";
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('object')
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
                Tables\Actions\CreateAction::make()->label('New Object'),
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
            'index' => Pages\ListObjects::route('/'),
            'create' => Pages\CreateObject::route('/create'),
            'view' => Pages\ViewObject::route('/{record}'),
            'edit' => Pages\EditObject::route('/{record}/edit'),
        ];
    }    
}
