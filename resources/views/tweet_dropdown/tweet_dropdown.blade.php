@if (Auth::id() == $micropost->user_id)
    {{-- 投稿削除ボタンのフォーム --}}
    
    <div class="dropdown float-right">
      <!-- 切替ボタンの設定 -->
      <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        1
      </a>
      <!-- ドロップメニューの設定 -->
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">
            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                {!! Form::submit('Delete') !!}
            {!! Form::close() !!}
        </a>
        
      </div><!-- /.dropdown-menu -->
    </div><!-- /.dropdown -->
@endif