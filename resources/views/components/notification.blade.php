<div>
    @if (Session::has('success'))
        <div class="alert alert-success mt-2">
            <i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    @if (Session::has('warning'))
        <div class="alert alert-danger mt-2">
            <i class="fa fa-spin fa-refresh"></i> {{ Session::get('warning') }}
            @php
                Session::forget('warning');
            @endphp
        </div>
    @endif


    @if (Session::has('info'))
        <div class="alert alert-warning mt-2">
            <i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('info') }}
            @php
                Session::forget('info');
            @endphp
        </div>
    @endif
</div>

