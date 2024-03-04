// Checks if document is loaded
const tainacanUrlPluginPerformWhenDocumentIsLoaded = callback => {
    if (/comp|inter|loaded/.test(document.readyState))
        cb();
    else
        document.addEventListener('DOMContentLoaded', callback, false);
}

tainacanUrlPluginPerformWhenDocumentIsLoaded(function() {
    setTimeout(function() {
        const notificationDismiss = document.querySelector('#tainacan-url-plugin-deprecation-notification .notice-dismiss');
    
        if (notificationDismiss) {
            notificationDismiss.addEventListener('click', function(event) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', ajaxurl);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('action=dismiss_notification');
            });
        }
    }, 250)
});