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

                @foreach ($activities as $date => $activity)
                    <div class="pt-3 mb-4 border-bottom">
                        <h4>{{ $date }}</h4>
                    </div>
                    @foreach ($activity as $record)
                        @if (view()->exists("activities.{$record->type}"))
                            @include ("activities.{$record->type}", ['activity' => $record])
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
