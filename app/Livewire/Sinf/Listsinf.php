<?php

namespace App\Livewire\Grades;
use App\Models\sinf;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListGrades extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => sinf::query())
            ->columns([
                //
                TextColumn::make('name')->label('course_name')->searchable(),
                TextColumn::make('teacher.user.name')->label('Teacher_name'),
                TextColumn::make('payment.student.user.name')->label('Student'),
                TextColumn::make('start_date'),
                TextColumn::make('end_date'),
                TextColumn::make('description')->limit(30),
            ])
            ->filters([
                //
                Filter::make('start_date')->
                Schema([
                    DatePicker::make('start_date'),
                ])
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
                 Action::make('delete')->label('Delete')->requiresConfirmation()->action(fn (sinf $record)=>$record->delete($record->id))
            ])->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.sinf.list-sinfs');
    }
}
