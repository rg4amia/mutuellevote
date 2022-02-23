<div class="row justify-content-md-center">
    @forelse(['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has($msg) )
            <div class="alert alert-{{$msg}} dark alert-dismissible fade show" role="alert">
                <p class="text-center mb-0 px-2 py-2 text-red-300 bg-red-100">{{ Session::get($msg) }}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
    @empty
    @endforelse
</div>
