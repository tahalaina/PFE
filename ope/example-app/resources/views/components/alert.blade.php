@props(['type'])
<div class="alert alert-{{$type}} m-3 text-center" role="alert" id='my-alert'>
    {{ $slot }}
</div>
<script src="{{ asset('javascript/alert.js') }}"></script>