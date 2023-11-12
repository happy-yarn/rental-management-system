@if (session('success'))
        <div class="alert alert-success mt-5" role="alert">{{ session('success') }}</div>
@elseif (session('info'))
    <div class="alert alert-info mt-5" role="alert">{{ session('info') }}</div>
@elseif (session('danger'))
    <div class="alert alert-danger mt-5" role="alert">{{ session('danger') }}</div>
@endif
