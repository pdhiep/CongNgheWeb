@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Theses Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('theses.create') }}"> Create New Thesis</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Student</th>
            <th>Program</th>
            <th>Supervisor</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($theses as $thesis)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $thesis->title }}</td>
            <td>{{ $thesis->student->first_name }} {{ $thesis->student->last_name }}</td>
            <td>{{ $thesis->program }}</td>
            <td>{{ $thesis->supervisor }}</td>
            <td>
                <form action="{{ route('theses.destroy',$thesis->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('theses.show',$thesis->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('theses.edit',$thesis->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $theses->links() !!}
      
@endsection