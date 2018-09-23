@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Search</h1>

    <form action="{{ route('posts.search') }}" method="get">

        {{ csrf_field() }}

        <div class="input-group">
            <input type="text" name="q" class="form-control input-lg" placeholder="search..." value="{{ old('q') }}">

        <span class="input-group-btn">
            <button type="submit" class="btn btn-default btn-lg">Search</button>
        </span>
        </div>

    </form>
        <hr>

        @foreach ($results as $post)
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-8">
                <a href="{{ route('posts.show', $post->id) }}"><h3>{{ $post->title }}</h3></a>
            </div>

            <div class="col-md-4">
                @if($post->published)
                <h4><span class="label label-success pull-right">Published</span></h4>
                @else
                <h4><span class="label label-default pull-right">Draft</span></h4>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>{{ str_limit($post->content, 200) }}</p>
            </div>
        </div>
        @endforeach

        @if(count($results) > 0)
        <div class="text-center">
            {{ $results->links() }}
        </div>
        @endif
</div>

@endsection
