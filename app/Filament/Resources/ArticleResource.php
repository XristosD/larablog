<?php

namespace App\Filament\Resources;

use App\Enum\UserRole;
use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Filament\Resources\ArticleResource\RelationManagers\ImageRelationManager;
use App\Models\Article;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;

class ArticleResource extends Resource
{
  protected static ?string $model = Article::class;

  protected static ?string $navigationIcon = 'heroicon-o-collection';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
      Grid::make()
        ->schema([
          TextInput::make('title')->required(),
          Textarea::make('body'),
          Checkbox::make('published'),
          Grid::make()
            ->relationship('image')
            ->schema([
              FileUpload::make('path')
                ->label('Image')
                ->directory('images')
                ->imageCropAspectRatio('16:9')
                ->imageResizeTargetWidth('1920')
                ->imageResizeTargetHeight('1080'),
            ])
            ->columns(1),
            Grid::make()->schema([
              Select::make('tags')
              ->relationship('tags', 'title')
              ->multiple()
            ])->columns(1)
        ])
        ->columns(1)        
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')->limit(25),
        TextColumn::make('created_at'),
        TextColumn::make('user.name')->label('Author'),
        Auth::user()->role === UserRole::ADMIN ? ToggleColumn::make('published') : BooleanColumn::make('published'),
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
      // ImageRelationManager::class,
    ];
  }
  
  public static function getPages(): array
  {
    return [
      'index' => Pages\ListArticles::route('/'),
      'create' => Pages\CreateArticle::route('/create'),
      'edit' => Pages\EditArticle::route('/{record}/edit'),
    ];
  }  
}
