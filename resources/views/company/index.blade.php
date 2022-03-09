@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Companies</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-success table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($companies as $key => $company)
                        @foreach ($companies as $company)
                            <tr>
                                <th scope="row">{{$company->id}}</th>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td><a href="{{ route('company.edit', ['company'=>$company->id]) }}" class="btn btn-success">Edit Company</a></td>
                                <td>
                                    <form action="{{ route('company.destroy', ['company'=>$company->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete Company" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @empty
                            No companies yet!
                        @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
