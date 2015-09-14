@extends('layouts.sbadmin.base')
@section('title','View Metatype')
@section('content')
		@section('primary-title','View Metatype')
                <div class="col-sm-6">
                   <form id="metatype-form" role="form" method="POST" action="{{route('metatype.destroy',$metaType->id)}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<p class="help-block">Details of your MetaType.</p>
			<div class="form-group">
				<label for="type">Type</label>
                                <input type="text" readonly="readonly" 
                                       name="type" class="form-control" 
                                       id="type" placeholder="Type"
                                       value='{{$metaType->type}}'>
			</div>
			<div class="form-group">
				<label for="value">Value</label>
				<input type="text" readonly="readonly" 
                                       name="value" class="form-control" 
                                       id="value" placeholder="Value"
                                       value='{{$metaType->value}}'>
			</div>
			<button type="submit" class="btn btn-danger pull-right">Delete</button>
                    </form> 
                </div>
		
	</div>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function(){
        $('#metatype-form').submit(function(e){
            var option = confirm('Are you sure to delete this record?');
            if(!option){
                e.preventDefault();
            }
        })
    });
</script>
@endsection