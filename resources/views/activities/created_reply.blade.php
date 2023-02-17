@component('activities.activity')
    @slot('heading')
        <span class="flex">
	        {{ $profileUser->name }} ответил в
	        <a href="{{ $activity->subject->thread->path() }}">"{{ $activity->subject->thread->title }}"</a>
        </span>
        <span>{{ $activity->subject->created_at->format('d-m-Y | H:i:s') }}</span>
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent
