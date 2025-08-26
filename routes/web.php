<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);
Route::get('ambiente/create', AmbienteCreate::class)-> name('ambientes.create');
Route::get('ambiente/list', AmbienteList::class)->name('ambientes.list');
Route::get('ambiente/edit/{id}', AmbienteEdit::class)->name('ambientes.edit');

