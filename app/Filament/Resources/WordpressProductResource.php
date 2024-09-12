<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\WordpressProductResource\Pages;
    use App\Filament\Resources\WordpressProductResource\RelationManagers;
    use App\Models\WordpressProduct;
    use Filament\Forms;
    use Filament\Forms\Components\Grid;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;


    class WordpressProductResource extends Resource
    {
        protected static ?string $model = WordpressProduct::class;

        protected static ?string $navigationIcon = 'heroicon-o-window';
        protected static ?string $navigationLabel = 'Sản phẩm Wordpress';
        protected static ?string $navigationGroup = 'Wordpress';

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('category_id')
                                ->label('Category')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->required(),

                            Forms\Components\TextInput::make('name')
                                ->label('Name')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),

                            Forms\Components\TextInput::make('slug')
                                ->label('Slug')
                                ->required(),
//                                ->unique('wordpress_products', 'slug'),

                            Forms\Components\TextInput::make('sku')
                                ->label('SKU')
                                ->default(fn() => 'K68-' . strtoupper(\Str::random(6)))
//                                ->unique('wordpress_products', 'sku')
                                ->required(),

                            Forms\Components\TextInput::make('price')
                                ->label('Price')
                                ->required()
                                ->numeric(),

                            Forms\Components\TextInput::make('sale_price')
                                ->label('Sale Price')
                                ->numeric(),

                            Forms\Components\TextInput::make('sold')
                                ->label('Sold')
                                ->numeric(),

                            Forms\Components\TextInput::make('version')
                                ->label('Version'),

                            Forms\Components\RichEditor::make('short_content')
                                ->label('Short Description'),

                            Forms\Components\RichEditor::make('long_content')
                                ->label('Long Description'),

                            Forms\Components\TextInput::make('demo')
                                ->label('Demo Link')
                                ->url(),

                            Forms\Components\TextInput::make('download_link')
                                ->label('Download Link')
                                ->url(),

                            Forms\Components\TextInput::make('system_requirements')
                                ->label('System Requirements'),

                            Forms\Components\TextInput::make('license_key')
                                ->label('License Key'),

                            Forms\Components\DatePicker::make('license_expiration_date')
                                ->label('License Expiration Date'),

                            Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'active' => 'Active',
                                    'inactive' => 'Inactive',
                                    'draft' => 'Draft',
                                ])
                                ->default('draft'),

                            // Nhóm hai trường ảnh và đặt chúng trong một cột
                            Forms\Components\Group::make([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Featured Image')
                                    ->directory('Wordpress') //'storage/app/public/products'
                                    ->rules('mimes:jpeg,jpg,png,gif,webp')
                                    ->default(fn($record) => $record ? $record->image : null)
                                    ->required(),

                                Forms\Components\FileUpload::make('gallery')
                                    ->label('Gallery')
                                    ->multiple()
                                    ->directory('Wordpress') //'storage/app/public/products/gallery'
                                    ->rules('mimes:jpeg,jpg,png,gif,webp')
                                    ->default(fn($record) => $record ? $record->gallery : null)
                                    ->image(),
                            ])
                        ])->columns(1),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    TextColumn::make('name')->sortable()->searchable(),
                    TextColumn::make('category.name')->sortable()->searchable(),
                    TextColumn::make('price')->sortable()->searchable(),
                    TextColumn::make('status')->sortable()->searchable(),
                    TextColumn::make('sold')->sortable()->searchable(),
                    TextColumn::make('created_at')->dateTime('d/m/Y H:i:s'),
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
                'index' => Pages\ListWordpressProducts::route('/'),
                'create' => Pages\CreateWordpressProduct::route('/create'),
                'edit' => Pages\EditWordpressProduct::route('/{record}/edit'),
            ];
        }
    }
