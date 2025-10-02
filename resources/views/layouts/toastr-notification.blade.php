<!-- Toastr Notification -->
<!--
// test the success toastr notification
        session()->flash('success', 'Category created successfully.');
        // test the warning toastr notification
        session()->flash('warning', 'warning Category successfully.');
        // test the error toastr notification
        session()->flash('error', 'error Category successfully.');
        // test the info toastr notification
        session()->flash('info', 'info Category successfully.');
        
-->

@if (session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if (session()->has('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

@if (session()->has('info'))
    <script>
        toastr.info("{{ session('info') }}");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        toastr.warning("{{ session('warning') }}");
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif
