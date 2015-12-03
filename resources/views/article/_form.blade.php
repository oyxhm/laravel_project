
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
	{!! Form::label('tag_list','Tags:') !!}
	{!! Form::select('tag_list[]',$tags,null,['id' => 'tag_list' ,'class' => 'form-control','multiple']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
	<script type="text/javascript">
		$('#tag_list').select2({
			placeholder : '请选择标签',
			// tags : true
			/*ajax : {
				dataType :　'json',
				url : 'api/tags',
				delay : 250,
				data : function (params) {
					return {
						q :  params.term
					}
				},
				processResults:function	(data) {
					return {
						results:data
					}
				}
			}*/
			/*data :　[
			{id:'one' , text : 'jQuery'},
			{id:'one' , text : 'Ruby'},
			]*/
		});
	</script>
@endsection