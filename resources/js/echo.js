import Echo from "laravel-echo"

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'fe3a2253e56fd44acfa8',
    cluster: "ap2",
    encrypted: true,
});
