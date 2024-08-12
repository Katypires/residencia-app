<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Sesau\Residencia\Formulario;




class CrudFormComponent extends Component
{
    use WithFileUploads;
    
    public $model, $form, $title, $modalId, $type, $formType,$modelName,$dados=[];
    public $data = [];
    public $nome, $documento_id, $imagem;
    public $openForm = false;
    public $documento_provab, $documento_solicitacao_isencao,$documento_ampla_concorrencia;

    
    protected $listeners = [
        'editCrudForm' => 'edit',
        'deleteCrudForm' => 'delete',
        'selectedColumn',
        'selectedTitulo',
        'viewFormCrud'
    ];

  

    public function mount($dados,$formType, $title, $model, $form){
        $this->data = $dados;
        $this->formType = $formType;
        $this->title = $title;
        $this->model = $model;
        $this->form = $form;
    }

    public function render()
    {
        $documentos = $this->model::all();
        return view('livewire.admin.sesau.residencia.crud-form-component', compact('documentos'));
    }

    public function edit($data){ 
        // dd("edit");      
        try {
           $this->type = 'update';
           $this->data = $data;
        } catch (\Exception $ex) {
            session()->flash('message','Algo deu errado!!');
        }
    }

    public function delete($data){       
        // dd("delete");
        try {
           $this->type = 'delete';
           $this->data = $data;
        //    dd($this->data['id']); 
        } catch (\Exception $ex) {
            session()->flash('message','Algo deu errado!!');
        }
    }

    public function store()
    {
        $this->validate(app($this->model)->rules);
        try {
            app($this->model)::create($this->data);
            session()->flash('message','Criado com sucesso!!');
            $this->resetFields();
            $this->emit('refreshCrudTable');
            $this->emit('closeFormCrud');
            $this->emit('openTipoProcesso');
            $this->salvarDocumento();
        } catch (\Exception $ex) {
            dd($ex);
            session()->flash('message','Algo deu errado!!');
        }
    }

    public function update()
    {
        // dd("update");
        $this->validate(app($this->model)->rules);
        try {
            app($this->model)::find($this->data['id'])->update($this->data);
            session()->flash('message','Atualizado com sucesso!!');
            $this->emit('refreshCrudTable');
            $this->emit('closeFormCrud');
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('message','Algo deu errado!!');
        }
    }

    public function destroy()
    {
        // dd("destroy");
        try{
            $destroy = app($this->model)::find($this->data['id']);
            $destroy ? $destroy->delete() : false;
            session()->flash('message',"Deletado com sucesso!!");
            $this->emit('refreshCrudTable');
            $this->emit('closeFormCrud');
        }catch(\Exception $e){
            session()->flash('message',"Algo deu errado!!");
        }
    }

    public function cancel()
    {
        $this->resetFields();
    }

    private function resetFields(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->data = [];
    }

    public function selectedColumn($value, $label){
        $this->data[$label] = $value;
    }

    public function selectedTitulo($value, $label){
        $this->data[$label] = $value;
    }
    
    public function viewFormCrud($data){
       $this->type = 'view'; 
       $this->data = $data;
    }

    //SALVAR DOCUMENTOS
    public function salvarDocumento()
    {
        try {
            if ($this->documento_id) {
                // Atualização de um documento existente
                $documento = Formulario::findOrFail($this->documento_id);
                $documento->update([
                    'documento_provab' => $this->documento_provab,
                    'documento_solicitacao_isencao' => $this->documento_solicitacao_isencao,
                    'documento_ampla_concorrencia' => $this->documento_ampla_concorrencia,
                ]);

                if ($this->imagem) {
                    // Remove a imagem anterior, se existir, e associa a nova imagem
                    if ($documento->getFirstMedia('images')) {
                        $documento->getFirstMedia('images')->delete();
                    }
                    $caminho = $this->imagem->getRealPath();
                    $documento->addMedia($caminho)->toMediaCollection('images');
                }
            } else {
                // dd($this->documento_id);
                // Criação de um novo documento
                $documento = Formulario::create([
                    'user_id' => Auth::id(),
                    'documento_provab' => $this->documento_provab,
                    'documento_solicitacao_isencao' => $this->documento_solicitacao_isencao,
                    'documento_ampla_concorrencia' => $this->documento_ampla_concorrencia,
                ]); 
                // dd($documento);
                if ($this->imagem) {
                    // Associa a imagem ao novo documento
                    $caminho = $this->imagem->getRealPath();
                    $documento->addMedia($caminho)->toMediaCollection('images');
                }
            }

            // Limpar os campos após salvar
            $this->reset(['nome', 'documento_id', 'imagem']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function editar($id)
    {
        $documento = Formulario::findOrFail($id);

        $this->documento_id = $documento->id;
        $this->nome = $documento->nome;
    }

    public function excluirImagem($id)
    {
        try {
            $documento = Formulario::find($id);
            $imagem = $documento->getFirstMedia('images');

            if ($imagem) {
                $imagem->delete();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function excluir($id)
    {
        try {
            $documento = Formulario::findOrFail($id);

            if ($documento->getFirstMedia('images')) {
                $this->excluirImagem($id);
            }

            $documento->delete();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
