<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Filament\Resources\TagResource\RelationManagers;
use App\Filament\Resources\TagResource\RelationManagers\ArticlesRelationManager;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagResource extends Resource
{
  protected static ?string $model = Tag::class;

  protected static ?string $navigationIcon = 'heroicon-o-collection';

  protected static ?string $recordTitleAttribute = 'title';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Grid::make()
          ->schema([
            TextInput::make('title')
              ->required()
              ->unique()
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\DeleteBulkAction::make(),
      ]);
  }
  
  public static function getRelations(): array
  {
    return [
      ArticlesRelationManager::class,
    ];
  }
  
  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTags::route('/'),
      'create' => Pages\CreateTag::route('/create'),
      'edit' => Pages\EditTag::route('/{record}/edit'),
    ];
  }  
}
