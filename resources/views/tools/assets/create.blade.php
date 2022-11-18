<!--Page view for creating an asset-->
<div class="card-shadow shadow-lg">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Create An Asset</h4>
                </div>
    <div class="card-body">
        <form method="POST" action="{{ route('assets.store') }}" id="create">
            @csrf

            <div class="form-outline mb-4">
                    <input id="name" type="text" placeholder="Name" class="form-control form-control-md @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-4">
                    <input id="manufacturer" type="text" placeholder="Manufacturer" class="form-control form-control-md @error('manufacturer') is-invalid @enderror" name="manufacturer" value="{{ old('manufacturer') }}" required autocomplete="manufacturer">
                    @error('manufacturer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-4">
                    <input id="serial_no" type="text" placeholder="Serial_no" class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" value="{{ old('serial_no') }}" required autofocus>
                    @error('serial_no')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror      
            </div>

            <div class="form-outline mb-4">
                    <input id="category" type="text" placeholder="Category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autofocus>
                    @error('category')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror      
            </div>

            <div class="form-outline mb-4">
                    <input id="eol" type="text" placeholder="End of Life " class="form-control @error('eol') is-invalid @enderror" name="eol">
                    @error('eol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-4">
                    <input id="location"  type="text"  placeholder="Location"class="form-control @error('location') is-invalid @enderror" name="location">
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary btn-md btn-block mx-2 " id="submitForm">
                    {{ __('Create Asset') }}
                </button>
            </div>
            
        </form>
    </div>
</div>

