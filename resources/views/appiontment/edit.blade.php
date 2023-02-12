@extends('frontend.layouts.main')
@section('content')
@section('css')
<style type="text/css">
    .ck-editor__editable {min-height: 500px;}
</style>
@endsection
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
        	<div class="card">
                <div class="card-body">
                	<h1 class="card-title">Add new Prescriptions</h1>
                	<hr>
                    <form action="{{ route('appiontment.edit',$id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    	<div class="row">
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label for="first">Patient</label>
                    				<select class="form-control" name="doctor_id">
                                        <option value="">Select Patient</option>
                                        @foreach($doctors as $doc)
                                            <option value="{{ $doc->id }}" {{($doc->id == $appiontment->doctor_id) ? 'Selected' : '' }}>{{ $doc->name }}</option>            
                                        @endforeach
                                    </select>
                                </div>
                    		</div>
                    	</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first">Set Appiontment</label>
                                    <input type="date" name="appiontment_time" class="form-control" value="{{$appiontment->date}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first">Write Prescription</label>
                                    <textarea class="form-control" name="message">{{$appiontment->message}}</textarea> 
                                </div>
                            </div>
                        </div>
                    	<div class="row">
                            <div class="col-md-12">
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
@section('script')
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
	<script>
            ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                    .then( editor => {
                        editor.ui.view.editable.element.style.height = '500px';
                        editor.execute( 'alignment', { value: 'center' } );
                        console.log( editor );
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
    </script>
@endsection