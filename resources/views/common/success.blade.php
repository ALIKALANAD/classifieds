@if(session('success') || session('status'))

    <div class="alert alert-success">
        <strong><i class="fa fa-check"></i>&nbsp;Success!</strong>

        @if(session('success'))
            {{ session('success') }}
        @endif

        @if(session('status'))
            {{ session('status') }}
        @endif

    </div>

@endif