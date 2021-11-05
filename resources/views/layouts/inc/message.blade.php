@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Veuillez vérifier que le formulaire ci-dessous ne contient pas d'erreurs
        {{ implode('', $errors->all(':message')) }}
    </div>
@endif
