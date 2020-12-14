@extends('admin.layouts.default')
@section('content')
    <div class="container-fluid">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{session()->get('success')}}
            </div>
        @endif
        <a type="button" href="{{route('admin.vendors.create')}}" class="btn btn-primary float-right mt-1">
            Add Vendor
        </a>
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <td>#Id</td>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Store Name</th>
                <th>Register Via</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->fname.' '.$user->lname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->vendorDetails->store_name}}</td>
                    <td>{{$user->reg_by}}</td>
                    <td>
                        <a href="{{route('admin.vendors.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                        <a type="button" class="btn btn-danger" onclick="deleteModal({{$user->id}})">Destroy</a>
                    </td>

                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="" id="modal_submit" class="btn btn-primary">Yes</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

            </div>

        </div>
    </div>
@stop

@section('script')
    <script>
        function deleteModal(id){
            var url = '{{url('admin/vendors/destroy/:id')}}';
            var url1 = url.replace(':id',id);
            $('#modal_submit').attr('href',url1);
            $('#myModal').modal('show');

        }
    </script>
@stop