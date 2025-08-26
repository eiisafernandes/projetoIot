<div class="container mt-4">

    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary mb-0">Ambientes</h2>
            <small class="text-muted">Gerencie todos os seus ambientes cadastrados.</small>
        </div>
        <a href="{{ route('ambientes.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Novo ambiente
        </a>
    </div>

    <!-- Card da tabela -->
    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Filtros -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group rounded shadow-sm">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" wire:model.live="search" class="form-control border-start-0"
                            placeholder="Buscar ambientes...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select rounded shadow-sm">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
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
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Ação</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ambientes as $ambiente)
                            <tr>
                                <td>{{ $ambiente->nome }}</td>
                                <td>{{ $ambiente->descricao }}</td>
                                <td>{{ $ambiente->status == 1 ? "Ativo" : "Inativo" }}</td>
                                <td>
                                    <a href="{{ route('ambientes.edit', $ambiente->id) }}"
                                        class="btn btn-sm btn-outline-success me-1" data-bs-toggle="tooltip"
                                        title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
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
        </div>
    </div>
</div>
