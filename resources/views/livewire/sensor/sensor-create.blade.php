<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Aumentei de col-md-6 para col-md-8 -->
            <!-- Card com o formulário de cadastro -->
            <div class="card shadow-lg border-light rounded">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Cadastro de Ambiente</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        <!-- Campo codigo -->
                        <div class="mb-3">
                            <label for="codigo" class="form-label">codigo</label>
                            <input type="text" class="form-control" id="codigo" wire:model="codigo" placeholder="codigo do Ambiente">
                            
                        </div>

                        <!-- Campo descricao -->
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao" wire:model="descricao">
                           
                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label">tipo</label>
                            <input type="text" class="form-control" id="tipo" wire:model="tipo" placeholder="tipo do Ambiente">
                            
                        </div>                       

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" aria-label="status" id="status" wire:model="status">
                                <option selected>Selecione seu status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>



                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary w-48 rounded-pill shadow-sm">Cadastrar</button>
                            <a href="{{ route('sensor.list') }}" class="btn btn-secondary w-48 rounded-pill shadow-sm">Voltar</a>
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>