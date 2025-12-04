<div class="d-flex justify-content-center align-items-center">

    <div class="card col-4">
        <div class="card-header text-center">
            <h4>Faça seu Login!</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" wire:model.defer="email">
                    @error
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password">
                    @error
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>

        </div>
    </div>
</div>