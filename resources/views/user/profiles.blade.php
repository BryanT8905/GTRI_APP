
<div>
    @if(Auth::user()->image)
        <div class="d-flex justify-content-center">
            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 40px;height: 40px; padding: 10px; margin: 0px; ">
        </div>
    @else
        <div class="d-flex justify-content-center">
            <img class="image rounded-circle" src="{{asset('img/user3.png')}}" alt="profile_image" style="width: 160px; height: 160px; padding: 10px; margin: 0px; ">
        </div>
    @endif

    <hr>

    <div class="mb-3 mx-3">
        <h6 class="text-secondary mb-0">Name:</h6>
        {{ Auth::user()->name }}
    </div>
    
    <div class=" mb-3 mx-3">
        <h6 class="text-secondary mb-0">Department:</h6>
        {{ Auth::user()->department }}
    </div>

    <div class=" mb-3 mx-3">
        <h6 class="text-secondary mb-0">Email:</h6>
        {{ Auth::user()->email }}
    </div>
    
    <div class=" mb-3 mx-3">
        <h6 class="text-secondary mb-0">Role:</h6>
        @foreach(Auth::user()->roles as $role)
            {{ $role->name }}
        @endforeach
    </div> 

    <div class=" mb-3 mx-3">
        <h6 class="text-secondary mb-1">Upload Image:</h6>
        <div class=" mx-0">
            <form method="POST" enctype="multipart/form-data" action="{{ url('save') }}">
                <div class="row pl-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="image" placeholder="Upload Image" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    
                    <!--<div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>-->
                </div>     
            </form>
        </div>
    </div>

   
