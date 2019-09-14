@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('success'))
<div class="m-alert m-alert--icon alert m-alert--square alert-success m--margin-bottom-25" role="alert">
    <div class="m-alert__icon">
        <i class="la la-check-circle-o"></i>
    </div>
    <div class="m-alert__text">
        <strong>Berhasil!</strong> {{ session()->get('success') }}
    </div>
    <div class="m-alert__close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
</div>
@endif
@if(session()->has('danger'))
<div class="m-alert m-alert--icon alert m-alert--square alert-danger m--margin-bottom-25" role="alert">
    <div class="m-alert__icon">
        <i class="la la-exclamation-circle"></i>
    </div>
    <div class="m-alert__text">
        <strong>Gagal!</strong> {{ session()->get('danger') }}
    </div>
    <div class="m-alert__close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
</div>
@endif
