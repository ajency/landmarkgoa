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
var db = firebase.firestore();

const messaging = firebase.messaging();
messaging.usePublicVapidKey("BJplW7H_YA8Ii_slb0DTqh8U9UsuexByioSBOk4xKxAwdw2xcqUwzTTNy2HSvs_MncRZHRtUwsQ6nQqFSonHEaA");


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


messaging.onMessage((payload) => {
  console.log('Message received. ', payload);
});


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




// var geo_utils = require("geolocation-utils")
var variants = [];
var products = [];
var locations = [];
var stocks = [];

getVariants();
getProducts();
getLocations();
getStocks();


function getVariants(){
    let query = db.collection('variants');
    query.onSnapshot(function(snapshot) {
        if (!snapshot.size){
            variants = [];
        }

        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                let data = change.doc.data();
                data.id = change.doc.id;
                variants.push(data);
            }
            if (change.type === "modified") {
                //update variant
            }
            if (change.type === "removed") {
                // remove variant
            }
        });
    });
}

function getProducts(){
    let query = db.collection('products');
    query.onSnapshot(function(snapshot) {
        if (!snapshot.size){
            products = [];
        }

        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                let data = change.doc.data();
                data.id = change.doc.id;
                products.push(data);
            }
            if (change.type === "modified") {
                //update variant
            }
            if (change.type === "removed") {
                // remove variant
            }
        });
    });
}

function getLocations(){
    let query = db.collection('locations');
    query.onSnapshot(function(snapshot) {
        if (!snapshot.size){
            locations = [];
        }

        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                let data = change.doc.data();
                data.id = change.doc.id;
                locations.push(data);
            }
            if (change.type === "modified") {
                //update variant
            }
            if (change.type === "removed") {
                // remove variant
            }
        });
    });
}

function getStocks(){
    let query = db.collection('stocks');
    query.onSnapshot(function(snapshot) {
        if (!snapshot.size){
            stocks = [];
        }

        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                let data = change.doc.data();
                data.id = change.doc.id;
                stocks.push(data);
            }
            if (change.type === "modified") {
                //update variant
            }
            if (change.type === "removed") {
                // remove variant
            }
        });
    });
}

async function getVariantById(id) {
    let variant = variants.find((v) => v.id == id);
    return variant;
}


async function getProductById(id){
    let product = products.find((p) => p.id == id);
    return product;
}


async function getLocationWithStock (id, quantity) {
        // get the locations ids from the stocks collection where the quantity is available
        // let stocksRef = await db.collection('stocks')
        //         .where("variant_id", "==", id)
        //         .where("quantity", ">=", quantity)
        //         .get();

        // let stocks = stocksRef.docs.map(doc => {
        //     return doc.data()
        // })


        let available_stocks = stocks.filter((stock) => {return stock.variant_id == id && stock.quantity >= quantity })
        console.log("check stocks ==>",available_stocks);
        // if stock is available in atleast one location
        if(available_stocks.length){
            //get locations
            let availableLoc  = [], location, data;
            for (const stock of available_stocks) {
                // location = await db.collection('locations').doc(stock.loc_id).get();
                location = locations.find((loc) => loc.id == stock.loc_id)
                console.log("location ==>", location)
                if(location)
                    availableLoc.push(location)
            }
            return availableLoc;
        }
        else
            return [];
 }

 function isDeliverable (locations, lat_long) {
        console.log("finding deliverableLocation");
        let deliverble = [] ;
        // locations.forEach((loc)=>{
        //     let location_1 = {lat: loc.lat_long[0].lat, lon: loc.lat_long[0].long}
        //     let location_2 = {lat: lat_long[0], lon: lat_long[1]};
        //     let diff = geo_utils.headingDistanceTo(location_1, location_2);
        //     console.log("radius diff==>", diff);
        //     if(diff.distance < loc.radius){
        //         deliverble.push(loc);
        //         return;
        //     }
        // })
        return locations;
}


async function getOrderByID (id ) {
        let order = await db.collection('orders').doc(id).get();
        if(order.exists){
            return order.data();
        }
        return null;
    }

async function getLocation (loc_id ) {
        // let location = await db.collection('locations').doc(loc_id).get();
        // if(location.exists){
        //     let data = location.data();
        //     data.id = location.id
        //     return [data];
        // }
        // return [];

        let location = locations.find((loc) => loc.id == loc_id );
        if(location)
            return [location]
        return []
    }

async function updateOrder (item, cart_id, cart_data, stock_location_id) {

        cart_data.summary.mrp_total          += item.attributes.mrp * item.quantity;
        cart_data.summary.sale_price_total   += item.attributes.sale_price * item.quantity;
        cart_data.summary.you_pay            = cart_data.summary.sale_price_total + cart_data.summary.shipping_fee;
        cart_data.cart_count                 += item.quantity;
        cart_data.stock_location_id          =  stock_location_id;

        if(cart_id){
            console.log("cart items ==>", cart_data.items);
            if(cart_data.items.length){
                let index = cart_data.items.findIndex((i) => { return i.variant_id == item.variant_id})
                if(index !== -1){
                    console.log("item already in cart");
                    cart_data.items[index].quantity += item.quantity;
                    cart_data.items[index].timestamp = '';
                }
                else{
                    console.log("new item");
                    cart_data.items[cart_data.items.length] = item;
                }
            }
            else{
                cart_data.items = [item];
            }
            await db.collection('orders').doc(cart_id).set(cart_data);
        }
        else{
            let cart_ref = db.collection('orders').doc();
            // cart_data.created_at = admin.db.FieldValue.serverTimestamp()
            cart_data.created_at = '';
            cart_data.items = [item];
            await cart_ref.set(cart_data);
            cart_data.id = cart_ref.id;
            cart_id_for_order_line = cart_ref.id
        }
        return cart_data;
    }


    // async function updateOrder (item, cart_id, cart_data, stock_location_id) {
    //     let order_line_items = [];
    //     let cart_id_for_order_line = cart_id;
    //     if(cart_id){
    //         let order_lines = await db.collection('order_line_items')
    //                 .where("order_id", "==", cart_id)
    //                 .where("variant_id", "==", item.variant_id)
    //                 .get();

            
    //         order_lines.forEach(doc => {
    //             let obj = doc.data();
    //             obj.id = doc.id;
    //             order_line_items.push(obj);
    //         })
    //     }

    //     cart_data.summary.mrp_total         += item.attributes.mrp * item.quantity;
    //     cart_data.summary.sale_price_total     += item.attributes.sale_price * item.quantity;
    //     cart_data.summary.you_pay             = cart_data.summary.sale_price_total + cart_data.summary.shipping_fee;
    //     cart_data.cart_count                 += item.quantity;
    //     cart_data.stock_location_id                 =  stock_location_id;

    //     if(cart_id)
    //         await db.collection('orders').doc(cart_id).set(cart_data);
    //     else{
    //         let cart_ref = db.collection('orders').doc();
    //         // cart_data.created_at = admin.db.FieldValue.serverTimestamp()
    //         cart_data.created_at = '';
    //         await cart_ref.set(cart_data);
    //         cart_data.id = cart_ref.id;
    //         cart_id_for_order_line = cart_ref.id
    //     }

    //     if(order_line_items.length){
    //         await db.collection('order_line_items').doc(order_line_items[0].id)
    //             .update(
    //                 {
    //                     quantity : order_line_items[0].quantity + item.quantity,
    //                     // timestamp : admin.db.FieldValue.serverTimestamp()
    //                     timestamp : ''
    //                 })
    //     }
    //     else{
    //         let order_line_ref = db.collection('order_line_items').doc();
    //         let order_line_data = {
    //             order_id : cart_id_for_order_line,
    //             variant_id : item.variant_id,
    //             quantity : item.quantity,
    //             product_name : item.attributes.title,
    //             description : item.attributes.description,
    //             mrp : item.attributes.mrp,
    //             sale_price : item.attributes.sale_price,
    //             veg : item.attributes.veg,
    //             size : item.attributes.size,
    //             product_id : item.product_id,
    //             // timestamp : admin.db.FieldValue.serverTimestamp()
    //             timestamp : ''
    //         }
    //         let order_line_success = await order_line_ref.set(order_line_data);
    //     }
    //     return cart_data;
    // }