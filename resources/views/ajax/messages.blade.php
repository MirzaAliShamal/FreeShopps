@foreach($thread->messages as $item)
    <div class="bubble {{ $item->user_id == $user->id ? 'me' : 'you'}}">
        <span style="font-weight:bold;">{{ $item->user_id == $user->id ? 'Me' : 'Anonymous'}}</span><br>
        {{ $item->body }}
    </div>
@endforeach
