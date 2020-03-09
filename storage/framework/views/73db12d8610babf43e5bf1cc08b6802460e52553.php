<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('/vendor/telescope/favicon.ico')); ?>">

    <meta name="robots" content="noindex, nofollow">

    <title>Telescope<?php echo e(config('app.name') ? ' - ' . config('app.name') : ''); ?></title>

    <!-- Style sheets-->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="<?php echo e(asset($cssFile, 'vendor/telescope'))); ?>" rel="stylesheet" type="text/css">
</head>
<body>
<div id="telescope" v-cloak>
    <alert :message="alert.message"
           :type="alert.type"
           :auto-close="alert.autoClose"
           :confirmation-proceed="alert.confirmationProceed"
           :confirmation-cancel="alert.confirmationCancel"
           v-if="alert.type"></alert>

    <div class="container mb-5">
        <div class="d-flex align-items-center py-4 header">

                <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100.93 137.25"><title>neutron_less</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M39.7,78l-.78-.5c.5-.32.93-.61,1.38-.88,7.44-4.49,14.85-9,22.32-13.45a4.64,4.64,0,0,0,2.49-4.22c.68-14.38,1.46-28.75,2.21-43.12q.39-7.47.81-14.93c0-.3-.23-.76.24-.87s.51.38.77.59a2.71,2.71,0,0,1,.69.74,1.49,1.49,0,0,1,.18.3c2.12,3.27,4.08,6.64,6.22,9.9Q80,17.9,84.05,24.15a2,2,0,0,1,.2.31c2.54,4.28,5.18,8.5,7.86,12.69,1.77,3.2,3.94,6.15,5.7,9.36a6.69,6.69,0,0,1,.38,1.25,6,6,0,0,1,.25,2c.06,7.38-.16,14.76.08,22.13.32,10.15.08,20.29.22,30.44,0,.64.14,1.28.1,1.91s-.06,1.58-1,1.82a2.61,2.61,0,0,1-1.46-.39q-6.47-3.06-12.89-6.22-10.28-5-20.59-10c-7.09-3.43-14.16-6.93-21.31-10.24a6,6,0,0,1-.81-.38A3.87,3.87,0,0,1,39.7,78Z" style="fill:#e94335"/><path d="M15.1,111.71q-4-6.48-7.93-12.95c-1.88-3.05-3.73-6.11-5.67-9.11a7.18,7.18,0,0,1-1.13-4Q.31,72.95.24,60.23C.18,50.31.12,40.38,0,30.46c0-1.18.28-1.44,1.3-.93A12.1,12.1,0,0,1,4.15,30.6c5.66,2.79,11.36,5.49,17,8.26,8.92,4.35,17.88,8.64,26.82,13,3.22,1.55,6.37,3.27,9.68,4.64a2.91,2.91,0,0,1,1.28.82.81.81,0,0,1,.09.59,1.25,1.25,0,0,1-.33.52,2.38,2.38,0,0,1-.5.4c-7.45,4.57-14.91,9.12-22.44,13.56A4,4,0,0,0,33.61,76c-.14,3.31-.32,6.62-.5,9.93-.25,4.93-.52,9.85-.77,14.78s-.51,9.59-.76,14.39c-.26,5-.61,10-.77,15,0,1.1-.25,2.2-.22,3.31a3.81,3.81,0,0,1-.12,1.3.74.74,0,0,1-.84.48c-.41-.11-.59-.45-.79-.78C24.5,127.22,20,120.13,15.62,113A2.45,2.45,0,0,1,15.1,111.71Z" style="fill:#4284f3"/><path d="M15.1,111.71Q19.57,118.85,24,126c1.84,3,3.64,5.94,5.46,8.91.42.44,1,.86,1.53.6s.58-1,.63-1.57c.29-3.22.36-6.45.54-9.67.28-5,.53-10,.79-15L33.74,95c.27-5,.61-10.1.78-15.15,0-1.06.19-2.12.25-3.18.1-1.64,1.28-2.55,2.53-3.31,4.19-2.53,8.41-5,12.58-7.58,2.76-1.69,5.54-3.35,8.29-5.05,1.94-1.19,2-1.37.73-3.28l-39.47-19L2.62,30.27c-.45-.22-.88-.49-1.32-.74a2.39,2.39,0,0,1,2.17.31c3.43,1.61,6.86,3.22,10.27,4.88,7,3.4,14,6.84,21,10.25q11.49,5.58,23,11.13c.72.35,1.51.6,2.19,1A2.11,2.11,0,0,1,60,61c-4.9,3-9.82,5.94-14.72,8.91-2.69,1.63-5.37,3.28-8.06,4.92a2.66,2.66,0,0,0-1.33,2.43c-.22,5.47-.44,10.94-.78,16.41-.2,3.13-.34,6.27-.51,9.4-.28,5-.56,9.92-.78,14.88q-.21,4.71-.53,9.4c-.17,2.63-.09,5.27-.46,7.88-.14.93-.44,1.83-1.48,2a2.33,2.33,0,0,1-2.26-1.36c-3.87-6.15-7.67-12.35-11.49-18.53-.91-1.48-1.79-3-2.76-4.44C14.39,112.27,14.56,112,15.1,111.71Z" style="fill:#f9f9f9"/><path d="M69.71,1.61a.2.2,0,0,1-.08-.19c.5-.64,1-.66,1.48.06s1.09,1.41,1.54,2.18c2.31,4,4.78,7.81,7.19,11.7,2,3.21,4,6.4,6,9.61,1.77,2.84,3.5,5.7,5.26,8.55,2,3.21,4,6.4,6,9.6A24.16,24.16,0,0,1,99.83,48a7.16,7.16,0,0,1,.41,2.37c-.18,11.77.44,23.53.25,35.3-.11,6.48.28,13,.27,19.43a5.18,5.18,0,0,1-.12,1.52A1.89,1.89,0,0,1,98,107.84a42.72,42.72,0,0,1-4.27-2c-.8-.36-1.62-.7-2.42-1.08-6.49-3.16-13-6.34-19.48-9.48C66,92.46,60.24,89.73,54.47,86.94c-4.58-2.22-9.12-4.51-13.7-6.74A1.94,1.94,0,0,1,39.7,78c.38.17.84.22,1,.67A5.24,5.24,0,0,0,42.59,80c9.21,4.54,18.5,8.92,27.72,13.45,4.2,2.06,8.44,4.06,12.66,6.11,4.87,2.36,9.75,4.69,14.62,7,1.44.69,2.13.34,2.15-1.26a38.29,38.29,0,0,0-.15-7,8.2,8.2,0,0,1-.06-1.4c0-2.09,0-4.18,0-6.27.18-13.26-.41-26.51-.26-39.76A8.09,8.09,0,0,0,98,46.42c-4.66-7.33-9.15-14.76-13.74-22.14C80,17.45,75.73,10.6,71.45,3.79A6.25,6.25,0,0,0,69.71,1.61Z" style="fill:#f3f3f3"/><path d="M93.72,105.81c1.28.12,2.27.93,3.38,1.45,2.39,1.11,3.6.41,3.52-2.25-.33-11.41,0-22.83-.32-34.24-.15-6.52-.09-13-.15-19.54a11.57,11.57,0,0,0-2-6.18c-1.4-2.22-2.79-4.45-4.18-6.67-2.05-3.27-4.1-6.53-6.13-9.81-1.3-2.09-2.54-4.21-3.84-6.29-2.25-3.6-4.57-7.14-6.76-10.76-2-3.23-3.87-6.48-6-9.61-.4-.59-.79-1.18-1.58-.49A1.1,1.1,0,0,1,69.14.6c1.1-.59,1.74.24,2.21.9,2.19,3.11,4.13,6.38,6.07,9.66,1.65,2.79,3.49,5.48,5.2,8.23s3.49,5.78,5.27,8.64c1.62,2.63,3.29,5.22,4.92,7.84,2.28,3.64,4.57,7.28,6.78,11a5.49,5.49,0,0,1,.8,2.76q.1,18.54.24,37.06c0,2.6-.1,5.21,0,7.81.18,3.74.17,7.48.27,11.22,0,1.74-1.09,2.89-3,2.35A10.16,10.16,0,0,1,93.72,105.81Z" style="fill:#f7f7f7"/><path d="M69.71,1.61c.72-.05,1,.45,1.35,1Q76.52,11.35,82,20.12q7,11.31,14,22.65a41.18,41.18,0,0,1,3,5,7.33,7.33,0,0,1,.59,2.84q.14,18.79.25,37.59c0,2.55,0,5.11,0,7.67.08,3,.35,5.94.24,8.92a5.79,5.79,0,0,1-.14,1.26c-.34,1.29-1,1.58-2.17,1q-2.55-1.18-5.08-2.41-10.45-5.08-20.9-10.18C64,90.67,56.13,86.84,48.24,83.1c-2-1-4.06-2-6.09-2.95-.65-.32-1.33-.64-1.41-1.5.32-.07.51.2.76.31,3,1.84,6.33,3.17,9.51,4.71,14.34,7,28.67,13.94,43.07,20.79a27,27,0,0,0,3.7,1.73c1.19.36,1.46.2,1.47-1.07,0-2.94-.16-5.87-.2-8.81-.12-8.1.15-16.22-.1-24.31-.21-7.21-.09-14.41-.22-21.61a6.7,6.7,0,0,0-1.23-4c-1.9-3-3.89-6-5.61-9.13-1.38-2.7-3.14-5.18-4.71-7.77a52.33,52.33,0,0,0-3.25-5.1v0c-1.57-2.89-3.41-5.61-5.13-8.41a32.77,32.77,0,0,0-2.87-4.42Z" style="fill:#e3e0e0"/><path d="M97.5,46.44c1.29.85,1.33,2.26,1.59,3.57a1.61,1.61,0,0,1,0,.38c-.09,15.26.4,30.51.29,45.77,0,2.92.26,5.85.22,8.79,0,1.93-.5,2.25-2.2,1.42L79,97.44,63.5,89.93,42.79,80a2.42,2.42,0,0,1-1.29-1,67.24,67.24,0,0,1,7,3.27q24.12,11.63,48.21,23.29c.19.1.37.21.55.32,1.28.19,1.61,0,1.64-1.48a29.59,29.59,0,0,0-.08-4.21,22,22,0,0,1-.15-2.81c0-8,.18-16.11-.07-24.16-.23-7.25-.07-14.49-.21-21.73a8.45,8.45,0,0,0-.6-4Z" style="fill:#dbdbdb"/><path d="M97.84,47.45c1,1.13.62,2.64,1,3.95a1,1,0,0,1,0,.25c-.09,15.32.44,30.64.27,46,0,2,.4,4.06.24,6.1a8.94,8.94,0,0,1-.11,1.27c-.34,1.54-.41,1.57-1.93.86,1.31.3,1.19-.75,1.15-1.4-.17-2.3-.06-4.6-.09-6.9-.06-5.33-.08-10.65-.12-16Q98.12,65.39,98,49.22C98,48.63,97.89,48,97.84,47.45Z" style="fill:#d1d1d1"/><path d="M75.94,11.63c1.23.69,1.56,2.06,2.27,3.13,1.89,2.82,3.6,5.75,5.38,8.63a1.49,1.49,0,0,1,.35,1.07c-2.29-3.21-4.18-6.68-6.31-10C77,13.55,76.5,12.58,75.94,11.63Z" style="fill:#e0dddd"/><path d="M83.93,24.44c.88.43,1.09,1.36,1.55,2.09q3.06,4.84,6.08,9.71a1.52,1.52,0,0,1,.33,1.07C89.11,33.1,86.43,28.82,83.93,24.44Z" style="fill:#e0dddd"/><path d="M30.26,133.46q.33-6.37.65-12.75c.09-1.92.21-3.83.3-5.74.29-5.87.55-11.75.85-17.62q.49-9.88,1-19.77c.05-.93.15-1.87.22-2.8a3.21,3.21,0,0,1,1.94-2.51l14.68-8.84C52.3,62,54.66,60.56,57,59.11a4.34,4.34,0,0,1,1.36-.68c.91.81.12,1.29-.4,1.7a43.7,43.7,0,0,1-4.32,2.73Q45.31,67.94,36.9,72.94a5.24,5.24,0,0,0-2.79,4.76c-.17,5.14-.52,10.28-.75,15.42-.14,3.06-.34,6.12-.5,9.17-.26,5.06-.55,10.11-.79,15.17-.13,3.06-.34,6.11-.51,9.17-.1,1.79-.13,3.57-.25,5.35C31.27,132.61,31.37,133.52,30.26,133.46Z" style="fill:#cccdcd"/><path d="M58.9,57.43c1.85,1.24,1.88,2.07,0,3.24-6.7,4.11-13.44,8.16-20.16,12.23-.54.33-1.14.59-1.64,1a4.41,4.41,0,0,0-2,3.59c-.17,5.26-.52,10.52-.76,15.77-.13,2.93-.31,5.85-.47,8.77-.29,5.17-.59,10.34-.8,15.52-.12,3-.41,6-.49,9-.08,2.67-.3,5.33-.53,8,0,.65-.18,1.52-1,1.64s-1.22-.61-1.53-1.28a.57.57,0,0,0,.72-.16,3.78,3.78,0,0,0,1-2.9c.25-6.29.65-12.57,1-18.85.2-4,.39-8,.6-12s.35-8.15.68-12.22c.16-1.86.24-3.74.26-5.6,0-2.17.33-4.33.33-6.5a4,4,0,0,1,2.18-3.39c3.27-2.07,6.63-4,9.93-6,1.38-.84,2.73-1.72,4.15-2.51a5.85,5.85,0,0,0,1.48-.88c1.48-1,3-1.92,4.61-2.81a2.74,2.74,0,0,0,1.25-.81,4.24,4.24,0,0,1,.88-.56c1.32-.39.1-1.23.31-1.82Z" style="fill:#e5e5e5"/><path d="M58.65,60l-.77.51c-.39.31-.89.44-1.28.77L52,64.08c-.39.31-.89.44-1.28.77q-7.12,4.34-14.25,8.67a4.41,4.41,0,0,0-2.15,3.94c-.2,5.59-.43,11.19-.78,16.78-.19,3-.34,5.93-.5,8.89-.27,5.13-.57,10.25-.79,15.38-.13,3-.26,6.11-.54,9.15-.18,2.11.11,4.25-.44,6.33-.14.53-.18,1.21-1,.75,0-.43,0-.85,0-1.28.81-.33.71-1.08.73-1.73.19-4.28.28-8.57.55-12.84q.3-4.83.52-9.65c.16-3.26.33-6.53.51-9.78.27-4.87.51-9.74.78-14.61.16-2.75.24-5.5.45-8.25A4.54,4.54,0,0,1,36.27,73c4.53-2.77,9.09-5.48,13.63-8.24Q53.77,62.4,57.59,60c.54-.34,1.32-.64.79-1.56l.28-.22C59.63,59.08,59.63,59.1,58.65,60Z" style="fill:#d8d8d8"/><path d="M58.65,60a1.13,1.13,0,0,0,0-1.78l.23-.3C59.93,59.29,59.92,59.41,58.65,60Z" style="fill:#ddddde"/><path d="M56.6,61.27a1.59,1.59,0,0,1,1.28-.77A1.57,1.57,0,0,1,56.6,61.27Z" style="fill:#ddddde"/><path d="M50.71,64.85A1.63,1.63,0,0,1,52,64.08,1.57,1.57,0,0,1,50.71,64.85Z" style="fill:#ddddde"/></g></g></svg>
            <a href="/portal/">
                <h4 class="mb-0 ml-3"><strong>Neutron Admin </strong> Spy<?php /*echo e(config('app.name') ? ' - ' . config('app.name') : '');*/ ?></h4>

            </a>
            <button class="btn btn-outline-primary ml-auto mr-3" v-on:click.prevent="toggleRecording" title="Play/Pause">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="icon fill-primary" v-if="recording">
                    <path d="M5 4h3v12H5V4zm7 0h3v12h-3V4z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="icon fill-primary" v-else>
                    <path d="M4 4l12 6-12 6z"/>
                </svg>
            </button>

            <button class="btn btn-outline-primary mr-3" :class="{active: autoLoadsNewEntries}" v-on:click.prevent="autoLoadNewEntries" title="Auto Load Entries">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="icon fill-primary">
                    <path d="M10 3v2a5 5 0 0 0-3.54 8.54l-1.41 1.41A7 7 0 0 1 10 3zm4.95 2.05A7 7 0 0 1 10 17v-2a5 5 0 0 0 3.54-8.54l1.41-1.41zM10 20l-4-4 4-4v8zm0-12V0l4 4-4 4z"></path>
                </svg>
            </button>

            <div class="btn-group" role="group" aria-label="Basic example">
                <router-link tag="button" to="/monitored-tags" class="btn btn-outline-primary" active-class="active" title="Monitoring">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="icon fill-primary">
                        <path d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                    </svg>
                </router-link>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <router-link active-class="active" to="/requests" class="nav-link d-flex align-items-center pt-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M0 3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm2 2v12h16V5H2zm8 3l4 5H6l4-5z"></path>
                            </svg>
                            <span>Requests</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/commands" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z"></path>
                            </svg>
                            <span>Commands</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/schedule" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-7.59V4h2v5.59l3.95 3.95-1.41 1.41L9 10.41z"></path>
                            </svg>
                            <span>Schedule</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/jobs" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M0 2h20v4H0V2zm0 8h20v2H0v-2zm0 6h20v2H0v-2z"></path>
                            </svg>
                            <span>Jobs</span>
                        </router-link>
                    </li>

                    <li class="nav-item mt-3">
                        <router-link active-class="active" to="/exceptions" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M15.3 14.89l2.77 2.77a1 1 0 0 1 0 1.41 1 1 0 0 1-1.41 0l-2.59-2.58A5.99 5.99 0 0 1 11 18V9.04a1 1 0 0 0-2 0V18a5.98 5.98 0 0 1-3.07-1.51l-2.59 2.58a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41l2.77-2.77A5.95 5.95 0 0 1 4.07 13H1a1 1 0 1 1 0-2h3V8.41L.93 5.34a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l2.1 2.1h11.12l2.1-2.1a1 1 0 0 1 1.41 0 1 1 0 0 1 0 1.41L16 8.41V11h3a1 1 0 1 1 0 2h-3.07c-.1.67-.32 1.31-.63 1.89zM15 5H5a5 5 0 1 1 10 0z"></path>
                            </svg>
                            <span>Exceptions</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/logs" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v2H0V2zm1 3h18v13a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V5zm6 2v2h6V7H7z"></path>
                            </svg>
                            <span>Logs</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/dumps" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M.7 9.3l4.8-4.8 1.4 1.42L2.84 10l4.07 4.07-1.41 1.42L0 10l.7-.7zm18.6 1.4l.7-.7-5.49-5.49-1.4 1.42L17.16 10l-4.07 4.07 1.41 1.42 4.78-4.78z"></path>
                            </svg>
                            <span>Dumps</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/views" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M7 3H2v14h5V3zm2 0v14h9V3H9zM0 3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm3 1h3v2H3V4zm0 3h3v2H3V7zm0 3h3v2H3v-2z"/>
                            </svg>
                            <span>Views</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/queries" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M1 1h18v2H1V1zm0 8h18v2H1V9zm0 8h18v2H1v-2zM1 5h12v2H1V5zm0 8h12v2H1v-2z"></path>
                            </svg>
                            <span>Queries</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/models" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 1l10 6-10 6L0 7l10-6zm6.67 10L20 13l-10 6-10-6 3.33-2L10 15l6.67-4z"></path>
                            </svg>
                            <span>Models</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/events" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16 8A6 6 0 1 0 4 8v11H2a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2V8a8 8 0 1 1 16 0v3a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2V8zm-4 2h3v10h-3V10zm-7 0h3v10H5V10z"></path>
                            </svg>
                            <span>Events</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/mail" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z"></path>
                            </svg>
                            <span>Mail</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/notifications" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M3 6c0-1.1.9-2 2-2h8l4-4h2v16h-2l-4-4H5a2 2 0 0 1-2-2H1V6h2zm8 9v5H8l-1.67-5H5v-2h8v2h-2z"></path>
                            </svg>
                            <span>Notifications</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/gates" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7 10V7a5 5 0 1 1 10 0v3h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h2zm2 0h6V7a3 3 0 0 0-6 0v3zm-4 2v8h14v-8H5zm7 2a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1z"></path>
                            </svg>
                            <span>Gates</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/cache" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"></path>
                            </svg>
                            <span>Cache</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link active-class="active" to="/redis" class="nav-link d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M.96 9.84c1.35.61 6.83 2.83 7.73 3.26.93.44 1.58.45 2.75-.16 1.13-.59 6.21-2.68 7.6-3.36l.16.06c1.04.38 1.08.7.01 1.25-1.06.56-6.59 2.83-7.77 3.44-1.17.62-1.82.61-2.75.17-.93-.45-6.81-2.82-7.87-3.33-1.06-.5-1.08-.85-.04-1.26l.18-.07zM.8 13.19h.01c1.06.5 6.94 2.88 7.87 3.33.93.44 1.58.45 2.75-.17 1.17-.6 6.6-2.84 7.74-3.42h.02c1.04.39 1.08.7.01 1.26-1.06.55-6.59 2.82-7.77 3.44-1.17.61-1.82.6-2.75.16-.93-.44-6.81-2.82-7.87-3.33-1.06-.5-1.08-.85-.04-1.26l.03-.01zm18.4-5.71c-1.06.55-6.59 2.82-7.77 3.44-1.17.61-1.82.6-2.75.16-.93-.44-6.81-2.82-7.87-3.32C-.24 7.25-.26 6.9.78 6.49c1.04-.4 6.89-2.7 8.12-3.14 1.24-.44 1.67-.46 2.72-.07 1.05.38 6.54 2.57 7.58 2.95 1.04.38 1.08.7.01 1.25zm-6.59-1.95l-1.34-.5.36-.86-1.32.44-1.4-.55.45.83-1.5.53 2 .18.63 1.04.39-.93 1.73-.18zm-2.22 4.53L11.8 8l-4.63.7 3.23 1.35zm-4.48-2.1c1.37 0 2.47-.42 2.47-.95s-1.1-.96-2.47-.96-2.48.43-2.48.96 1.11.96 2.48.96zm8.75-2.17v2.16l2.74-1.08-2.74-1.08zm-3.03 1.2l2.73 1.08.3-.12V5.8l-3.03 1.2z"></path>
                            </svg>
                            <span>Redis</span>
                        </router-link>
                    </li>
                </ul>
            </div>

            <div class="col-10">
                <?php if(! $assetsAreCurrent): ?>
                    <div class="alert alert-warning">
                        The published Telescope assets are not up-to-date with the installed version. To update, run:<br/><code>php artisan telescope:publish</code>
                    </div>
                <?php endif; ?>

                <router-view></router-view>
            </div>
        </div>
    </div>
</div>

<!-- Global Telescope Object -->
<script>
    window.Telescope = <?php echo json_encode($telescopeScriptVariables, 15, 512) ?>;
</script>

<script src="<?php echo e(asset('app.js', 'vendor/telescope'))); ?>"></script>
</body>
</html>
<?php /**PATH C:\wamp64\www\code\Neutron\vendor\laravel\telescope\src/../resources/views/layout.blade.php ENDPATH**/ ?>