@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{--增加头像--}}
                        <div class="form-group row">
                            <label for="portrait" class="col-md-4 col-form-label text-md-right">{{ __('Head Sculpture') }}</label>

                            <div class="col-md-6">
                                <img id="own_img" src="{{asset('chat\dist\media\img\timg.jfif')}}" width="10%" style="display: inline">
                                <input style="display:block" id="banner" type="file" onchange="ImgUpload()"/>
                                <input id="portrait" type="hidden" class="form-control @error('portrait') is-invalid @enderror" name="portrait" required>
                                @error('portrait')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               {{-- <button style="float:right;" type="button" class="btn btn-info" id="banner_img_btn" οnclick="$('#banner_img').click()">
                                    <span>选择图片</span>

                                </button>--}}

                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script>

    console.log(2);

    /**
     * 上传图片
     */
    function ImgUpload() {
        if ($("#banner").val() == '') {
            return;
        }
        var formData = new FormData();
        formData.append('file', document.getElementById('banner').files[0]);
        $.ajax({
            url:"/upload",
            type:"post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.code == 0) {
                    $("#own_img").attr("src", data.data);
                    $("#portrait").val(data.data);
                } else {
                    alert(data.msg);
                }
            },
            error:function(data) {
                alert("上传失败")
            }
        });
    }
</script>
@endsection
