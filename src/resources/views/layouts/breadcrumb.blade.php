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

                @if (Request::is('privileges*'))
                    Privilege
                @endif

                @if (Request::is('approvals*'))
                    Approval
                @endif
            </a>
        </li>

        @if (
            Request::is('applications*') ||
            Request::is('users*') ||
            Request::is('privileges*') ||
            Request::is('approvals*')
        )
        <li class="breadcrumb-item active" aria-current="page">
            <a href="javascript:void(0);">
                
            </a>
        </li>
        @endif
    </ol>
</nav>