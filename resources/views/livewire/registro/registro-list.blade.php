<div class="mt-5">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group rounded shadow-sm">
                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                <input type="text" wire:model.live="search" class="form-control border-start-0"
                    placeholder="Buscar sensores...">
            </div>
        </div>

    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>ID Sensor</th>
                    <th>Valor</th>
                    <th>Unidade</th>
                    <th>Data e hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->sensor->id }}</td>
                        <td>{{ $registro->valor }}</td>
                        <td>{{ $registro->unidade }}</td>
                        <td>{{ $registro->data_hora }}</td>
                        <td>
                            <button wire:click="delete({{ $registro->id }})" class="btn btn-sm btn-outline-danger me-1"
                                title="Excluir" wire:confirm="Tem certeza?">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhum ambiente encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
