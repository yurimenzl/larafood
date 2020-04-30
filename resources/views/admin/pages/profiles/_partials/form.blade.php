@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">* Nome</label>
    <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $profile->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição (Opcional)" value="{{ $profile->description ??  old('description') }}">
</div>