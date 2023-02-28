importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBcJqA_pSq3qSb-ZsJjkCsJGvRNxIerhz0",
    projectId: "consol-2d10e",
    messagingSenderId: "30474173252",
    appId: "1:30474173252:web:cd94d47143c75da9d93511",
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
