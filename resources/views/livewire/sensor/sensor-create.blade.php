<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Aumentei de col-md-6 para col-md-8 -->
            <!-- Card com o formulário de cadastro -->
            <div class="card shadow-lg border-light rounded">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Cadastro de Sensor</h4>
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
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" wire:model="codigo"
                                placeholder="Ex: S23">
                            @error('codigo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <!-- Campo descricao -->
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao" wire:model="descricao">
                            

                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" wire:model="tipo"
                                placeholder="Ex: Luminosidade">
                            @error('tipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" aria-label="status" id="status" wire:model="status">
                                <option selected>Selecione seu status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ambiente_id" class="form-label">Ambiente</label>
                            <select class="form-select" aria-label="ambiente_id" id="ambiente_id"
                                wire:model="ambiente_id">
                                @foreach ($ambientes as $ambiente)
                                    <option value="{{ $ambiente->id }}"> {{ $ambiente->nome }}</option>
                                @endforeach
                            </select>
                            @error('ambiente_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit"
                                class="btn btn-primary w-48 rounded-pill shadow-sm">Cadastrar</button>
                            <a href="{{ route('sensor.list') }}"
                                class="btn btn-secondary w-48 rounded-pill shadow-sm">Voltar</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
