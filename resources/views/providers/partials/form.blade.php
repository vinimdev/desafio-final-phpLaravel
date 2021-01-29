<div class="row mt-5">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome do fornecedor</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: Grupo Unidev" value="{{$provider->name ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail do fornecedor</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="unidev@example.com" value="{{$provider->email ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-10">
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Ex.: (71) 99999-9999" value="{{$provider->phone ?? ''}}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <hr>
        <button type="submit" class="btn btn-success">Registrar fornecedor</button>
    </div>
</div>
