<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CourseModule;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CourseModuleResource\Pages;
use App\Filament\Resources\CourseModuleResource\RelationManagers;
use Filament\Forms\Components\Select;

class CourseModuleResource extends Resource
{
    protected static ?string $model = CourseModule::class;

    protected static ?string $navigationLabel = 'Bài học';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý khóa học';
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Thông tin bài học')
                ->schema([

                    Grid::make(2)
                        ->schema([
                            TextInput::make('title')
                                ->label('Tên bài học')
                                ->required(),

                            TextInput::make('order')
                                ->label('Thứ tự')
                                ->numeric()
                                ->default(0),
                                Select::make('course_id')
                                ->label('Khóa học')
                                ->relationship('course', 'title') // Lấy danh sách từ bảng courses
                                ->required(),
                        ]),

                    RichEditor::make('content')
                        ->label('Nội dung')
                        ->nullable(),

                    TextInput::make('download_link')
                        ->label('Link tài liệu')
                        ->nullable(),

                    TextInput::make('video_url')
                        ->label('Link video')
                        ->nullable(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('download_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCourseModules::route('/'),
            'create' => Pages\CreateCourseModule::route('/create'),
            'edit' => Pages\EditCourseModule::route('/{record}/edit'),
        ];
    }
}
