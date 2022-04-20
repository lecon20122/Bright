@if(session()->has('success'))
    <div class="alert alert-success text-center my-3">
        {{ session()->get('success') }}
    </div>
@endif
