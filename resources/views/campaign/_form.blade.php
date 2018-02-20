<div class="form-group">
 {!!Form::label('name', 'Name') !!}
 {!!Form::text('name', null, ['class' => 'form-control', 'required', 'minlength' => '5']) !!}
 {{-- {!!Form::hidden('created_by', Auth::user()->id, []) !!} --}}
</div>

<div class="form-group">
{!!Form::label('bunch_id', 'Bunches') !!}
 {!! Form::select( 'bunch_id', $bunches, isset($selected_bunches) ? $selected_bunches : null, ['class' => 'form-control', 'required'] ) !!}
</div>

<div class="form-group">
{!!Form::label('template_id', 'Templates') !!}
 {!! Form::select( 'template_id', $templates, isset( $selected_templates ) ? $selected_templates : null, ['placeholder' => 'Select template...', 'class' => 'form-control', 'required'] ) !!}
</div>

<div class="form-group"> 
 {!!Form::label('descr', 'Description') !!}
 {!!Form::textarea('descr', null, ['class' => 'form-control', 'required', 'minlength' => '5']) !!}
</div>