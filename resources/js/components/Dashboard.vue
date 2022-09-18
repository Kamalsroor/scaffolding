<template>
    <body class="antialiased">
        <div class="flex justify-center items-center h-screen">
            <h1 class="text-3xl text-purple-200 font-bold">Laravel 9 sVite with Tailwind CSS</h1>
        </div>
    </body>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            You are logged in as <b>{{ user.email }}</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import { initializeApp } from 'firebase/app';
import { getMessaging, getToken, onMessage } from 'firebase/messaging';


export default {
    name: "dashboard",
    data() {
        return {
            user: this.$store.state.auth.user,
        };
    },
    methods: {
    saveNotificationToken(token) {
      const registerNotifTokenURL = 'api/fcm-token'
      const payload = {
        registration_id: token,
        type: 'web'
      }
      axios.post(registerNotifTokenURL, payload)
        .then((response) => {
          console.log('Successfully saved notification token!')
          console.log(response.data)
        })
        .catch((error) => {
          console.log('Error: could not save notification token')
          if (error.response) {
            console.log(error.response.status)
            // Most of the time a "this field must be unique" error will be returned,
            // meaning that the token already exists in db, which is good.
            if (error.response.data.registration_id) {
              for (let err of error.response.data.registration_id) {
                console.log(err)
              }
            } else {
              console.log('No reason returned by backend')
            }
            // If the request could not be sent because of a network error for example
          } else if (error.request) {
            console.log('A network error occurred.')
            // For any other kind of error
          } else {
            console.log(error.message)
          }
        })
      },
    },
    mounted() {


const firebaseConfig = {
    apiKey: "AIzaSyBcJqA_pSq3qSb-ZsJjkCsJGvRNxIerhz0",
    authDomain: "consol-2d10e.firebaseapp.com",
    projectId: "consol-2d10e",
    storageBucket: "consol-2d10e.appspot.com",
    messagingSenderId: "30474173252",
    appId: "1:30474173252:web:cd94d47143c75da9d93511",
    measurementId: "G-EHQJQJEDC1"
}

const firebaseApp = initializeApp(firebaseConfig);
const messaging = getMessaging();

getToken(messaging, {vapidKey: "BPbxEeRoOfhhvxPkoT1KeWFlij-yjFzS-4ACGVHIzcnOMAtqPVKwYTKt9O1sDVnkBVs5ZtCqYx7TTeQ8euxFqbo"})
	.then((currentToken) => {
		if (currentToken) {
            console.log(currentToken);
			localStorage.setItem('FCMToken', currentToken.toString());
            this.saveNotificationToken(currentToken.toString());
		} else {
			// Show permission request UI
			console.log('No registration token available. Request permission to generate one.');
		}
	}).catch((err) => {
	console.log('An error occurred while retrieving token. ', err);
});

//To handle foreground messages
onMessage(messaging, (message) => {
	console.log(message);
});

    },
};
</script>
