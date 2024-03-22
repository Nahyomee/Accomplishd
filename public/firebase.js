// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
import { getMessaging,  getToken, onMessage } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-messaging.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "API-KEY",
  authDomain: "PROJECT-IDfirebaseapp.com",
  projectId: "PROJECT-ID",
  storageBucket: "PROJECT-ID.appspot.com",
  messagingSenderId: "SENDER-ID",
  appId: "APP-ID"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);
const csrfToken = $('meta[name="csrf-token"]').attr('content')
function initFirebaseMessagingRegistration() {
  Notification.requestPermission().then(function () {
        return getToken(messaging, {vapidKey: "VAPID-KEY"})
    }).then(function(token) {
        
        axios.post("{{ route('fcmToken') }}",{
            _method:"POST",
            token
        }).then(({data})=>{
            console.log(data)
        }).catch(({response:{data}})=>{
            console.error(data)
        })

        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
  }

initFirebaseMessagingRegistration();

onMessage(messaging, (payload) => {
  console.log('Message received. ', payload);
  let body =payload.notification.body
  let image =payload.notification.image
  new Notification(payload.notification.title, {body, image});
// ...
});
