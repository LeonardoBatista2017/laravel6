
@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>Nome:</label>
     <input type="text" name="name" class="form-control" placeholder="Nome">
 </div>
 <div class="form-group">
     <label>Preço:</label>
     <input type="text" name="price" class="form-control" placeholder="Preço">
 </div>
 <div class="form-group">
     <label>Descrição</label>
     <input type="text" name="description" class="form-control" placeholder="Descrição">
 </div>
 <div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>