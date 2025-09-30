<div class="container mt-4">

    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">


        <div>
            <h2 class="fw-bold text-primary mb-0">Registro</h2>
            <small class="text-muted">Gerencie todos os seus registros cadastrados.</small>
        </div>
    </div>

    <!-- Card da tabela -->
    <div class="card shadow-sm">
        <div class="card-body">

            @if (session()->has('success'))
                <div class="alert alert-dismissible alert-success fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Filtros -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group rounded shadow-sm">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" wire:model.live="search" class="form-control border-start-0"
                            placeholder="Buscar registros...">
                    </div>
                </div>

            </div>

            <!-- Mensagem de sucesso -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Tabela -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Id de Sensor</th>
                            <th>Valor</th>
                            <th>Unidade</th>
                            <th>Data e Hora</th>
                            <th>Ação</th>

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
                                    <button wire:click="delete({{ $registro->id }})"
                                        class="btn btn-sm btn-outline-danger me-1" title="Excluir"
                                        wire:confirm="Tem certeza?">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Nenhum registro encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $registros->links() }}
        </div>
    </div>
</div>
