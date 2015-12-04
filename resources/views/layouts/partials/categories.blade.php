@if(count($categories) > 0)

    <div class="panel panel-default">
        <div class="panel-heading">All Categories</div>
        <div class="panel-body">

            <ul class="metismenu" id="category-filter">

                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('category.show', [$category->id]) }}" aria-expanded="false">{{ $category->name }} <span class="fa arrow"></span></a>

                        @if(!empty($category->sub_categories->toArray()))
                            <ul aria-expanded="false">
                                @foreach($category->sub_categories as $sub)
                                    <li><a href="{{ route('category.show', [$sub->id]) }}">{{ $sub->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

            </ul>

        </div>
    </div>

@endif