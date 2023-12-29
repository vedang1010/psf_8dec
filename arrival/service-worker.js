self.addEventListener('push', function(event) {
    const options = {
        body: event.data.text(),
        icon: 'icon.png', // Customize with your own icon
    };

    event.waitUntil(
        self.registration.showNotification('Your Notification Title', options)
    );
});
