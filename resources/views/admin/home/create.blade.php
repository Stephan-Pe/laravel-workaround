@extends('admin.admin_master')

@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Home About</h2>
            </div>
            <div class="card-body">
                     <form action="{{ route('store.about') }}" method="POST">
                                @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Title</label>
                        <input type="text" name="title" class="form-control"  placeholder="Title">
                       @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control"  placeholder="Sub Title">
                       @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection
