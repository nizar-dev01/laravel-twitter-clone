@extends('layouts.app')

@section('content')
    <div class="container">
        <form
            action="/p"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    {{-- Title of the form --}}
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    {{-- caption --}}
                    <div class="form-group row">
                        <label
                            for="caption"
                            class="col-md-4 col-form-label pl-0"
                        >
                            Post Caption
                        </label>

                        <input
                            id="caption"
                            type="caption"
                            class="form-control
                            @error('caption') is-invalid
                            @enderror"
                            name="caption"
                            value="{{ old('caption') }}"
                            autocomplete="caption"
                        />

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- /caption --}}
                    {{-- image --}}
                    <div class="row form-group">
                        <label
                            for="image"
                            class="col-md-4 col-form-label pl-0"
                        >
                            Post Image
                        </label>
                        <input
                            type="file"
                            class="form-control-file"
                            id="image"
                            name="image"
                        />
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    {{-- /image --}}
                    {{-- submit --}}
                    <div class="row">
                        <button
                            class="btn btn-primary"
                            type="submit"
                            style="
                                width:150px;
                                height:39px;
                                line-height:39px;
                                padding:0;
                            "
                        >Submit</button>
                    </div>
                    {{-- /submit --}}
                </div>
            </div>
        </form>
    </div>
@endsection
