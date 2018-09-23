@extends('layouts.app')

@section('content')
  <div class="container">
    <ais-index app-id="{{ config('scout.algolia.id') }}"
                api-key="{{ env('ALGOLIA_SEARCH') }}"
                index-name="posts">
      <h1>Search for Posts</h1>

      <ais-input placeholder="Search contacts..." class="form-control input-lg"></ais-input>

           <ais-results>
               <template scope={result}>
                   <div class="row" style="margin-top: 20px;">
            <div class="col-md-8">
                <a :href="('/post/'+result.id)"><h3>@{{ result.title }}</h3></a>
                {{-- <a href="/posts/@{{ result.id }}"><h3>@{{ result.title }}</h3></a> --}}
            </div>

            <div class="col-md-4">

                <h4 v-if="result.published"><span class="label label-success pull-right">Published</span></h4>

                <h4 v-if="!result.published"><span class="label label-default pull-right">Draft</span></h4>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>@{{ result.content }}</p>
            </div>
        </div>
               </template>
           </ais-results>

    </ais-index>
  </div>
@endsection
