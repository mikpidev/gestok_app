<!--Formulario para crear o editar una tienda-->
<input type="hidden" name="company_id" id="company_id" class="form-control" value="{{ old('company_id', $store->company_id ?? '') }}" required>

<label for="store_name">Nombre de la Tienda</label>
<input type="text" name="store_name" id="store_name" class="form-control" value="{{ old('store_name', $store->store_name ?? '') }}" required>

<label for="address">Dirección</label>
<input type="text" name="address" id="address" class="form-control" value="{{ old('address', $store->address ?? '') }}" required>

<label for="phone">Teléfono</label>
<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $store->phone ?? '') }}" required>

<label for="manager">Gerente</label>
<input type="text" name="manager" id="manager" class="form-control" value="{{ old('manager', $store->manager ?? '') }}" required>

<label for="email">Correo Electrónico</label>
<input type="email" name="email" id="email" class="form-control" value="{{ old('email', $store->email ?? '') }}" required>

<label for="status">Estado</label>
<select name="status" id="status" class="form-control" required>
    <option value="activa" {{ (old('status', $store->status ?? '') == 'activa') ? 'selected' : '' }}>Activa</option>
    <option value="suspendida" {{ (old('status', $store->status ?? '') == 'suspendida') ? 'selected' : '' }}>Suspendida</option>
    <option value="inactiva" {{ (old('status', $store->status ?? '') == 'inactiva') ? 'selected' : '' }}>Inactiva</option>
</select>
<label for="comments">Comentarios</label>
<textarea name="comments" id="comments" class="form-control" rows="4">{{ old('comments', $store->comments ?? '') }}</textarea>
<button type="submit" class="btn btn-primary mt-3">Guardar</button>
