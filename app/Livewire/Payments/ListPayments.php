<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListPayments extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Payment::query())
            ->columns([
                //
                TextColumn::make('student.user.name')->label("Student_Name")->sortable()->searchable(),
                TextColumn::make('sinf.title')->label("Course_Name")->sortable()->searchable(),
                TextColumn::make("amount")->money("Afg"),
                TextColumn::make("created_at")->date(),
            ])
            ->filters([
                //
                // SelectFilter::make('')->options([

                // ]),
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
                Action::make('edit')
                ->url(fn (Payment $record): string => route('payments.edit', $record))->openUrlInNewTab(),
                Action::make('delete')
                ->requiresConfirmation()->action(fn (Payment $record) => $record->delete($record->id))
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.payments.list-payments');
    }
}
