
<div class="form-group">
	{!! Form::label('title','Title:') !!}
	{!! Form::text('title',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body','Body:') !!}
	{!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>

<div class="form-gruop">
	{!! Form::label('publish_at','Publish on :') !!}
	{!! Form::input('date','publish_at',date('Y-m-d'),['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>