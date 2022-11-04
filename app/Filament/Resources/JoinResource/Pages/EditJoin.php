<?php

namespace App\Filament\Resources\JoinResource\Pages;

use Carbon\Carbon;
use App\Models\Bill;
use Filament\Pages\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\JoinResource;
use Filament\Resources\Pages\EditRecord;

class EditJoin extends EditRecord
{
    protected static string $resource = JoinResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);
        // dd($record->user_id);
        $tagihan = Carbon::now()
            ->add('Month', 1)
            ->startOfMonth()
            ->add('day', 14)
            ->add('houre', 01)
            ->add('seconde', 00)
            ->add('micro', 00)
            ->toDateTimeString();
        $id = $record->user_id;
        DB::table('bills')
            ->insert([
                'join_id' => $record->id,
                'tanggal_tagihan' => $tagihan,
                'user_id' => $id,
            ]);

        return $record;
    }
}
