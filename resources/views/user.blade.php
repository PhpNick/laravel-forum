@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">

                <div class="py-3 mb-4 border-bottom">
                    <h1>
                        {{ $profileUser->name }}
                        <small class="text-muted">Профиль был создан {{ $profileUser->created_at->format('d-m-Y') }} в {{ $profileUser->created_at->format('H:i:s') }}</small>
                    </h1>
                </div>

                @foreach ($threads as $thread)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="level">
                               <span class="flex">
                                    <a href="{{ route('user', $thread->creator) }}">{{ $thread->creator->name }}</a> опубликовал:
                                    <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                               </span>

                                <span>{{ $thread->created_at->format('d-m-Y | H:i:s') }}</span>
                            </div>
                        </div>

                        <div class="card-body">
                            {{ $thread->body }}
                        </div>
                    </div>
                @endforeach

                {{ $threads->links() }}

            </div>
        </div>
    </div>
@endsection
