<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script>
        window.locales = @json(config('translatable.locales'));
    </script>
    <!-- Scripts -->
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{$manifest['resources/js/app.js']['file']}}"></script>
        <link rel="stylesheet" href="/build/{{$manifest['resources/css/Admin/app.css']['file']}}">
    @else
        {{-- <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/resources/js/app.js"></script> --}}
        @vite(['resources/css/Admin/app.css', 'resources/js/app.js'])
    @endproduction
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>


  {{-- <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyBcJqA_pSq3qSb-ZsJjkCsJGvRNxIerhz0",
        authDomain: "consol-2d10e.firebaseapp.com",
        projectId: "consol-2d10e",
        storageBucket: "consol-2d10e.appspot.com",
        messagingSenderId: "30474173252",
        appId: "1:30474173252:web:cd94d47143c75da9d93511",
        measurementId: "G-EHQJQJEDC1"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {

            axios.post("{{ route('dashboard.fcmToken') }}",{
                // _method:"PATCH",
                token
            }).then(({data})=>{
                // console.log(data)
            }).catch(({response:{data}})=>{
                console.error(data)
            })

        }).catch(function (err) {
            // console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();

    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });
</script> --}}

</body>
</html>
