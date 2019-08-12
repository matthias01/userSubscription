@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            @foreach($posts as $post)

                @role('subscriber|super-admin')
                    <div class="card mb-2">
                        <div class="card-header">
                            <h3>{{ $post->title }}</h3>
                        </div>


                        <div class="card-body">
                            {{ $post->content }}
                        </div>

                    </div>
                @else

                    @if(empty($post->is_premium))
                        <div class="card mb-2">
                            <div class="card-header">
                                <h3>{{ $post->title }}</h3>
                            </div>


                            <div class="card-body">
                                {{ $post->content }}
                            </div>

                        </div>

                    @else
                        <div class="card mb-2">
                            <div class="card-header">
                                <h3>{{ $post->title }}</h3>
                            </div>


                            <div class="card-body">
                                <p> <a href="{{ route('subscribe') }}">Subscribe Now</a> to view post</p>
                            </div>

                        </div>

                    @endif

                    @endrole

                    @endforeach
        </div>
    </div>

@endsection