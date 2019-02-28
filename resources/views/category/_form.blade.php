{{ csrf_field() }}
<div class="form-group">
    <div class="col-4">
        <label for="name" class="">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ isset($category->name) ? $category->name : '' }}">
    </div>
</div>
<div class="form-group float-left">
    <a href="{{ routeTenant('category.index') }}" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-info">Salvar</button>
</div>