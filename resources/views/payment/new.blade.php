@extends('layouts.sbadmin.base')
@section('title','New Payment')
@section('content')
		@section('primary-title','New Payment')
                <div class="col-sm-6">
                   <form id="payment-form" role="form" method="POST" action="{{route('payment.store')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<p class="help-block">Register a new Payment.</p>
                        
                        <div class="form-group">
				<label for="type">Type</label>
                                <select name="metatype_id" class="select form-control" required="required">
                                    @foreach($metaTypes as $metaType)
                                        <option value="{{$metaType->id}}">{{$metaType->value}}</option>
                                    @endforeach
                                </select>
			</div>
                        
			<div class="form-group">
				<label for="type">Due Date</label>
                                <input type="date" required="required"
                                       name="due_date" class="form-control"
                                       id="due_date" placeholder="DD/MM/YYYY">
			</div>
                        
			<div class="form-group">
				<label for="value">Value</label>
                                <input type="number" required="required"
                                       name="value" class="form-control" 
                                       id="value" placeholder="100.00" min="0.01">
			</div>
                        
                        <div class="form-group">
				<label for="type">Paid Date</label>
                                <input type="date"
                                       name="paid_date" class="form-control"
                                       id="paid_date" placeholder="DD/MM/YYYY">
			</div>
                        
                        <div class="form-group">
				<label for="type">Description</label>
                                <textarea class="form-control" rows="3"
                                          name="description" id="description"></textarea>
			</div>
                        
                        <button type="submit" class="btn btn-default pull-right">Save</button>
                    </form> 
                </div>
	</div>
@endsection
@section('custom-scripts')

@endsection