<section class="mb-5">
    <div class="card shadow-sm" style="background-color: #000; color: #fff;">
        <div class="card-body">
            <h5 class="mb-4">Información del Perfil</h5>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input id="name" name="name" type="text" 
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', auth()->user()->name) }}" required autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" name="email" type="email" 
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Botón -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-light text-dark fw-bold">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
