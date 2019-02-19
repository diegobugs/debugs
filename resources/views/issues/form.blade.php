
@if($route != 'show')
    {{Form::model($issue,['route'=>$route,'method'=>$method])}}
@else
    {{Form::model($issue)}}
    <fieldset disabled>
@endif
    {{--  TODO: Agregar los campos para guardar los issues  --}}
    {{--  <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) }}
    </div>  --}}
@if($route != 'show')
    <hr />
    {{ Form::submit('Save', ['name' => 'submit', 'class' => 'btn btn-primary']) }}
@else
    </fieldset>
@endif
{!! Form::close() !!}
