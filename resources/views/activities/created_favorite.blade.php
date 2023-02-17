@component('activities.activity')
    @slot('heading')
        <span class="flex">
	        {{ $profileUser->name }} проголосовал за
	        <a href="{{ $activity->subject->favorited->path() }}"> сообщение</a>
        </span>
        <span>{{ $activity->subject->created_at->format('d-m-Y | H:i:s') }}</span>
    @endslot

    @slot('body')
        {{ $activity->subject->favorited->body }}
    @endslot
@endcomponent
