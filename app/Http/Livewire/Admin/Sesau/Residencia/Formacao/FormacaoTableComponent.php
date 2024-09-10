<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia\Formacao;

use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class FormacaoTableComponent extends TableComponent
{
    public $per_page = 5;
    public $checkbox = false;
    protected $paginationTheme = 'bootstrap';
    public $header_view = 'livewire.admin.crud.table.header';
    // public $footer_view = 'livewire.admin.crud.table.footer';

    public $model, $form, $title, $modalId, $formType, $modal, $key, $tableAction,$instituicaoId;

    protected $listeners = [
        'refreshCrudTable' => '$refresh'
    ];
    
    public function query()
    {
        return $this->model::query();
    }

    public function columns()
    {
        if (method_exists($this->model, 'columns_modal_card')) {
            return (new $this->model)->columns_modal_card();
        } else {
            return [
                Column::make('ID')->searchable()->sortable(),
            ];
        }
    }
}
