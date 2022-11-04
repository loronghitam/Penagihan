<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Join;
use App\Models\User;
use Filament\Tables;
use App\Models\Package;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JoinResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationGroup;
use App\Filament\Resources\JoinResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\JoinResource\RelationManagers\UsersRelationManager;
use App\Filament\Resources\JoinResource\RelationManagers\PackageRelationManager;

class JoinResource extends Resource
{
    protected static ?string $model = Join::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('status')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama'),
                TextColumn::make('alamat'),
                TextColumn::make('package.name'),
                TextColumn::make('created_at'),
                BadgeColumn::make('status')
                    ->color(static function ($state): string {
                        if ($state === 0) {
                            $state = 'Terdaftar';
                            return 'success';
                        }

                        return 'secondary';
                    })

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
                    ->extraViewData([
                        'myVariable' => 'My Variable'
                    ])

            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationGroup::make('Join', [
                PackageRelationManager::class,
                UsersRelationManager::class,
            ])
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJoins::route('/'),
            'create' => Pages\CreateJoin::route('/create'),
            'edit' => Pages\EditJoin::route('/{record}/edit'),
        ];
    }
}
