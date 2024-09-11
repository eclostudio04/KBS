<?php

namespace App\Filament\Resources\CasPaymentResource\Pages;

use App\Filament\Resources\CasPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCasPayments extends ListRecords
{
    protected static string $resource = CasPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
