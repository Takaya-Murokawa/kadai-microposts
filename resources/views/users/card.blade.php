<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="rounded-circle img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
    </div>
    
</div>
<!--@if (Auth::id() == $user->id)-->
<!--                {{--プロフィール編集ページへのリンク --}}-->
<!--                {!! link_to_route('users.edit', 'プロフィールを編集', ['user' => $user->id], ['class' => 'btn btn-info col-sm-12']) !!}-->
<!--@else-->


    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')

<!--@endif-->