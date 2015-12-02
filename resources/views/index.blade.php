@extends('layouts.master')

@section('content')

    <div class="container">


        <div class="row">

            @if(!empty($categories))

                    <?php
                        $counter = 1;
                        $column_count = 3;
                        $row_count = round(count($categories) / $column_count);
                    ?>

                    @foreach($categories as $category)
                       <div class="panel panel-default">
                           <div class="panel-body">
                               <a href="{{ route('category.show', [$category->id]) }}">{{ $category->name }}</a>

                               @if(!empty($category->sub_categories->toArray()))
                                   <ol>
                                       @foreach($category->sub_categories as $sub)
                                           <li>
                                               <a href="{{ route('category.show', [$sub->id]) }}">{{ $sub->name }}</a>
                                           </li>
                                       @endforeach
                                   </ol>
                               @endif
                           </div>
                       </div>

                    @endforeach

            @endif

        </div>

    </div>

@endsection