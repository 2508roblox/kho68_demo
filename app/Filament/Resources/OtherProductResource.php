<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OtherProductResource\Pages;
use App\Filament\Resources\OtherProductResource\RelationManagers;
use App\Models\OtherProduct;
use App\Models\SocialAccountProduct;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class OtherProductResource extends Resource
{
    protected static ?string $model = OtherProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    // Thay đổi tên và icon
    protected static ?string $label = 'Sản phẩm khác';
    protected static ?string $pluralLabel = 'Sản phẩm khác';
    protected static ?string $navigationLabel = 'Sản phẩm khác';
    protected static ?string $navigationGroup = 'Khác';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section for basic information
                Section::make('Thông tin cơ bản')
                    ->schema([
                        Grid::make(2) // 2 columns layout
                        ->schema([
                            TextInput::make('name')
                                ->label('Tên sản phẩm')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(
                                    fn(string $operation, $state, Set $set) => true ? $set('slug', Str::slug($state)) : null,
                                ),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->unique(OtherProduct::class, 'slug', ignoreRecord: true)
                                ->required()
                                ->dehydrated(),
                        ]),

                        FileUpload::make('thumbnail')
                            ->label('Ảnh đại diện')
                            ->image()
                            ->directory('OtherProduct')
                            ->nullable()
                            ->rules('mimes:jpeg,jpg,png,gif,webp')
                            ->required(),

                        Select::make('category_id')
                            ->label('Danh mục')
                            ->options(function () {
                                return \App\Models\Category::pluck('name', 'id');
                            })
                            ->required()
                            ->placeholder('Chọn danh mục'),

                    ]),

                // Section for inventory
                Section::make('Quản lý kho')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('stock')
                                    ->label('Tồn kho')
                                    ->numeric()
                                    ->default(0),

                                TextInput::make('sold_quantity')
                                    ->label('Đã bán')
                                    ->numeric()
                                    ->default(0),
                            ]),
                    ]),

                // Section for pricing and content
                Section::make('Giá và Nội dung')
                    ->schema([
                        TextInput::make('price')
                            ->prefix('vnd')
                            ->label('Giá sản phẩm')
                            ->numeric()
                            ->nullable(),

                        RichEditor::make('description')
                            ->label('Mô tả sản phẩm')
                            ->nullable(),
                    ]),

                Section::make('Bộ sưu tập ảnh')
                    ->schema([
                        Repeater::make('gallery')
                            ->label('Thêm ảnh vào bộ sưu tập')
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->label('Ảnh')
                                    ->directory('OtherProduct/gallery')
                                    ->rules('mimes:jpeg,jpg,png,gif,webp')
                            ])
                            ->collapsible(),
                    ])
                    ->columns(1),

                Section::make('Link & Yêu cầu hệ thống')
                    ->schema([
                        TextInput::make('demo_link')
                            ->label('Link demo sản phẩm')
                            ->url()
                            ->nullable(),

                        TextInput::make('download_link')
                            ->label('Link tải về sản phẩm')
                            ->url()
                            ->nullable(),

                        RichEditor::make('system_requirements')
                            ->label('Yêu cầu hệ thống')
                            ->nullable(),
                    ])
                    ->columns(1),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Ảnh đại diện'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Giá sản phẩm')
                    ->sortable()
                    ->searchable()
                    ->prefix('vnd'),

                Tables\Columns\TextColumn::make('stock')
                    ->label('Tồn kho')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sold_quantity')
                    ->label('Đã bán')
                    ->sortable(),
            ])
            ->filters([
                // Add any filters if necessary
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOtherProducts::route('/'),
            'create' => Pages\CreateOtherProduct::route('/create'),
            'edit' => Pages\EditOtherProduct::route('/{record}/edit'),
        ];
    }
}
