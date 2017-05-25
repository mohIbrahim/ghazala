@foreach ((array) session('flash_notification') as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $message['level'] }} text-center
                    {{ $message['important'] ? 'alert-important' : '' }}"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            <strong>{!! $message['message'] !!}</strong>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
