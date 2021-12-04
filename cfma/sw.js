const staticCacheName = 'site-static';
const assets = [
    '/', 
    'index.php', 
    'js/app.js', 
    'css/styles.css', 
    'css/icon.png', 
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css', 
];

// install service worker
self.addEventListener('install', evt => {
    //console.log('service worker has been installed');
    evt.waitUntil(
      caches.open(staticCacheName).then(cache => {
        console.log('caching shell assets');
        cache.addAll(assets);  
      })
    );
});

// activate service worker
self.addEventListener("activate", evt => {
    //console.log('service worker has been activated');
    evt. waitUntil(
        caches.keys().then(keys => {
            //console.log(keys);
            return Promise.all(keys
                .filter(key => key !== staticCacheName)
                .map(key => caches.delete(key))
            )
        })
    );
});

//fetch event
self.addEventListener('fetch', evt => {
    if(evt.request.url.indexOf('firestore.googleapis.com') === -1){
    //console.log('fetch event', evt);
    evt.respondWith(
        caches.match(evt.request).then(cacheRes => {
            return cacheRes || fetch(evt.request);
        })
    )}  
});
