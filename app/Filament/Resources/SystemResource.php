<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SystemResource\Pages;
use App\Filament\Resources\SystemResource\RelationManagers;
use App\Models\System;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Grid;
use Filament\Resources\RelationManagers\RelationGroup;

class SystemResource extends Resource
{
    protected static ?string $model = System::class;
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        TextInput::make('system')
                        ->unique()
                        ->required()
                        ->maxLength(100),
                        MarkdownEditor::make('description')
                    ])
              
           
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('system')->searchable(),
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
           RelationManagers\InformationsRelationManager::class,
           RelationManagers\ConfigurationsRelationManager::class,
          
           RelationManagers\RulesRelationManager::class,
           RelationManagers\TblObjectsRelationManager::class,
           RelationManagers\WhitelistsRelationManager::class,
           RelationManagers\FilteringsRelationManager::class,
           
        ];
    }


    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSystems::route('/'),
            'create' => Pages\CreateSystem::route('/create'),
            'edit' => Pages\EditSystem::route('/{record}/edit'),
            'view' => Pages\ViewSystem::route('/{record}'),
            
        ];

    }    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit');
    }



}
