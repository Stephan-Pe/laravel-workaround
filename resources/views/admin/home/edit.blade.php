@extends('admin.admin_master')

@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Home About</h2>
            </div>
            <div class="card-body">
                     <form action="{{ url('update/homeAbout/' . $homeAbout->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Title</label>
                        <input type="text" name="title" class="form-control"  value="{{ $homeAbout->title }}">
                       @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control" value="{{ $homeAbout->sub_title }}">
                       @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="3" >{{ $homeAbout->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection
