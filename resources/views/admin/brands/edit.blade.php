<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brands <b></b>
      
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Brands
                    </div>
                    <div class="card-body">
                       <form action="{{ url('brands/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Update Brand Name

                                </label>
                                <input type="text" name="brand_name" class="form-control" id="exampleFormControlInput1" value="{{ $brands->brand_name }}">

                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Update Brand Image

                                </label>
                                <input type="file" name="brand_image" class="form-control" id="exampleFormControlInput1" value="{{ $brands->brand_image }}">

                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-6">
                                <img src="{{ asset($brands->brand_image)}}" style="with:4rem; height:3rem;" alt="{{ $brands->brand_name }}">
                            </div>
                        
                            <button type="submit" class="mt-4 btn btn-primary">Update Brand</button>
                        </form> 
                    </div>
                    
                </div>
            </div>   
            </div>

      
        </div>
    </div>
</x-app-layout>
