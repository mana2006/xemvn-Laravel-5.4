@extends('admin.dashboard.dashboard')

@section('content_main')
    <!-- Main content -->
    <main class="main">
        <div class="container-fluid pt-2">

            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fa fa-edit"></i> Danh sách thành viên</h5>
                    </div>
                    <div class="card-block">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <th>Tên thành viên</th>
                                <th>Ngày đăng ký</th>
                                <th>Trạng thái</th>
                                <th>Thực thi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                            <tr>
                                @if($member->image)
                                    <td style="width: 10%"><img style=" max-width: 50%;" src="{{ URL::to('/'.$member->image) }}"></td>
                                @else
                                    <td style="width: 10%"><img style=" max-width: 50%;" src="{{ URL::to('/img/smile_user.jpg') }}"></td>
                                @endif
                                <td>{{ $member->lastname ." ". $member->firstname}}</td>
                                <td>{{ $member->created_at }}</td>
                                <td>
                                    @if($member->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @elseif($member->status == 2)
                                        <span class="badge badge-default">Inactive</span>
                                    @elseif($member->status == 3)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($member->status == 4)
                                        <span class="badge badge-danger">Banned</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ URL::to('/admin/member/'.$member->id) }}"> <i class="fa fa-search-plus "></i> </a>
                                    <a class="btn btn-info" href="{{ URL::to('/admin/member/'.$member->id.'/edit/') }}"> <i class="fa fa-edit "></i> </a>
                                    <a class="btn btn-danger" href="#">
                                        <i class="fa fa-trash-o "></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('admin.pagination.default', ['paginator' => $members])
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection