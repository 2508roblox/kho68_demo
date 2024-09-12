<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\CategoryResource\Pages;
    use App\Filament\Resources\CategoryResource\RelationManagers;
    use App\Models\Category;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\TextInput;
    use Filament\Tables\Columns\TextColumn;
    use Illuminate\Support\Str;
    use Livewire\Livewire;
    use Filament\Resources\Pages\CreateRecord;

    class CategoryResource extends Resource
    {
        protected static ?string $model = Category::class;

        protected static ?string $navigationLabel = 'Danh mục (menu)';
        protected static ?string $navigationIcon = 'heroicon-o-folder';
//        protected static ?string $navigationGroup = 'Quản lý tài khoản';

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->reactive()
                        ->debounce(1000)
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            if (!$get('slug')) {
                                $set('slug', Str::slug($state));
                            }
                        }),
                    TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Slug sẽ tự động tạo, có thể chỉnh sửa.')
                        ->lazy(),
                    Select::make('parent_id')
                        ->label('Category Cha')
                        ->options(function () {
                            return self::buildCategoryTree();
                        })
                        ->nullable(),
                    Select::make('status')
                        ->options([
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                        ])
                        ->default('active')
                        ->required(),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    TextColumn::make('name')->sortable()->searchable(),
                    TextColumn::make('slug')->sortable()->searchable(),
                    TextColumn::make('parent.name')->label('Category Cha'),
                    TextColumn::make('status')->sortable(),
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
                'index' => Pages\ListCategories::route('/'),
                'create' => Pages\CreateCategory::route('/create'),
                'edit' => Pages\EditCategory::route('/{record}/edit'),
            ];
        }

        // cấu trúc tree view select option category cha
        protected static function buildCategoryTree($parentId = null, $prefix = '')
        {
            $categories = Category::where('parent_id', $parentId)->get();
            $tree = [];

            foreach ($categories as $category) {
                $tree[$category->id] = $prefix . $category->name;
                $tree += self::buildCategoryTree($category->id, $prefix . '— ');
            }

            return $tree;
        }

        protected function afterCreate(): void
        {
            $categoryId = $this->record->id;

            Livewire::test(\App\Http\Livewire\CreateCategoryPage::class, ['categoryId' => $categoryId])
                ->call('createPage');
        }

    }
