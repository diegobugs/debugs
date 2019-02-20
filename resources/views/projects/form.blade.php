
@if($route != 'show')
{{Form::model($project,['route'=>$route,'method'=>$method])}}
@else
{{Form::model($project)}}
    <fieldset disabled>
@endif
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {{ Form::text('name', Input::old('name'), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            @include('layouts.errorMessages', ['field' => 'name'])
        </div>
        <div class="form-group">
            {!! Form::label('skey', 'Shortcut key') !!}
            {{ Form::text('skey', Input::old('skey'), ['class' => 'form-control'. ($errors->has('skey') ? ' is-invalid' : ''), 'placeholder' => 'Shortcut key']) }}
            @include('layouts.errorMessages', ['field' => 'skey'])
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', Input::old('description'), ['class' => 'form-control'. ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description of the project']) !!}
            @include('layouts.errorMessages', ['field' => 'description'])
        </div>
@if($route != 'show')
        <hr />
        {{ Form::submit('Save', ['name' => 'submit', 'class' => 'btn btn-primary']) }}
@else
    </fieldset>
@endif
{!! Form::close() !!}
