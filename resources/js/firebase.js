import firebase from 'firebase/app'
import 'firebase/app'
import 'firebase/messaging'

export default {
  methods: {
    saveNotificationToken(token) {
      const registerNotifTokenURL = 'api/register-notif-token/'
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
    var config = {
        apiKey: "AIzaSyBcJqA_pSq3qSb-ZsJjkCsJGvRNxIerhz0",
        authDomain: "consol-2d10e.firebaseapp.com",
        projectId: "consol-2d10e",
        storageBucket: "consol-2d10e.appspot.com",
        messagingSenderId: "30474173252",
        appId: "1:30474173252:web:cd94d47143c75da9d93511",
        measurementId: "G-EHQJQJEDC1"
    }
    firebase.initializeApp(config)

    const messaging = firebase.messaging()

    messaging.usePublicVapidKey("<Public Vapid Key>")

    messaging.requestPermission().then(() => {
      console.log('Notification permission granted.')
      messaging.getToken().then((token) => {
        console.log('New token created: ', token)
        this.saveNotificationToken(token)
      })
    }).catch((err) => {
      console.log('Unable to get permission to notify.', err)
    })

    messaging.onTokenRefresh(function () {
      messaging.getToken().then(function (newToken) {
        console.log('Token refreshed: ', newToken)
        this.saveNotificationToken(newToken)
      }).catch(function (err) {
        console.log('Unable to retrieve refreshed token ', err)
      })
    })
  }
}
