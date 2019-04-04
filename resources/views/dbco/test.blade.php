@extends('dbco.layouts.main')

@section('content')
            <div class="content">
                <div class="title m-b-md" style="text-align:center;">
                   <h1>{{ $page['title'] }}</h1>
				   <h4>{{ $page['content'][0]['title'] }}</h4>
				   <div class="">{!! $page['content'][0]['text'] !!}</div>
				   <h4>{{ $page['content'][1]['title'] }}</h4>
				   <div class="">{!! $page['content'][1]['text'] !!}</div>
                </div>
            </div>
@endsection