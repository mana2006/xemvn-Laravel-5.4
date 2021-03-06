@extends('admin.dashboard.dashboard')

@section('content_main')
    <!-- Main content -->
    <main class="main">
        <div class="container-fluid pt-2">

            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="icon-note"></i> Thêm thành viên
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="flash-message">
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                @if(Session::has('alert-' . $msg))

                                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                                @endif
                                            @endforeach
                                        </div> <!-- end .flash-message -->
                                        <form id="update_member" method="POST" action="{{route('user.update', $user['id'])}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}

                                            <div class="form-group">
                                                <label class="form-control-label" for="name">Tên</label><span class="error">(*)</span>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên" value="{{ !empty(old('name')) ? old('name') : $user['name'] }}">
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <p>Avatar</p>
                                                <e>@if($user['image'])
                                                        <img width="25%" height='150px' id="show_image" src="{{ URL::to('/'.$user['image'])}}">
                                                    @endif
                                                </e>

                                                <br><br>
                                                <label class="custom-file">
                                                    <span class="custom-file-control"></span>
                                                    <input type="file" id="upload_images" class="custom-file-input"  name="upload_images" >

                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="email">Email</label><span class="error">(*)</span>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ !empty(old('email')) ? old('email') : $user['email'] }}">
                                                @if($errors->has('email'))
                                                    <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="password">Mật khẩu</label><span class="error">(*)</span>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                                                    @if($errors->has('password'))
                                                        <div class="error">{{ $errors->first('password') }}</div>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="confirm_password">Xác nhận lại mật khẩu</label><span class="error">(*)</span>
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Xác nhận lại mật khẩu">
                                                    @if($errors->has('confirm_password'))
                                                        <div class="error">{{ $errors->first('confirm_password') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Cập nhật</button>&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-secondary" name="cacel" value="Cancel" onclick="clearForm('update_member')">Huỷ bỏ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>

        </div>
    </main>

@endsection