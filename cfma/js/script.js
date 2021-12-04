var alertList = document.querySelectorAll('.alert')
var alerts =  [].slice.call(alertList).map(function (element) {
  return new bootstrap.Alert(element)
})


let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
  //prevent chrome 67 and earlier from automatically
  //showing the prompt
  e.preventDefault();
  //stash the event so that it can be triggered later
  deferredPrompt = e;
});

//Notify the user to install
window.addEventListener('beforeinstallprompt', (e) => {
e.preventDefault();
deferredPrompt = e;
btnAdd.style.display = 'block';
});

//Show the prompt
btnAdd.addEventListener('click', (e) => {
deferredPrompt.prompt();
deferredPrompt.userChoice.then((choiceResult) => {
if (choiceResult.outcome === 'accepted') {
console.log('User accepted the A2HS prompt');
}
deferredPrompt = null;
});
});