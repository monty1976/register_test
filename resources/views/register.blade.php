@extends('admin')
@section('content')
{!! Form::open(array('route' => array('doRegister'))) !!}

         <!--- password Field --->
         <div class="form-group">
             {!! Form::label('password', 'password:') !!}
             {!! Form::text('password', null, ['class' => 'form-control']) !!}
         </div>

         <!--- email Field --->
         <div class="form-group">
             {!! Form::label('email', 'email:') !!}
             {!! Form::text('email', null, ['class' => 'form-control']) !!}
         </div>

         <!--- first_name Field --->
         <div class="form-group">
             {!! Form::label('name', 'Name:') !!}
             {!! Form::text('name', null, ['class' => 'form-control']) !!}
         </div>

         <!--- save Field --->
         <div class="form-group">
             {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
         </div>

{!! Form::close() !!}

@if($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif

@if (Session::has('myError'))

    <p>Bruger findes</p>


@endif


@endsection