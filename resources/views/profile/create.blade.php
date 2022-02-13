    @extends('layouts.app')

    @section('content')
    <div class="container">

        <h3 class="text-center">Create Profile</h3>

        <div class="alert alert-success" id="success-mg"  style="display: none">
            تم الحفظ بنجاح
        </div>
        <div class="alert alert-danger" id="error-mg"  style="display: none">
            فشل المحاوله رجاءا حاول مجددا
        </div>

            
        <form method="POST" id="profileForm"  action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <label class="bmd-label-floating">Add Photo</label>
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Name Details</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Details</label>
                        <input type="text" name="details" class="form-control @error('details') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <button id="save_profile" class="btn btn-primary pull-right"style="float: right;">{{trans('messages.create user')}}</button>
            <div class="clearfix"></div>
        </form>
    </div>
@stop

@section('script')
        <script>

            $(document).on('click' , '#save_profile', function (e) {
                e.preventDefault();
                var formData = new FormData($('#profileForm')[0]);
                $.ajax({
                    type:'post',
                    enctype: 'multipart/form-data',
                    url:"{{route('ajax.profiles.store')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache:false,
                    success: function(data){
                        if(data.status == true){
                            $('#success-mg').show();
                        }
                    }

                });
            });


        </script>

    @stop