importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

// workbox.setConfig({
//   debug: true
// });

workbox.core.skipWaiting();
workbox.core.clientsClaim();

// cache apis
workbox.routing.registerRoute(
  new RegExp('https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1/misc/*'),
  new workbox.strategies.CacheFirst({
    cacheName: 'ggb-apis',
    plugins: [
        new workbox.cacheableResponse.Plugin({
            statuses: [0, 200],
        }),
        new workbox.expiration.Plugin({
            maxAgeSeconds: 60 * 60 * 24,
            maxEntries: 50,
            purgeOnQuotaError: true
        })
    ]
  })
);

workbox.routing.registerRoute(
  new RegExp('https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1/misc/*'),
  new workbox.strategies.CacheFirst({
    cacheName: 'ggb-apis',
    plugins: [
        new workbox.cacheableResponse.Plugin({
            statuses: [0, 200],
        }),
        new workbox.expiration.Plugin({
            maxAgeSeconds: 60 * 60 * 24,
            maxEntries: 50,
            purgeOnQuotaError: true
        })
    ]
  })
);


//cache js and css - production
workbox.routing.registerRoute(
    new RegExp('https://order.greengrainbowl.com/*'),
    new workbox.strategies.CacheFirst({
        cacheName: 'ggb-prod',
        plugins: [
            new workbox.expiration.Plugin({
                maxAgeSeconds: 60 * 60 * 24 * 7, // cache for one week
                maxEntries: 50, 
                purgeOnQuotaError: true
            })
        ]
    })
);


//cache js and css - staging
workbox.routing.registerRoute(
    new RegExp('http://order-staging.greengrainbowl.com/*'),
    new workbox.strategies.CacheFirst({
        cacheName: 'ggb-stage',
        plugins: [
            new workbox.expiration.Plugin({
                maxAgeSeconds: 60 * 60 * 24 * 7, // cache for one week
                maxEntries: 50, 
                purgeOnQuotaError: true
            })
        ]
    })
);

//cache js and css - local
workbox.routing.registerRoute(
    new RegExp('/greengrainbowl/app/build/*'),
    new workbox.strategies.CacheFirst({
        cacheName: 'ggb-local',
        plugins: [
            new workbox.expiration.Plugin({
                maxAgeSeconds: 60 * 60 * 24 * 7, // cache for one week
                maxEntries: 50, 
                purgeOnQuotaError: true
            })
        ]
    })
);

workbox.precaching.precacheAndRoute([]);





importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');

firebase.initializeApp({
    messagingSenderId: "1034785903670"
});

const messaging = firebase.messaging();

// messaging.useServiceWorker(self.registration);

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  let data = payload.data;
  let notificationTitle = data.title;
  let notificationOptions = {
      body: data.message,
      icon: data.icon
  };

  return self.registration.showNotification(notificationTitle,
    notificationOptions);
});


self.addEventListener('notificationclick', function(event) {
  console.log("notification clicked ==>", event);
  event.notification.close();

  event.waitUntil(
    clients.openWindow('https://greengrainbowl.com/')
  );
});