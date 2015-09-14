@extends('layouts.sbadmin.base')
@section('title','New Metatype')
@section('content')
		@section('primary-title','New Metatype')
                <div class="col-sm-6">
                   <form id="metatype-form" role="form" method="POST" action="{{route('metatype.store')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<p class="help-block">Register a new MetaType.</p>
			<div class="form-group">
				<label for="type">Type</label>
                                <input type="text"
                                       name="type" class="form-control" 
                                       id="type" placeholder="Type">
			</div>
			<div class="form-group">
				<label for="value">Value</label>
				<input type="text"
                                       name="value" class="form-control" 
                                       id="value" placeholder="Value">
			</div>
                        <button type="submit" class="btn btn-default pull-right">Save</button>
                    </form> 
                </div>
		
	</div>
@endsection
@section('custom-scripts')

@endsection