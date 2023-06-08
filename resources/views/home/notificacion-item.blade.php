@php
    $noty = count(Session::get('shooping-car', []));
@endphp

@if ($noty)
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-1"
        style="font-size: 12px; padding: 3px 6px !important">
        <span></span>{{$noty}}
    </span>
@endif
