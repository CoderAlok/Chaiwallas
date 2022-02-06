{{-- base_url() --}}
{{ url('') }}<br/>

{{-- site_url --}}
{{ url('/') }}<br/>

{{-- // Path to the project's root folder --}}
{{ base_path(); }}<br/>

{{-- // Path to the 'app' folder --}}
{{ app_path() }}<br/>

{{-- // Path to the 'public' folder --}}
{{ public_path() }}<br/>

{{-- // Path to the 'storage' folder --}}
{{ storage_path() }}<br/>

{{-- // Path to the 'storage/app' folder --}}
{{ storage_path('app') }}<br/>
