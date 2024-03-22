importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
//importScripts('https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js');

firebase.initializeApp({
    apiKey: "API-KEY",
    authDomain: "PROJECT-IDfirebaseapp.com",
    projectId: "PROJECT-ID",
    storageBucket: "PROJECT-ID.appspot.com",
    messagingSenderId: "SENDER-ID",
    appId: "APP-ID"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    console.log(payload)
    notificationTitle = payload.notification.title;
    notificationOptions = {
        body: payload.notification.body,
        image: payload.notification.image,
    };

  return self.registration.showNotification(notificationTitle,
    notificationOptions);

})

