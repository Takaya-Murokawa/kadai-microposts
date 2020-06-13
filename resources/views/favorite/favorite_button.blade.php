
    @if (Auth::user()->is_favorite($micropost->id))<!--$micropostId-->
        {{-- アンファボ-ボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-warning btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- ファボ-ボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id],'method' => 'post']) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
