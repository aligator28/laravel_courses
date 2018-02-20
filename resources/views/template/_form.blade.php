<div class="form-group">
{{-- {!!Form::hidden('created_by', Auth::user()->id, []) !!} --}}
 {!!Form::label('name', 'Name') !!}
 {!!Form::text('name', null, ['class' => 'form-control', 'required', 'minlength' => '5']) !!}
 {!!Form::label('content', 'Content') !!}
 {!!Form::textarea('content', null, ['id' => 'content-ckeditor', 'class' => 'form-control', 'required', 'minlength' => '5']) !!}
</div>

