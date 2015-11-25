@if(Session::has('success'))

    <div class="alert alert-success">
        <strong><i class="fa fa-check"></i>&nbsp;Success</strong>

        {{ Session::get('success') }}
    </div>

@endif