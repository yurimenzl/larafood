@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" placeholder="Nome do detalhe" class="form-control" value="{{ $detail->name ?? old('name') }}">
</div>