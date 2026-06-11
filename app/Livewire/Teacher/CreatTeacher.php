<?php

namespace App\Livewire\Teacher;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreatTeacher extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Wizard::make([
                    Step::make('User')
                    ->schema([
                        TextInput::make('name'),
                        TextInput::make('email')->required(),
                        TextInput::make('password'),
                        TextInput::make('user_type')->default('teacher'),
                    ]),
                     Step::make('Teacher')
                    ->schema([
                        TextInput::make("last_name")->required(),
                        Select::make('Degree Of Education')->options([
                            'secondary school'=>'Secondary School Diploma',
                            'bachelor'=>'Bachelor Degree',
                            'master'=>'Master Degree',
                            'PHD'=>'PHD'
                        ]),
                        Select::make("field_of_education")->options([
                            "computer sience"=>"Computer Sience",
                            "political sience"=>"Political Sience",
                            "ecommerce sience"=>"Ecommerce Sience",
                        ]),
                        TextInput::make("phone_number"),
                        FileUpload::make("image_url")->directory("teacher_images")->disk('public'),
                        Textarea::make("bio")->required(),
                    ])
                ])
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        //
    }

    public function render(): View
    {
        return view('livewire.teacher.creat-teacher');
    }
}
