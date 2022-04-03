<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="javascript:void(0);">
                @if (Request::is('/') || Request::is('home'))
                    Dashboard
                @endif

                @if (Request::is('applications*'))
                    Application
                @endif

                @if (Request::is('users*'))
                    User
                @endif

                @if (Request::is('roles*') || Request::is('permissions*'))
                    Privilege
                @endif

                @if (Request::is('employees*'))
                    Employee
                @endif

                @if (Request::is('organizations*') || Request::is('positions*'))
                    Organizational
                @endif

                @if (Request::is('approvals*'))
                    Approval
                @endif
            </a>
        </li>

        @if (
            Request::is('applications*') ||
            Request::is('users*') ||
            Request::is('roles*') ||
            Request::is('permissions*') ||
            Request::is('employees*') ||
            Request::is('organizations*') ||
            Request::is('positions*') ||
            Request::is('approvals*')
        )
        <li class="breadcrumb-item active" aria-current="page">
            <a href="javascript:void(0);">
                @if (Request::is('applications*'))
                    Manage Application
                @endif

                @if (Request::is('users*'))
                    Manage User
                @endif

                @if (Request::is('roles*'))
                    Manage Role
                @endif

                @if (Request::is('permissions*'))
                    Manage Role
                @endif

                @if (Request::is('employees*'))
                    Manage Employee
                @endif

                @if (Request::is('organizations*'))
                    Manage Organization
                @endif

                @if (Request::is('positions*'))
                    Manage Position
                @endif

                @if (Request::is('approvals*'))
                    Manage Approval
                @endif

                @if (Request::is('workflows*'))
                    Approval Workflow
                @endif

                @if (Request::is('delegates*'))
                    Approval Delegate
                @endif
            </a>
        </li>
        @endif
    </ol>
</nav>