<section class="mb-5">
    <div class="card shadow-sm" style="background-color: #000; color: #fff;">
        <div class="card-body">
            <h5 class="mb-4">Actualizar Contraseña</h5>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <!-- Contraseña actual -->
                <div class="mb-3">
                    <label for="current_password" class="form-label">Contraseña actual</label>
                    <input id="current_password" name="current_password" type="password"
                        class="form-control @error('current_password') is-invalid @enderror"
                        required autocomplete="current-password">
                    @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Nueva contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <input id="password" name="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required autocomplete="new-password">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Confirmar -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="form-control" required autocomplete="new-password">
                </div>

                <!-- Botón -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-light text-dark fw-bold">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
