<div class="row justify-content-md-center">
    @forelse(['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has($msg) )
            <div class="alert alert-{{$msg}} dark alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ Session::get($msg) }}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
    @empty
    @endforelse
</div>

