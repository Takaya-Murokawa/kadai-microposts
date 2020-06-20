
@if (count($microposts) > 0)
    <ul class="list-unstyled ">
        @foreach ($microposts as $micropost)
            <li class="media mb-3 shadow-sm p-3 mb-2 bg-light rounded">
                <!--shadow-sm p-3 mb-2 bg-light rounded 投稿のブロックに影をつける-->
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                
                <img class="mr-2 rounded-circle " src="{{ Gravatar::get($micropost->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body " >
                    
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        <font size="4">
                            {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        </font>
                        <span class="text-muted"><font size="1.5">{{ $micropost->created_at}}</font></span>
                         
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0"> {!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    
                    <!--<div class="d-flex flex-row justify-content-start　padding-right" style="15px" >-->
                    <div class="d-flex flex-row justify-content-sm-start">
                        {{-- ファボ／アンファボボタン --}}
                        @include('favorite.favorite_button')
                        
                        
                        @if (Auth::id() == $micropost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm ']) !!}
                            {!! Form::close() !!}
                            
                            {!! link_to_route('microposts.edit', 'edit', ['micropost' => $micropost->id], ['class' => 'btn btn-sm btn-secondary ']) !!}
                            
                        @endif
                        
                    </div>
                    
                </div>
            </li>
        @endforeach
        
      
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif