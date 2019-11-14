 // Your web app's Firebase configuration

// var firebaseConfig = {
//     apiKey: "AIzaSyC-w19gW41OaoyjuK4jHPVN5JtviKGB7KQ",
//     authDomain: "project-ggb-dev.firebaseapp.com",
//     databaseURL: "https://project-ggb-dev.firebaseio.com",
//     projectId: "project-ggb-dev",
//     storageBucket: "project-ggb-dev.appspot.com",
//     messagingSenderId: "1034785903670",
//     appId: "1:1034785903670:web:496c7762259b7fb3b9f497"
// };

 var firebaseConfig = {
    apiKey: "AIzaSyDkH2U1VrkRiXNHkyrhTOuL48zeq_2dwAw",
    authDomain: "project-ggb.firebaseapp.com",
    databaseURL: "https://project-ggb.firebaseio.com",
    projectId: "project-ggb",
    storageBucket: "project-ggb.appspot.com",
    messagingSenderId: "854451069142",
    appId: "1:854451069142:web:0e523576b2ef9c7f47e977"
};

// Initialize Firebase
console.log("initialising firebase");
firebase.initializeApp(firebaseConfig)
var db = firebase.firestore();

initialiseMessaging();

function initialiseMessaging(){
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

    }
    catch(error){
        console.log("error messaging==>", error);
    }    
}
// firebase messaging - push notitifcations



function checkPushNotificationPermissions(){
    if(show_pn && 'Notification' in window && navigator.serviceWorker){
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
// end of firebase messaging - push notitifcations


var products = [];
var cartData;
var stockLocations = []
var userAddresses = [];
var userDetails;

syncProducts();
syncLocations()
syncAddresses();
syncUserDetails();

if(window.readFromLocalStorage('cart_id')){
    sycnCartData(window.readFromLocalStorage('cart_id'));
}

function syncProducts(){
    let query = db.collection('products');
    query.onSnapshot(function(snapshot) {
        if (!snapshot.size){
            products = [];
        }

        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                console.log("data ==>", change.doc.data());
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

function syncLocations() {
    let query = db.collection('locations');
    query.onSnapshot(function(snapshot) {
        if (!snapshot.size){
            stockLocations = [];
        }

        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                let data = change.doc.data();
                data.id = change.doc.id;
                stockLocations.push(data);
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


var unsubscribeAddressListner
function syncAddresses() {
    firebase.auth().onAuthStateChanged((user) => {
        if(user && !user.isAnonymous){

            if(unsubscribeAddressListner){
                unsubscribeAddressListner();
            }
            let query = db.collection('user-details').doc(firebase.auth().currentUser.uid).collection('addresses');
            unsubscribeAddressListner = query.onSnapshot(function(snapshot) {
                if (!snapshot.size){
                    userAddresses = [];
                }

                snapshot.docChanges().forEach(function(change) {
                    if (change.type === "added") {
                        let data = change.doc.data();
                        data.id = change.doc.id;
                        userAddresses.push(data);
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
    });
}

var unsubscribeUserDetailsListner
function syncUserDetails() {
    firebase.auth().onAuthStateChanged((user) => {
        if(user){
            if(unsubscribeUserDetailsListner){
                unsubscribeUserDetailsListner();
            }

            let query = db.collection('user-details').doc(firebase.auth().currentUser.uid);
            unsubscribeUserDetailsListner = query.onSnapshot(function(doc) {
                if(doc.exists)
                    userDetails = doc.data();
            });
        }
    });
}

async function getUserDetails(){
    if(window.userDetails){
        return userDetails
    }
    let user_details = await db.collection('user-details').doc(firebase.auth().currentUser.uid).get();
    if(user_details.exists){
        return user_details.data();
    }
    return null;
}


async function getAllStockLocations(){
    let location_ref = await db.collection('locations').get()
    let all_locations = location_ref.docs.map(doc => {
        let obj = doc.data();
        obj.id = doc.id;
        return obj;
    });
    return all_locations;
}

async function fetchProduct(product_id){
    let product = await db.collection('products').doc(product_id).get();
    let product_obj = product.data();
    product_obj.id = product.id;
    console.log("async fetch product ==>", product_obj);
    return product_obj;
}

var unsubscribeCartListner;

function sycnCartData(id){
    if(unsubscribeCartListner)
        unsubscribeCartListner();
    let query = db.collection('carts').doc(id);    
    unsubscribeCartListner = query.onSnapshot(function(doc) {
        if(doc.exists)
            cartData = doc.data();
    });
}

async function getCartByID(id ) {
        if(cartData){
            return cartData;
        }
        else{
            let cart = await db.collection('carts').doc(id).get();
            if(cart.exists){
                return cart.data();
            }
            return null;
        }
}

async function updateOrder (item, cart_id, cart_data, stock_location_id) {

        cart_data.summary.mrp_total          += item.attributes.mrp * item.quantity;
        cart_data.summary.sale_price_total   += item.attributes.sale_price * item.quantity;
        cart_data.summary.you_pay            = cart_data.summary.sale_price_total + cart_data.summary.shipping_fee;
        cart_data.cart_count                 += item.quantity;
        cart_data.stock_location_id          =  stock_location_id;

        console.log("cart items ==>", cart_data.items);
        if(cart_data.items.length){
            let index = cart_data.items.findIndex((i) => { return i.variant_id == item.variant_id})
            if(index !== -1){
                console.log("item already in cart");
                cart_data.items[index].quantity += item.quantity;
                cart_data.items[index].timestamp = new Date().getTime();
            }
            else{
                console.log("new item");
                let order_line_item = formateOrderLine(item);
                cart_data.items[cart_data.items.length] = order_line_item;
            }
        }
        else{
            let order_line_item = formateOrderLine(item);
            cart_data.items = [order_line_item];
        }
        console.log("cart data before set ==>", cart_data);
        await db.collection('carts').doc(cart_id).set(cart_data);
        console.log("cart data after set")
        sycnCartData(cart_id);
        
        return cart_data;
}

function formateOrderLine(item){
    let order_line_item = {
        variant_id : item.variant_id,
        quantity : item.quantity,
        product_name : item.attributes.title,
        description : item.attributes.description,
        mrp : item.attributes.mrp,
        sale_price : item.attributes.sale_price,
        veg : item.attributes.veg,
        size : item.attributes.size,
        product_id : item.product_id,
        timestamp : new Date().getTime()
    }
    return order_line_item;
}


function findDeliverableLocation(locations, lat_long){
    let deliverble, min_diff = 9999999;

        locations.forEach((loc)=>{
            let diff = headingDistanceTo(lat_long[0], lat_long[1], loc.lat_long.lat, loc.lat_long.long);
            console.log("radius diff==>", diff);

            if(diff < loc.radius && diff < min_diff){
                min_diff = diff;
                deliverble = loc;
            }
        })
    console.log("closest deliverable ==>", deliverble);
    return deliverble;
}

function headingDistanceTo(lat1, lon1, lat2, lon2) {
    console.log("check cordinates ==>", lat1, lon1, lat2, lon2);
    if ((lat1 == lat2) && (lon1 == lon2)) {
        return 0;
    }
    else {
        var radlat1 = Math.PI * lat1/180;
        var radlat2 = Math.PI * lat2/180;
        var theta = lon1-lon2;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
            dist = 1;
        }
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        dist = dist * 1.609344 * 1000;
        console.log("distance ==>", dist);
        return dist;
    }
}


async function removeItemFromCart(variant_id, cart_id, quantity){
    try{
        let cart_data = await window.getCartByID(cart_id);
        let index = cart_data.items.findIndex((item) => item.variant_id == variant_id);
        let item_data = cart_data.items[index];
        let new_quantity = Number(item_data.quantity) - quantity;

        if(new_quantity<=0) {
            cart_data.summary.mrp_total -= item_data.mrp * item_data.quantity;
            cart_data.summary.sale_price_total -= item_data.sale_price * item_data.quantity;
            cart_data.cart_count -= item_data.quantity;
            if(cart_data.cart_count == 0){
                cart_data.shipping_fee = 0;
            }
            cart_data.items.splice(index, 1);
        } else {
        
            cart_data.summary.mrp_total -= item_data.mrp * quantity;
            cart_data.summary.sale_price_total     -= item_data.sale_price * quantity;
            cart_data.cart_count = Number(cart_data.cart_count)-quantity;
            cart_data.items[index].quantity = new_quantity
        }
        cart_data.summary.you_pay = cart_data.summary.sale_price_total + cart_data.summary.shipping_fee;
        await db.collection("carts").doc(cart_id).set(cart_data);
        let response = {
            "message": "Successfully updated the cart",
            "cart_count": cart_data.cart_count,
            "summary": cart_data.summary,
            success : true
        }
        return response;

    }
    catch(error){
        console.log("error in remove item from cart ==>", error);
        let res = {
            success: false, 
            message: error,
        }
        return res;
    }
}


async function fetchCart(cart_id){
    let cart_data = await window.getCartByID(cart_id);
    let products = window.products;
    let items = [];
    cart_data = JSON.parse(JSON.stringify(cart_data));
    cart_data.items.forEach((item)=>{
        let product = products.find((product) => { return product.id == item.product_id})
        let deliverable = true; //check if deliverable
        let in_stock = true;     // check if in stock
        if(!cart_data.stock_location_id){
            deliverable = false;
        }
        else{
            let variant = product.variants.find((v)=>{ return v.id == item.variant_id});
            let stock_location = variant.stock_locations.find((stock)=>{ return stock.id == cart_data.stock_location_id})
            if(stock_location.quantity < item.quantity){
                in_stock = false;
            }
        }
        let formatted_item = {
            variant_id : item.variant_id,
            attributes: {
                title: item.product_name,
                images: {
                  "1x": product.image_urls[0]
                },
                size : item.size,
                price_mrp : item.mrp,
                price_final : item.sale_price,
                discount_per : 0
            },
              availability : in_stock,
              quantity : item.quantity,
              timestamp : item.timestamp,
              deliverable : deliverable,
              product_id : product.id
        }
        items.push(formatted_item);
    })
    
    cart_data.items = items;
    let response = {
            success: true, 
            cart : cart_data,
            coupon_applied: null,
            coupons: [],
            approx_delivery_time : "40 mins"
    }

    return response;

}


async function addToCart(variant_id = null, lat_long = null, cart_id = null, formatted_address = null, product) {
    try{
        console.log("product ==>", product);
        let stock_location_id,  quantity = 1, locations = [], location;
        let cart_data;
        let user_id = firebase.auth().currentUser.uid;
        let variant = product.variants.find((v) => v.id === variant_id);
        console.log("varaint ==>", variant);

        if(cart_id){
            cart_data = await window.getCartByID(user_id);
            console.log("cart data from db ==> cart_data");
        }

        if(!cart_data ){
            cart_data = getNewCartData(lat_long, formatted_address);
            window.writeInLocalStorage('cart_id' , firebase.auth().currentUser.uid);
        }
        console.log("cart data ==>",cart_data);

        // TODO : check if the item is already in cart and update the qunatity value accordingly.
        // create new variable called updated quantity

        let item_from_cart = cart_data.items.find((i) => { return i.variant_id == variant_id});
        let new_quantity = quantity;
        if(item_from_cart){
            new_quantity += item_from_cart.quantity;
        }

        if(cart_data.stock_location_id){
            location = variant.stock_locations.find((loc)=>{ return loc.id == cart_data.stock_location_id});
            if(location && location.quantity < new_quantity){
                throw 'Quantity Not Available';
            }
        }
        else{
            //new code
            if(!window.findDeliverableLocation(window.stockLocations, cart_data.lat_long)){
                throw 'Not deliverable at your location';
            }
            //end of new code
            else{
                locations = variant.stock_locations.filter((loc)=>{ return loc.quantity >= new_quantity});
                if(locations && locations.length){
                    location = window.findDeliverableLocation(locations, cart_data.lat_long)
                }
                else{
                    throw 'Quantity Not Available';
                }
            }
        }
        console.log("check deliverable_locations", location)
        if(location){
            stock_location_id = location.id;
        }
        else{
            throw 'Quantity Not Available';
        }

        let item = {
            attributes : {
                title : product.title,
                images : product.image_urls,
                size : variant.size,
                mrp : variant.mrp,
                sale_price : variant.sale_price,
                discount_per : 0,
                description : product.description,
                veg : product.veg
            },
            quantity : quantity,
            variant_id : variant_id,
            product_id : product.id,
            timestamp : new Date().getTime()
        }

        let order_data = await window.updateOrder(item, user_id, cart_data, stock_location_id)

        console.log("update order data");

        let res = {
            success: true, 
            message: 'Successfully added to cart',
            item : item,
            summary : order_data.summary,
            cart_count : order_data.cart_count,
            cart_id : order_data.id,
        }
        return res;
    }
    catch(error){
        console.log("firestore function error in add to cart ==>", error);
        let res = {
            success: false, 
            message: error,
        }
        return res;
    }
}


function getNewCartData (lat_long, formatted_address) {
    let cart_data = {
        user_id : firebase.auth().currentUser.uid,
        summary : {
            mrp_total : 0,
            sale_price_total : 0,
            cart_discount : 0,
            shipping_fee : 50,
            you_pay : 0 + 50,
        },
        order_type : 'cart',
        cart_count : 0,
        lat_long : lat_long,
        formatted_address : formatted_address,
        stock_location_id : '',
        verified : !firebase.auth().currentUser.isAnonymous,
        business_id : "zq6Rzdvcx0UrULwzeSEr",
        mobile_number : firebase.auth().currentUser.phoneNumber ? firebase.auth().currentUser.phoneNumber : '',
        items : [],
        created_at : new Date().getTime()
    }
    return cart_data;
}

async function updateDeliveryLocation(lat_long, formatted_address,  cart_id){
    let cart_data = await getCartByID(cart_id), locations;

    if(window.stockLocations.length){
        locations = window.stockLocations;
    }
    else{
        locations = await getAllStockLocations();
    }

    console.log("update delivery address all locations", locations);
    let stock_location_id = '';

    let closest_deliverable_location = findDeliverableLocation(locations, lat_long)
    if(closest_deliverable_location){
        stock_location_id = closest_deliverable_location.id;
    }


    console.log("update delivery address delivery id ==>", stock_location_id);
    await db.collection('carts').doc(cart_id)
            .update(
                {
                    formatted_address : formatted_address,
                    lat_long : lat_long,
                    stock_location_id : stock_location_id
                })
    let res = { success : true , message: 'Address updated successfully' }
    return res;
}


async function getAddresses(){
    if(window.userAddresses.length){
        return window.userAddresses
    }
    
    let addresses_ref = await db.collection('user-details').doc(firebase.auth().currentUser.uid).collection('addresses').get();
    let addresses = addresses_ref.docs.map(doc => {
        let obj = doc.data();
        obj.id = doc.id;
        return obj;
    });
    return addresses;
}

async function createCartForVerifiedUser(cart_id){
    let cart_data = await window.getCartByID(cart_id);
    cart_data.user_id = firebase.auth().currentUser.uid;
    cart_data.verified = true;
    await db.collection("carts").doc(firebase.auth().currentUser.uid).set(cart_data);
    sycnCartData(firebase.auth().currentUser.uid);
}

async function addAddress(addressObj) {
        //TODO : get UID from id token
        userDetails_ref = await db.collection("user-details").doc(firebase.auth().currentUser.uid).get()
        await db.collection("user-details").doc(firebase.auth().currentUser.uid).update({
            name    : addAddress.name,
            email   : addAddress.email
        })

        let address_obj = {
            name		: addressObj.name,
            email       :addAddress.email,
            phone       :userDetails_ref.data().phone,
            address 	: addressObj.address,
            landmark 	: addressObj.landmark,
            city 		: addressObj.city,
            state 		: addressObj.state,
            pincode 	: addressObj.pincode,
            default 	: addressObj.set_default,
            lat_long	: addressObj.lat_long,
            formatted_address : addressObj.formatted_address,
            type		: addressObj.type,
            verified    : !firebase.auth().currentUser.isAnonymous()

        }
        let address_ref = await db.collection("user-details").doc(firebase.auth().currentUser.uid).collection('addresses').doc();
        await address_ref.set(address_obj);
        return address_ref.data()
}
