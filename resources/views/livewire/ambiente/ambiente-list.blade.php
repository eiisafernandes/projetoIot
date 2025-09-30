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
                            placeholder="Buscar ambientes...">
                    </div>
                </div>

            </div>

            

            <!-- Tabela -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ambientes as $ambiente)
                            <tr>
                                <td>{{ $ambiente->nome }}</td>
                                <td>{{ $ambiente->descricao }}</td>
                                <td>{{ $ambiente->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                                <td>
                                    <a href="{{ route('ambientes.edit', $ambiente->id) }}"
                                        class="btn btn-sm btn-outline-success me-1" data-bs-toggle="tooltip"
                                        title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <button wire:click="delete({{ $ambiente->id }})"
                                        class="btn btn-sm btn-outline-danger me-1" title="Excluir"
                                        wire:confirm="Tem certeza?">
                                        <i class="bi bi-trash"></i>
                                    </button>
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
            {{ $ambientes->links() }}
        </div>
    </div>
</div>
