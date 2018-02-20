<div class="form-group">
 {!!Form::label('name', 'First Name') !!}
 {!!Form::text('name', null, ['class' => 'form-control', 'required', 'minlength' => '2']) !!}
 {!!Form::label('surname', 'Last Name') !!}
 {!!Form::text('surname', null, ['class' => 'form-control', 'required', 'minlength' => '2']) !!}

 {!!Form::label('email', 'Email') !!}
 {!!Form::text('email', null, ['type' => 'email', 'class' => 'form-control', 'required', 'minlength' => '5']) !!}
</div>

