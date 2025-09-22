<?php

namespace App\Livewire\Admin\DataTables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends DataTableComponent
{
  /*  protected $model = User::class; */

    public function builder(): Builder
    {
        return User::query()->with('roles');
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                 ->searchable(),
            Column::make("Name", "name")
                 ->searchable(),
            Column::make("Email", "email")
                ->searchable(),
            Column::make("DNI", "dni")
                 ->searchable(),
            Column::make("PHONE", "phone")
                 ->searchable(),
            Column::make('Rol', 'roles')->label(function($row){
                return $row->roles->first()?->name ?? 'Sin Rol';
            }),
            Column::make("Acciones")->label(function($row){
                return view('admin.users.actions', ['user'=>$row]);
            })
        ];
    }
}
