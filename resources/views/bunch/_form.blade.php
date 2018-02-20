<div class="form-group">
 {!!Form::label('name', 'Name') !!}
 {!!Form::text('name', null, ['class' => 'form-control', 'required', 'minlength' => '5']) !!}
  </div>
 
<div class="form-group">
  {{-- {!!Form::hidden('created_by', Auth::user()->id, []) !!} --}}

 {!!Form::label('subscriber_id', 'Subscribers to send emails') !!}
 {!! Form::select( 'subscriber_id[]', $subscribers, $selected_subs, ['class' => 'form-control', 'multiple'] ) !!}
</div>

<div class="form-group">
 {!!Form::label('descr', 'Description') !!}
 {!!Form::textarea('descr', null, ['class' => 'form-control', 'required', 'minlength' => '5']) !!}
</div>

