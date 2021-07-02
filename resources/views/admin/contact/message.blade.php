@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>Admin Message</h4>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Messages
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Msg#</th>
                                    <th scope="col" width="18%">Name</th>
                                    <th scope="col" width="18%">Email</th>
                                    <th scope="col" width="18%">Subject</th>
                                    <th scope="col" width="18%">Message</th>
                                    <th scope="col" width="18%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                    @foreach ($messages as $item)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ $item->message }}</td>
                                            <td>
                                                <a href="{{ url('message/delete/' . $item->id) }}"
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
