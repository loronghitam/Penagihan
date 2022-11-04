<?php

namespace App\Filament\Resources\JoinResource\Pages;

use App\Filament\Resources\JoinResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJoins extends ListRecords
{
    protected static string $resource = JoinResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
