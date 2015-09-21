@extends('layouts.sbadmin.base')
@section('title','Payment')
@section('content')
		@section('primary-title','Payment')
                <div class="col-sm-6">
                   <form id="payment-form" role="form" method="POST" action="{{route('payment.destroy', $payment->id)}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<p class="help-block">Details of Payment.</p>
                        
                        <div class="form-group">
				<label for="type">Type</label>
                                {{$payment->metatype_id}}
                                <select name="metatype_id" class="select form-control" disabled="disabled">
                                    {{-- */$selected = ""/* --}}
                                    @foreach($metaTypes as $metaType)
                                        @if($metaType->id == $payment->metatype_id)
                                          {{-- */$selected = 'selected=selected'/* --}}
                                        @else
                                          {{-- */$selected = ""/* --}}  
                                        @endif
                                        <option {{ $selected }} value="{{$metaType->id}}">{{$metaType->value}}</option>
                                    @endforeach
                                </select>
			</div>
                        
			<div class="form-group">
				<label for="type">Due Date</label>
                                <input type="date" disabled="disabled"
                                       name="due_date" class="form-control"
                                       id="due_date" placeholder="DD/MM/YYYY"
                                       value="{{$payment->due_date}}">
			</div>
                        
			<div class="form-group">
				<label for="value">Value</label>
                                <input type="number" disabled="disabled"
                                       name="value" class="form-control" 
                                       id="value" placeholder="100.00" 
                                       min="0.01" value="{{$payment->value}}">
			</div>
                        
                        <div class="form-group">
				<label for="type">Paid Date</label>
                                <input type="date" disabled="disabled"
                                       name="paid_date" class="form-control"
                                       id="paid_date" placeholder="DD/MM/YYYY"
                                       value="{{$payment->paid_date}}">
			</div>
                        
                        <div class="form-group">
				<label for="type">Description</label>
                                <textarea class="form-control" rows="3"
                                          name="description" id="description"
                                          disabled="disabled" value="{{$payment->description}}"></textarea>
			</div>
                        
                        <button type="submit" class="btn btn-danger pull-right">Delete</button>
                    </form> 
                </div>
	</div>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function(){
        $('#payment-form').submit(function(e){
            var option = confirm('Are you sure to delete this record?');
            if(!option){
                e.preventDefault();
            }
        })
    });
</script>
@endsection