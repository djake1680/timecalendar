<div class="card mt-4">
    <h5 class="card-header">Business Config</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-body">
        <h5 class="card-title">Coming Soon</h5>
    </div>
</div>