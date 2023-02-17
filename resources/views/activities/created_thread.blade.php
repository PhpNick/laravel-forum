@component('activities.activity')
    @slot('heading')
        <span class="flex">
	        {{ $profileUser->name }} опубликовал
	        <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
        </span>
        <span>{{ $activity->subject->created_at->format('d-m-Y | H:i:s') }}</span>
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent
