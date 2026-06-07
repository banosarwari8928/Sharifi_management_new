<?php

namespace App\Livewire\Payments;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Payment;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class EditPayments extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public Payment $record;

    public ?array $data = [];

    public function mount(): void
    {
        //attributesToArray(): Get that field and fill it like this when we want to update something like amount show like this in input 1500 fill not empty.
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make('Edit Payment')->description('You Can Edit The Data Of Spicific Payment. ')->schema([
                  TextInput::make('amount'),
                ]),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);
    }

    public function render(): View
    {
        return view('livewire.payments.edit-payments');
    }
}
