@component($typeForm, get_defined_vars())
    <link rel="stylesheet" href="/css/tom-select.default.css">
    <div data-controller="live_select" >
        <select
        id="{{$id}}"
        placeholder="{{$placeholder}}"
        {{$multiple}}
        data-select-id="{{$id}}"
        data-select-valueField="{{$valueField}}"
        data-select-debounce="{{$debounce}}"
        data-select-labelField="{{$labelField}}"
        data-select-searchField="{{$searchField}}"
        data-select-minToSearch="{{$minToSearch}}"
        data-select-remoteUrl="{{$remoteUrl}}"
        ></select>

    </div>

@endcomponent
