
//<!-- Check that service workers are supported or not, check console -->

if('serviceWorker' in navigator){
    navigator. serviceWorker. register('/sw.js')
      .then((reg) => console.log('serviceWorker registered', reg))
      .catch((err) => console.log('serviceWorker not registered', err))
}