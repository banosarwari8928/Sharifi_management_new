<?php

use App\Livewire\Admin\ListAdmins;
use App\Livewire\Payment\ListPayment;
use App\Livewire\Sinf\CreateSinf;
use App\Livewire\Sinf\EditSinf;
use App\Livewire\Sinf\ListSinfs;
use App\Livewire\Student\CreateStudent;
use App\Livewire\Student\EditStudent;
use App\Livewire\Student\ListStudents;
use App\Livewire\Teacher\CreateTeacher;
use App\Livewire\Teacher\EditTeacher;
use App\Livewire\Teacher\ListTeachers;
use App\Livewire\User\ListUser;
use App\Livewire\Users\EditUsers;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
Route::middleware(['auth'])->group(function (){
    Route::get('/manage-users',ListUser::class)->name('users.index');
    Route::get('/manage-users',EditUsers::class)->name('users.edit');
    Route::get('/manage-teachers',ListTeachers::class)->name('teachers.index');
    Route::get('/create-teacher',CreateTeacher::class)->name('teachers.create');
    Route::get('/edit-teacher',EditTeacher::class)->name('teacher.edit');
    
    Route::get('/manage-students',ListStudents::class)->name('students.index');
    Route::get('/create-students',CreateStudent::class)->name('students.create');
    Route::get('/create-students',EditStudent::class)->name('students.edit');
    Route::get('/admin',ListAdmins::class)->name('admin.index');
    Route::get('/manage-classes',ListSinfs::class)->name('classes.index');
    Route::get('/create-classes',CreateSinf::class)->name('sinfs.create');
    Route::get('/edit-classes',EditSinf::class)->name('sinfs.edit');
    Route::get('/finance-payment',ListPayment::class)->name('payment.index');
    // Route::get('/finance-payment',cre::class)->name('payment.creatw');
    Route::get('/finance-payment',ListPayment::class)->name('payment.edit');
});

require __DIR__.'/auth.php';
