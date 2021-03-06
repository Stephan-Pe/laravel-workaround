@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>Home About</h4>
                <a class="ml-auto mr-0 mb-2" href="{{route('add.about')}}"><button class="btn btn-info">Add About</button></a>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="card-header">
                            All About Data
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">About#</th>
                                    <th scope="col" width="10%">About Title</th>
                                    <th scope="col" width="15%">SubTitle</th>
                                    <th scope="col" width="25%">Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($homeAbout as $about)
                                    <tr>
                                        <th scope="row">{{ $i++}}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->sub_title}}</td>
                                        <td>{{ $about->description}}</td>
                                        <td>
                                            <a href="{{ url('about/edit/' . $about->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete/' . $about->id) }}"
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
