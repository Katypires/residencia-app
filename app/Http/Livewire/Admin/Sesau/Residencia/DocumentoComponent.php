<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use App\Models\Admin\Sesau\Residencia\Documento;
use App\Models\Admin\Sesau\Residencia\Formulario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentoComponent extends Component
{
    use WithFileUploads;

    public $nome, $documento_id, $imagem,$model;
    public $documento_provab, $documento_solicitacao_isencao,$documento_ampla_concorrencia;

    protected $listeners = ["salvarDocumento"=> "salvar"];

    public function render()
    {
        $documentos = Formulario::all();
        return view('livewire.admin.sesau.residencia.documento-component', compact('documentos'));
    }

    public function salvar()
    {    
        try {
            if ($this->documento_id) { 
                // Atualização de um documento existente
                $documento = Formulario::findOrFail($this->documento_id);
                // dd($this->documento_id);
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
                dd($this->imagem);
                // Criação de um novo documento
                $documento = Formulario::create([
                    'user_id' => Auth::id(),
                    'documento_provab' => $this->documento_provab,
                    'documento_solicitacao_isencao' => $this->documento_solicitacao_isencao,
                    'documento_ampla_concorrencia' => $this->documento_ampla_concorrencia,
                ]);

                if ($this->imagem) {
                    // Associa a imagem ao novo documento
                    $caminho = $this->imagem->getRealPath();
                    dd($this->caminho);
                    $documento->addMedia($caminho)->toMediaCollection('images');
                }
            }

            // Limpar os campos após salvar
            $this->reset(['nome', 'documento_id', 'imagem', 'documento_provab','documento_solicitacao_isencao','documento_ampla_concorrencia']);
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
