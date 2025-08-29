<label for="company_name">Nombre de la Compañía</label>
<input type="text" name="company_name" id="company_name" class="form-control" value= "{{ old('company_name', $company->company_name ?? '') }}" required>

<label for="address">Dirección</label>
<input type="text" name="address" id="address" class="form-control" value="{{ old('address', $company->address ?? '') }}" required>

<label for="phone">Teléfono</label>
<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $company->phone ?? '') }}" required>

<label for="owner">Dueño</label>
<input type="text" name="owner" id="owner" class="form-control" value="{{ old('owner', $company->owner ?? '') }}" required>

<label for="email">Correo Electrónico</label>
<input type="email" name="email" id="email" class="form-control" value="{{ old('email', $company->email ?? '')  }}" required>

<label for="website">Sitio Web </label>
<input type="url" name="website" id="website" class="form-control" value="{{ old('website', $company->website ?? '') }}">

<label for="plan">Plan</label>
<select name="plan" id="plan" class="form-control" required>
    <option value="free" {{ (old('plan', $company->plan ?? '') == 'free') ? 'selected' : '' }}>Free</option>
    <option value="basic" {{ (old('plan', $company->plan ?? '') == 'basic') ? 'selected' : '' }}>Basic</option>
    <option value="premium" {{ (old('plan', $company->plan ?? '') == 'premium') ? 'selected' : '' }}>Premium</option>
</select>

<label for="deployment_type">Tipo de Despliegue</label>
<select name="deployment_type" id="deployment_type" class="form-control" required>
    <option value="saas" {{ (old('deployment_type', $company->deployment_type ?? '') == 'saas') ? 'selected' : '' }}>SaaS</option>
    <option value="on_premise" {{ (old('deployment_type', $company->deployment_type ?? '') == 'on_premise') ? 'selected' : '' }}>On-Premise</option>
</select>

<label for="status">Estado</label>
<select name="status" id="status" class="form-control" required>
    <option value="activa" {{ (old('status', $company->status ?? '') == 'activa') ? 'selected' : '' }}>Activa</option>
    <option value="suspendida" {{ (old('status', $company->status ?? '') == 'suspendida') ? 'selected' : '' }}>Suspendida</option>
    <option value="inactiva" {{ (old('status', $company->status ?? '') == 'inactiva') ? 'selected' : '' }}>Inactiva</option>          
</select>

<label for="comments">Comentarios</label>
<textarea name="comments" id="comments" class="form-control" rows="4">{{ old('comments',  $company->comments ?? '') }}</textarea>

<button type="submit" class="btn btn-primary mt-3">Guardar</button>