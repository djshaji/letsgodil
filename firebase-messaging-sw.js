importScripts('https://www.gstatic.com/firebasejs/9.1.3/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.1.3/firebase-messaging-compat.js');
const firebaseConfig = {
    apiKey: "AIzaSyAukKq_LcWgfhdHOLvLUDeyLampdGQAun0",
    authDomain: "lets-go-dil.firebaseapp.com",
    // authDomain: "auth.letsgodil.in",
    projectId: "lets-go-dil",
    storageBucket: "lets-go-dil.appspot.com",
    messagingSenderId: "595058811681",
    appId: "1:595058811681:web:f92a18038ce8f677edd460",
    measurementId: "G-PXZPXYZZ1D"
};

// Initialize Firebase
firebaseApp = firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging ();

messaging.onMessage((payload) => {
    console.log('Message received. ', payload);
    // ...
  });
  