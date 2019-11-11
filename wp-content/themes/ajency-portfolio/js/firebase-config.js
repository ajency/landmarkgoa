 // Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyC-w19gW41OaoyjuK4jHPVN5JtviKGB7KQ",
    authDomain: "project-ggb-dev.firebaseapp.com",
    databaseURL: "https://project-ggb-dev.firebaseio.com",
    projectId: "project-ggb-dev",
    storageBucket: "project-ggb-dev.appspot.com",
    messagingSenderId: "1034785903670",
    appId: "1:1034785903670:web:496c7762259b7fb3b9f497"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
console.log("firebase initialisation");


try{
    const messaging = firebase.messaging();
    messaging.usePublicVapidKey("BJplW7H_YA8Ii_slb0DTqh8U9UsuexByioSBOk4xKxAwdw2xcqUwzTTNy2HSvs_MncRZHRtUwsQ6nQqFSonHEaA");

    // monitor refresh token
    messaging.onTokenRefresh(() => {
      messaging.getToken().then((refreshed_token) => {
        console.log('Token refreshed.', refreshed_token);
        updateToken(refreshed_token);
      }).catch((err) => {
        console.log('Unable to retrieve refreshed token ', err);
        showToken('Unable to retrieve refreshed token ', err);
      });
    });
}
catch(error){
    console.log("error in messaging ==>", error);
}


function checkPushNotificationPermissions(){
    if(show_pn && 'Notification' in window && navigator.serviceWorker){
        // navigator.serviceWorker.getRegistration()
        // .then((reg) => {
        //     if(reg) {
        //         messaging.useServiceWorker(reg);
        //         askPermissions();
        //    } else {
        //      console.log('GOT undefined');
        //    }
        // });
        askPermissions();
    }
}


function askPermissions(){
    Notification.requestPermission()
    .then( () => {
        messaging.getToken().then((current_token) => {
            if (current_token) {
                console.log("fcm token =>",current_token);
                updateToken(current_token);
            } 
          else {
            // Show permission request.
            console.log('No Instance ID token available. Request permission to generate one.');
            // Show permission UI.
            // updateUIForPushPermissionRequired();
            // setTokenSentToServer(false);
          }
        }).catch((err) => {
          console.log('An error occurred while retrieving token. ', err);
          // showToken('Error retrieving Instance ID token. ', err);
          // setTokenSentToServer(false);
        });
    })
    .catch(function(err) {
        console.log("Unable to get permission to notify.", err);
    });
}



navigator.serviceWorker.addEventListener("message", (message) => {
    console.log("check ==>",message)
    let data = message.data['firebase-messaging-msg-data'].notification;
    const notificationTitle = data.title;
      const notificationOptions = {
        body: data.body,
        icon: data.icon
    };

    navigator.serviceWorker.getRegistration()
    .then( function(reg){
        if(reg) {
        reg.showNotification(notificationTitle, notificationOptions);
       } else {
         console.log('GOT undefined');
       }
    });
});

function updateToken(token){
     let old_token = readFromLocalStorage('fcm_token')
    if(!old_token || old_token != token){
        sendTokenToServer(token);
        writeInLocalStorage('fcm_token', token)
    }
}

function sendTokenToServer(token){
    let url = 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1/store-fcm-token';
    // let url = 'http://localhost:5000/project-ggb-dev/asia-east2/api/rest/v1/store-fcm-token';
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    let body = {
        fcm_token : token,
        device : isMobile ? 'mobile' : 'desktop'
    }
    axios.get(url, {params : body})
        .then((res) => {
            console.log("fcm token stored successfully");
        })
        .catch((error)=>{
            console.log("error in storing fcm token ==>", error);
        })
}