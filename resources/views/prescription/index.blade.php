@extends('frontend.layouts.main')
@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
@endsection
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
        	@if(Auth::user()->hasRole('doctor'))
		        <div class="row">
		            <div class="col-md-12">
		                <div class="d-flex justify-content-end mb-2 mr-3">
		                    <a type="button" class="btn btn-primary btn-icon-text" href="{{ route('prescription.add') }}"><i class="ti-plus btn-icon-prepend"></i>Add new prescriptions
		                    </a>
		                </div>
		            </div>
		        </div>
		    @endif
            <div class="card">
                <div class="card-body">
                	<h1 class="card-title">Prescriptions</h1>
                	<hr>
                    <table id="example" class="table table-striped" style="width:100%">
				        <thead>
				            <tr>
				                <th>ID</th>
				                <th>Doctor Name</th>
				                <th>Patient Name</th>
				                <th>Appointment date</th>
				                <th>Download</th>
				                @if(Auth::user()->hasRole('doctor'))
				                	<th>Action</th>
				                @endif
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($prescription as $key => $pres)
					            <tr>
					                <td>{{++$key}}</td>
					                <td>{{$pres->doctor->name ?? ''}}</td>
					                <td>{{$pres->patient->name ?? ''}}</td>
					                <td>{{$pres->updated_at->diffForHumans()}}</td>
					                <td><a href="{{ route('generate-pdf',$pres->id) }}" class="btn btn-success btn-sm">Download</a></td>
					                @if(Auth::user()->hasRole('doctor'))
						                <td>
						                	<div class="d-flex">
						                		<a href="{{ route('prescription.edit',$pres->id) }}" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;
						                		<a href="{{ route('prescription.del',$pres->id) }}" class="btn btn-danger btn-sm">Delete</a>
						                	</div>
						                </td>
						            @endif
					            </tr>
					        @endforeach
				        </tbody>
				    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
	    $('#example').DataTable({
	    	"lengthChange": false
	    });
	});
</script>
@endsection	