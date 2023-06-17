<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{ config('app.name', 'Laravelgram') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--bootstrap-->
    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ secure_asset('css/application.css') }}" rel="stylesheet">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

     <!-- Firebase SDK -->
     <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-functions.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-remote-config.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-performance.js"></script>
    <script src="/__/firebase/init.js"></script>

    <!-- Your other scripts -->
    <!-- ... -->

  </head>

  <body>
    @yield('navbar')

    <div class="my-container">
         @yield('content')
    </div>

    @yield('footer')

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const loadEl = document.querySelector('#load');
        // // 🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥
        // // The Firebase SDK is initialized and available here!
        //
        // firebase.auth().onAuthStateChanged(user => { });
        // firebase.database().ref('/path/to/ref').on('value', snapshot => { });
        // firebase.firestore().doc('/foo/bar').get().then(() => { });
        // firebase.functions().httpsCallable('yourFunction')().then(() => { });
        // firebase.messaging().requestPermission().then(() => { });
        // firebase.storage().ref('/path/to/ref').getDownloadURL().then(() => { });
        // firebase.analytics(); // call to activate
        // firebase.analytics().logEvent('tutorial_completed');
        // firebase.performance(); // call to activate
        //
        // // 🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥

        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
          const firebaseConfig = {
            apiKey: "AIzaSyCS81njMrQUkW5iz3_KDNt_oBRVljGHovQ",
            authDomain: "diy-creator-s.firebaseapp.com",
            projectId: "diy-creator-s",
            storageBucket: "diy-creator-s.appspot.com",
            messagingSenderId: "588016851294",
            appId: "1:588016851294:web:57f38b4001920b92ed57cf",
            measurementId: "G-89TNM54FHG"
          };
          firebase.initializeApp(firebaseConfig);
        try {
          let app = firebase.app();
          let features = [
            'auth', 
            'database', 
            'firestore',
            'functions',
            'messaging', 
            'storage', 
            'analytics', 
            'remoteConfig',
            'performance',
          ].filter(feature => typeof app[feature] === 'function');
          loadEl.textContent = `Firebase SDK loaded with ${features.join(', ')}`;
        } catch (e) {
          console.error(e);
          loadEl.textContent = 'Error loading the Firebase SDK, check the console.';
        }
      });
    </script>
  </body>
</html>
