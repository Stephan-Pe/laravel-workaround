@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>Contact Page</h4>
                <a class="ml-auto mr-0 mb-2" href="{{route('add.contact')}}"><button class="btn btn-info">Add Contact</button></a>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="card-header">
                            All Contact Data
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Contact#</th>
                                    <th scope="col" width="18%">Contact Address</th>
                                    <th scope="col" width="18%">Contact Email</th>
                                    <th scope="col" width="18%">Contact Phone</th>
                                    <th scope="col" width="18%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($contacts as $item)
                                    <tr>
                                        <th scope="row">{{ $i++}}</th>
                                        <td>{{ $item->address}}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>{{ $item->phone}}</td>
                                        <td>
                                            <a href="{{ url('contact/edit/' . $item->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('contact/delete/' . $item->id) }}"
                                                onclick="return confirm('Are you shure?')" class="btn btn-danger">Delete</a>
                                        </td>
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
