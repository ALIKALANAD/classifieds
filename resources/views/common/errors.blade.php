@if(count($errors) > 0)

    <div class="alert alert-danger">
        <strong><i class="fa fa-warning"></i>&nbsp;Whoops! Something went wrong!</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif