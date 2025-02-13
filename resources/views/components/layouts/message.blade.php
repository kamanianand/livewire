@if (session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <strong>Success :</strong>&nbsp;
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <strong>Error :</strong>&nbsp;
        {{ session('error') }}
    </div>
@endif

@foreach ($errors->all() as $error)
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <span class="alert-icon text-danger me-2">
            <i class="ti ti-ban ti-xs"></i>
        </span>
        {{ $error }}
    </div>
@endforeach