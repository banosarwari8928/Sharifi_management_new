<?php

namespace App\Livewire\Teacher;

use App\Models\Teacher;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListTeachers extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Teacher::query())
            ->columns([
                TextColumn::make('user.name')->label('name')->searchable()->sortable(),
                TextColumn::make('user.email')->label('Email')->icon(Heroicon::Envelope)->iconColor('primary'),
                TextColumn::make('lastName'),
                TextColumn::make('degree_of_ducation')->color('primary'),
                TextColumn::make('phone_number'),
                TextColumn::make('bio')->toggleable(isToggledHiddenByDefault: true),
                // ->isToggledHiddenByDefault()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                  Action::make('delete')
    ->requiresConfirmation()
    ->action(fn (Teacher $record) => $record->delete($record->id))
    ->failureNotificationTitle(function (int $successCount, int $totalCount): string {
        if ($successCount) {
            return "{$successCount} of {$totalCount} users deleted";
        }

        return 'Failed to delete any users';
    })
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.teacher.list-teachers');
    }
}
