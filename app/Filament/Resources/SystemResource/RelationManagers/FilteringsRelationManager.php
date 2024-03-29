<?php

namespace App\Filament\Resources\SystemResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilteringsRelationManager extends RelationManager
{
    protected static string $relationship = 'filterings';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('filtering')
            ->columns([
                Tables\Columns\TextColumn::make('filtering')->searchable(),
                Tables\Columns\TextColumn::make('system.system')->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
