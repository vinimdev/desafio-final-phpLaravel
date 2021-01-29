<div class="row mt-5">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome do usuário</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: Vinícius Meira" value="{{$user->name ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Ex.: vinicius@example.com" value="{{$user->email ?? ''}}" required>
        </div>
    </div>

