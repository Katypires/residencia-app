<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use App\Models\Admin\Sesau\Residencia\Formulario;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class FormularioTableComponent extends TableComponent
{
    public $per_page = 5;
    public $checkbox = false;

    public $data = [];
    public $header_view = 'livewire.admin.sesau.residencia.table.header';
    protected $paginationTheme = 'bootstrap';

    public $model;

    public function query()
    {
        return $this->model::query();
    }

    public function columns()
    {
        if (method_exists($this->model, 'columns')) {
            return (new $this->model)->columns();
        } else {
            return [
                Column::make('ID')->searchable()->sortable(),
            ];
        }
    }

    public function delete()
    {
        try{
            $destroy = Formulario::find($this->data['id']);
            $destroy ? $destroy->delete() : false;
            session()->flash('message',"Deletado com sucesso!!");
            $this->emit('refreshCrudTable');
        }catch(\Exception $e){
            session()->flash('message',"Algo deu errado!!");
        }
    }
    public function destroy($data)
    {
        $this->data = $data;
        $this->delete();
    }
}