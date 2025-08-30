<!--Form para crear y editar informacion fiscal de la tienda-->

<input type="hidden" name="company_id" value="{{ $store->company->id }}">

<input type="hidden" name="store_id" value="{{ $store->id }}">

<label for="nit">NIT</label>
<input type="text" name="nit" id="nit" class="form-control" value="{{ old('nit', $storeTaxInfo->nit ?? '') }}" required>

<label for="ncr">ncr</label>
<input type="text" name="ncr" id="ncr" class="form-control" value="{{ old('ncr', $storeTaxInfo->ncr ?? '') }}" required>

<label for="razon_social">Razón Social</label>
<input type="text" name="razon_social" id="razon_social" class="form-control" value="{{ old('razon_social', $storeTaxInfo->razon_social ?? '') }}" required>

<label for="actividad_economica">Actividad Económica</label>
<input type="text" name="actividad_economica" id="actividad_economica" class="form-control" value="{{ old('actividad_economica', $storeTaxInfo->actividad_economica ?? '') }}" required>

<label for="direccion_fiscal">Dirección Fiscal</label>
<input type="text" name="direccion_fiscal" id="direccion_fiscal" class="form-control" value="{{ old('direccion_fiscal', $storeTaxInfo->direccion_fiscal ?? '') }}" required>

<label for="email">Correo Electrónico</label>
<input type="email" name="email" id="email" class="form-control" value="{{ old('email', $storeTaxInfo->email ?? '') }}" required>

<label for="telefono">Teléfono</label>
<input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $storeTaxInfo->telefono ?? '') }}" required>

<label for="cert_firma_digital">Certificado de Firma Digital</label>
<input type="text" name="cert_firma_digital" id="cert_firma_digital" class="form-control" value="{{ old('cert_firma_digital', $storeTaxInfo->cert_firma_digital ?? '') }}" required>

<label for="estado">Estado</label>
<select name="estado" id="estado" class="form-control" required>
    <option value="activo" {{ (old('estado', $storeTaxInfo->estado ?? '') == 'activo') ? 'selected' : '' }}>Activo</option>
    <option value="inactivo" {{ (old('estado', $storeTaxInfo->estado ?? '') == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
</select>

<label for="comentarios">Comentarios</label>
<textarea name="comentarios" id="comentarios" class="form-control" rows=4">{{ old('comentarios', $storeTaxInfo->comentarios ?? '') }}</textarea>

<button type="submit" class="btn btn-primary mt-3">Guardar</button>

<!--Fin del form-->

