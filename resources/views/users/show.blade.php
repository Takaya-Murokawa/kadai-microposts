@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            
            {{-- ユーザ情報 --}}
            @include('users.card')
            
            @if (Auth::id() == $user->id)
                {{--プロフィール編集ページへのリンク --}}
                {!! link_to_route('users.edit', 'プロフィールを編集', ['user' => $user->id], ['class' => 'btn btn-info col-sm-12']) !!}
            @endif
            
        </aside>
        <div class="col-sm-8">
            
            {{-- タブ --}}
            @include('users.navtabs')
            
            
            {{--自分自身の場合は投稿フォームを追加--}}
            @if (Auth::id() == $user->id)
                {{-- 投稿フォーム --}}
                @include('microposts.form')
            @endif
            
            {{-- 投稿一覧 --}}
            @include('microposts.microposts')
        </div>
    </div>
@endsection