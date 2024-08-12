<div>
    {{-- {{var_dump($documentos)}} --}}
    {{-- <div>
        <label for="nome">documento_provab:</label>
        <input type="text" wire:model.defer="documento_provab" id="documento_provab">
        @error('documento_provab')
            {{ $message }}
        @enderror

        <label for="nome">isencao inscricao:</label>
        <input type="text" wire:model.defer="documento_provab" id="documento_provab">
        @error('documento_provab')
            {{ $message }}
        @enderror

        <br>

        <label for="imagem">imagem</label>
        <input type="file" wire:model="documento_provab" id="">
        @error('nome')
            {{ $message }}
        @enderror


        <button wire:submit.prevent="salvar">Salvar</button>
    </div>
    <hr> --}}

   

    <table>
        @forelse ($documentos as $documento)
            <tr>
                <td>{{ $documento->user_id }}</td>
                <td>{{ $documento->id }}</td>
                <td>
                    <h1>{{ $documento->documento_provab }}</h1>
                    <h1>{{ $documento->documento_solicitacao_isencao }}</h1>
                    <h1>{{ $documento->documento_ampla_concorrencia }}</h1>
                </td>
                <td>
                    @if ($documento->getFirstMedia('images'))
                        <img src="{{ asset('storage/' . $documento->getFirstMedia('images')->id . '/' . $documento->getFirstMedia('images')->file_name) }}"
                            alt="Imagem do Documento">
                    @else
                        <span>Sem imagem</span>
                    @endif
                </td>
                <td>
                    <button wire:click="editar({{ $documento->id }})">Editar registro</button>
                    <button wire:click="excluirImagem({{ $documento->id }})">Apagar Imagem</button>
                    <button wire:click="excluir({{ $documento->id }})">Apagar registro</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <h1>sem nada</h1>
                </td>
            </tr>
        @endforelse
    </table>
</div>
