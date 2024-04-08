@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert card shadow-lg text-danger bg-white text-sm">{{ $error }}</div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert card shadow-lg text-success bg-white text-sm">{{ session('success') }}</div>
@endif

@if (session('warning'))
    <div class="alert card shadow-lg text-warning bg-white text-sm">{{ session('warning') }}</div>
@endif

@if (session('error'))
    <div class="alert card shadow-lg text-danger bg-white text-sm">{{ session('error') }}</div>
@endif
