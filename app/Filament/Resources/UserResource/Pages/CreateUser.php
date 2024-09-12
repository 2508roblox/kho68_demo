<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\UserDetail;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate()
    {
        UserDetail::create([
            'user_id' => $this->record->id,
            'phone' => $this->data['phone'],
            'fullname' => $this->data['fullname'],
            'role' => $this->data['role'],
        ]);
    }
}
