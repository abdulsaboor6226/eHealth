@extends('frontend.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
        	<div class="card">
                <div class="card-body">
                	<h1 class="card-title">Add new Appiontment</h1>
                	<hr>
                    <form action="{{ route('appiontment.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    	<div class="row">
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label for="first">Patient</label>
                    				<select class="form-control" name="doctor_id">
                                        <option value="">Select Patient</option>
                                        @foreach($doctors as $doc)
                                            <option value="{{ $doc->id }}">{{ $doc->name }}</option>            
                                        @endforeach
                                    </select>
                                </div>
                    		</div>
                        </div>
                    	<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first">Patient</label>
                                    <input type="date" name="appiontment_time" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label for="first">Write Prescription</label>
                    				<textarea class="form-control" name="message"></textarea> 
                    			</div>
                    		</div>
                    	</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-icon-text" style="float: right;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
