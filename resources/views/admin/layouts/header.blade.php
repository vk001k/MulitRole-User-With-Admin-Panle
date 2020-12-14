<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"><a href="{{url('admin/dashboard')}}">Admin Panel</a> </div>
    <div class="list-group list-group-flush">
        <a href="{{url('admin/users')}}" class="list-group-item list-group-item-action bg-light"  {!! (Request::is('admin/users')   ? 'class="active"' : '') !!} || {!! (Request::is('admin/users/create')   ? 'class="active"' : '') !!} ||{!! (Request::is('admin/users/edit')   ? 'class="active"' : '') !!}>User</a>
        <a href="{{url('admin/vendors')}}" class="list-group-item list-group-item-action bg-light"  {!! (Request::is('admin/vendor')   ? 'class="active"' : '') !!} || {!! (Request::is('admin/vendor/create')   ? 'class="active"' : '') !!} || {!! (Request::is('admin/vendor/edit')   ? 'class="active"' : '') !!}>Vendor</a>
    </div>
</div>