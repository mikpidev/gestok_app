<section>
    <div class="card shadow-sm" style="background-color: #000; color: #fff;">
        <div class="card-body">
            <h5 class="mb-3 text-danger">Eliminar Cuenta</h5>
            <p class="text-muted">Una vez eliminada tu cuenta, todos tus datos serán borrados permanentemente.</p>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="d-grid">
                    <button type="submit" class="btn btn-danger fw-bold">
                        Eliminar mi cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
