
@if($route != 'show')
    {{Form::model($project,['route'=>$route,'method'=>$method])}}
@else
    {{Form::model($project)}}
    <fieldset disabled>
@endif
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) }}
    </div>
    <div class="form-group">
        {!! Form::label('skey', 'Shortcut key') !!}
        {{ Form::text('skey', Input::old('skey'), ['class' => 'form-control', 'placeholder' => 'Shortcut key']) }}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Description of the project']) !!}
    </div>
@if($route != 'show')
    <hr />
    {{ Form::submit('Save', ['name' => 'submit', 'class' => 'btn btn-primary']) }}
@else
    </fieldset>
@endif
{!! Form::close() !!}
