@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        {!! Form::model($microposts, ['route' => ['microposts.update', $microposts->id], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('content', '投稿編集:') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>
            
            <!--<div class="form-group">-->
            <!--    {!! Form::label('profile', 'Profile:') !!}-->
            <!--    {!! Form::text('profile', null, ['class' => 'form-control']) !!}-->
            <!--</div>-->

            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection