@if(!empty($categories))

    <ul class="metismenu" id="category-filter">

        @foreach($categories as $category)
            <li>
                <a href="#" aria-expanded="false">{{ $category->name }} <span class="fa arrow"></span></a>

                @if(!empty($category->sub_categories->toArray()))
                    <ul aria-expanded="false">
                        @foreach($category->sub_categories as $sub)
                            <li><a href="#">{{ $sub->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach

    </ul>

@endif