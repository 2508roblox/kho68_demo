<?php

namespace App\Filament\Resources\SocialAccountProductResource\Pages;

use App\Filament\Resources\SocialAccountProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialAccountProducts extends ListRecords
{
    protected static string $resource = SocialAccountProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
