
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
@if($route != 'show')
    <hr />
    {{ Form::submit('Save', ['name' => 'submit', 'class' => 'btn btn-primary']) }}
@else
    </fieldset>
@endif
{!! Form::close() !!}
