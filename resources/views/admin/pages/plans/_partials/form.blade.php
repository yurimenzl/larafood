@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="price">Preço</label>
    <input type="text" class="form-control" name="price" placeholder="Preço:" value="{{ $plan->price ??  old('price') }}">
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição (Opcional)" value="{{ $plan->description ??  old('description') }}">
</div>