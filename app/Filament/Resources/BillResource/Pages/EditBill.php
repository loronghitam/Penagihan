<?php

namespace App\Filament\Resources\BillResource\Pages;

use Carbon\Carbon;
use App\Models\Bill;
use Filament\Pages\Actions;
use Termwind\Components\Dd;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\BillResource;
use Filament\Resources\Pages\EditRecord;

class EditBill extends EditRecord
{
    protected static string $resource = BillResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),

        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);
        // dd($record);
        if ($data['payment'] == false) {
            Bill::where('id', $record->id)->update([
                'image' => null
            ]);
        } else {
            // dd($record);
            $tagihan = Carbon::now()
                ->add('Month', 2)
                ->startOfMonth()
                ->add('day', 14)
                ->add('houre', 01)
                ->add('seconde', 00)
                ->add('micro', 00)
                ->toDateTimeString();
            // dd($tagihan);
            DB::table('bills')->insert([
                'join_id' => $record->join_id,
                'user_id' => $record->user_id,
                'tanggal_tagihan' => $tagihan
            ]);
        }
        return $record;
    }
}
