<div class="container mt-4">

    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">


        <div>
            <h2 class="fw-bold text-primary mb-0">Sensor</h2>
            <small class="text-muted">Gerencie todos os status dos seus sensores cadastrados.</small>
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
                            placeholder="Buscar sensores...">
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
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensors as $sensor)
                            <tr>
                                <td>{{ $sensor->codigo }}</td>
                                <td>{{ $sensor->tipo }}</td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="form-check form-switch me-2">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="status-{{ $sensor->id }}" wire:click="status({{ $sensor->id }})"
                                                @checked($sensor->status)>
                                        </div>

                                        <span class="badge bg-{{ $sensor->status ? 'success' : 'danger' }}">
                                            {{ $sensor->status ? 'ATIVO' : 'INATIVO' }}
                                        </span>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Nenhum ambiente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $sensors->links() }}
        </div>
    </div>
</div>
