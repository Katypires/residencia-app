<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia\Formulario;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\Formulario;
use App\Models\Admin\Sesau\Residencia\ProcessoTipoVaga;
use App\Models\Admin\Sesau\Residencia\ProcessoVaga;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class FormularioFormComponent extends Component
{
    use WithFileUploads;

    public $model, $form, $title, $modalId, $type, $formType, $modal, $modelName;
    public $data = [];
    public $tipoConselhos, $cedentes, $candidatos, $tipoProcessos, $formulario, $processoTipoVagas, $processoVaga;
    public $processo_id, $candidato_id;
    public $documento_tipo_vaga, $existingFiles;
    public $documentos_solicitacao_isencao = [];

    protected $listeners = [
        'editCrudForm' => 'edit',
        'deleteCrudForm' => 'delete',
        'selectedColumn',
        'selectedTitulo',
        'viewFormCrud'
    ];


    public function mount($title, $model, $form, $processo_id, $candidato_id)
    {
        // dd($title, $model, $form,$processo_id,$candidato_id);
        $formulario = Formulario::where('candidato_id', Auth::user()->id)->first();
        $this->title = $title;
        $this->model = $model;
        $this->form = $form;
        $this->formulario = Formulario::all();
        $processoVaga = ProcessoVaga::where('processo_id', $processo_id)->with('processo_tipo_vagas')->first();
        $this->processoVaga = $processoVaga;
        $this->processoTipoVagas = $processoVaga->processo_tipo_vagas ?? null;
        $this->data['tipo_vaga'] = $formulario->tipo_vaga ?? null;
        $this->data['leitura_edital'] = $formulario->leitura_edital ?? null;
        $this->data['termo_aceitacao'] = $formulario->termo_aceitacao ?? null;
        $this->data['solicitacao_isencao'] = $formulario->solicitacao_isencao ?? null;
    }

    public function render()
    {
        return view('livewire.admin.sesau.residencia.formulario.formulario-form-component');
    }


    public function addFileInput()
    {
        $this->documentos_solicitacao_isencao[] = null; 
    }

    public function removeFile($index)
    {
        unset($this->documentos_solicitacao_isencao[$index]);
        $this->documentos_solicitacao_isencao = array_values($this->documentos_solicitacao_isencao);
    }

    public function removeExistingFile($index)
    {
        unset($this->existingFiles[$index]);
        $this->existingFiles = array_values($this->existingFiles);
    }
    public function store()
    {
        $this->validate(app($this->model)->rules);

        try {
            if ($this->documento_tipo_vaga) {
                $path = $this->documento_tipo_vaga->store('documentos_tipo_vaga', 'public');
                $this->data['documento_tipo_vaga'] = $path;
            }

            if ($this->documentos_solicitacao_isencao && is_array($this->documentos_solicitacao_isencao)) {
                $paths = [];
                foreach ($this->documentos_solicitacao_isencao as $file) {
                    $paths[] = $file->store('documentos_solicitacao_isencao', 'public');
                }
                $this->data['documento_solicitacao_isencao'] = json_encode($paths);
            }

            $formulario = $this->model::updateOrCreate(
                [
                    'candidato_id' => $this->candidato_id,
                    'processo_id' => $this->processo_id,
                    'processo_vaga_id' => $this->processoVaga->id,
                    'processo_tipo_vaga_id' => $this->data['processo_tipo_vaga_id'],
                ],
                $this->data
            );

            $this->emit('nextTab');
            $this->emit('dadosInscricao', $this->candidato_id, $this->processo_id, $formulario->id);
            session()->flash('message', 'Salvo com sucesso!!');
        } catch (\Exception $ex) {
            dd($ex);
            session()->flash('message', 'Algo deu errado!!');
        }
    }



    private function resetFields()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->data = [];
        $this->data = ['user_id' => Auth::user()->id];
    }
}
