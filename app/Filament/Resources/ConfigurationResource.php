<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigurationResource\Pages;
use App\Filament\Resources\ConfigurationResource\RelationManagers;
use App\Models\Configuration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ViewAction;

use App\Models\System;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns;

class ConfigurationResource extends Resource
{
    protected static ?string $model = Configuration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('configuration')
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
                Tables\Columns\TextColumn::make('configuration')->searchable(),
                Tables\Columns\TextColumn::make('system.system')->searchable(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                // ViewAction::make() ->label('')
                // ->url(function ($record) {
                //     return route('admin.configuration.show', $record->id);
                // })
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
             

          
       
        ;
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
            'index' => Pages\ListConfigurations::route('/'),
            'create' => Pages\CreateConfiguration::route('/create'),
            'view' => Pages\ViewConfiguration::route('/{record}'),
            'edit' => Pages\EditConfiguration::route('/{record}/edit'),
           
        ];
    }    


}
