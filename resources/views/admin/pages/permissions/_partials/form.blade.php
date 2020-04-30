@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">* Nome</label>
    <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $permission->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição (Opcional)" value="{{ $permission->description ??  old('description') }}">
</div>