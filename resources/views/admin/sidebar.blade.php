<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/') }}">
                        Dashboard
                    </a>
                </li>
                
            </ul>
            <ul class="nav" role="tablist">
                
                <li role="presentation">
                    <a href="{{ url('/admin/permission') }}">
                        Permissions
                    </a>
                </li>
               
            </ul>
            <ul class="nav" role="tablist">
                
                <li role="presentation">
                    <a href="{{ url('/admin/role') }}">
                        Roles
                    </a>
                </li>
            </ul>
            <ul class="nav" role="tablist">
                
                <li role="presentation">
                    <a href="{{ url('/admin/user') }}">
                        Users
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
