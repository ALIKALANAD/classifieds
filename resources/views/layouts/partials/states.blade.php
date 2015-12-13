@if(count($states) > 0)


    <div class="panel panel-default">
        <div class="panel-heading">All States</div>
        <div class="panel-body">

            <ul class="metismenu list" id="states-filter">

                @foreach($states as $state)
                    <li>
                        <a href="#" aria-expanded="false">{{ $state->state }} &nbsp;&raquo;&nbsp; {{ $state->state_abbr }}<span class="fa arrow"></span></a>

                        @if(!empty($state->cities->toArray()))
                            <ul aria-expanded="false">
                                @foreach($state->cities as $city)
                                    <li><a href="#">{{ $city->city }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

            </ul>

        </div>
    </div>



@endif