@extends('.layour.layour')


@if(session('successful'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('successful')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<form method="post" action={{route('updatePassword.post')}} >
    @csrf

    <!-- Text input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="form6Example3" class="form-control" name="passwordOld" />
        <label class="form-label" for="form6Example3" >Password old</label>
    </div>

    <!-- Text input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="form6Example4" class="form-control" name="password" />
        <label class="form-label" for="form6Example4" >password new</label>
    </div>

    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="form6Example5" class="form-control" name="pwd-repeat"/>
        <label class="form-label" for="form6Example5" >Password repeat</label>
    </div>

    <!-- Checkbox -->
    <div class="form-check d-flex justify-content-center mb-4">
        <input
            class="form-check-input me-2"
            type="checkbox"
            value=""
            id="form6Example8"
            checked
        />
        <label class="form-check-label" for="form6Example8"> Create an account? </label>
    </div>

    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
</form>
