@extends('layouts.app')

@section('content')
    <div id="app">
        <h1>@{{ message }}</h1>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js">

    </script>

<script>
    new Vue({
        el: '#app',
        data: {
            message: 'Hello World'
        }
    })
</script>
@endsection
