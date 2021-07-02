@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                        @foreach ($images as $image)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src="{{ asset($image->image)}}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Multi Image
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.image')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                        
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label">Images

                                    </label>
                                    <input type="file" name="image[]" class="form-control" id="exampleFormControlInput1" multiple>

                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <button type="submit" class="mt-4 btn btn-primary">Add Images

                                </button>
                            </form> 
                        </div>
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>

@endsection