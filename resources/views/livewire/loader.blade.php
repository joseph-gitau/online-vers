{{-- loader --}}
<div>
    <div
        class="flex justify-center items-center bg-black fixed top-0 left-0 w-screen h-[100vh] z-[9999] opacity-70 overflow-hidden max-h-screen">
        <div style="color: #dccc3b" class="la-ball-clip-rotate-multiple la-3x">
            <div></div>
            <div></div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        /*!
             * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
             * Copyright 2015 Daniel Cardoso <@DanielCardoso>
             * Licensed under MIT
             */
        .la-ball-clip-rotate-multiple,
        .la-ball-clip-rotate-multiple>div {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .la-ball-clip-rotate-multiple {
            display: block;
            font-size: 0;
            color: #fff;
        }

        .la-ball-clip-rotate-multiple.la-dark {
            color: #333;
        }

        .la-ball-clip-rotate-multiple>div {
            display: inline-block;
            float: none;
            background-color: currentColor;
            border: 0 solid currentColor;
        }

        .la-ball-clip-rotate-multiple {
            width: 32px;
            height: 32px;
        }

        .la-ball-clip-rotate-multiple>div {
            position: absolute;
            top: 50%;
            left: 50%;
            background: transparent;
            border-style: solid;
            border-width: 2px;
            border-radius: 100%;
            -webkit-animation: ball-clip-rotate-multiple-rotate 1s ease-in-out infinite;
            -moz-animation: ball-clip-rotate-multiple-rotate 1s ease-in-out infinite;
            -o-animation: ball-clip-rotate-multiple-rotate 1s ease-in-out infinite;
            animation: ball-clip-rotate-multiple-rotate 1s ease-in-out infinite;
        }

        .la-ball-clip-rotate-multiple>div:first-child {
            position: absolute;
            width: 32px;
            height: 32px;
            border-right-color: transparent;
            border-left-color: transparent;
        }

        .la-ball-clip-rotate-multiple>div:last-child {
            width: 16px;
            height: 16px;
            border-top-color: transparent;
            border-bottom-color: transparent;
            -webkit-animation-duration: .5s;
            -moz-animation-duration: .5s;
            -o-animation-duration: .5s;
            animation-duration: .5s;
            -webkit-animation-direction: reverse;
            -moz-animation-direction: reverse;
            -o-animation-direction: reverse;
            animation-direction: reverse;
        }

        .la-ball-clip-rotate-multiple.la-sm {
            width: 16px;
            height: 16px;
        }

        .la-ball-clip-rotate-multiple.la-sm>div {
            border-width: 1px;
        }

        .la-ball-clip-rotate-multiple.la-sm>div:first-child {
            width: 16px;
            height: 16px;
        }

        .la-ball-clip-rotate-multiple.la-sm>div:last-child {
            width: 8px;
            height: 8px;
        }

        .la-ball-clip-rotate-multiple.la-2x {
            width: 64px;
            height: 64px;
        }

        .la-ball-clip-rotate-multiple.la-2x>div {
            border-width: 4px;
        }

        .la-ball-clip-rotate-multiple.la-2x>div:first-child {
            width: 64px;
            height: 64px;
        }

        .la-ball-clip-rotate-multiple.la-2x>div:last-child {
            width: 32px;
            height: 32px;
        }

        .la-ball-clip-rotate-multiple.la-3x {
            width: 96px;
            height: 96px;
        }

        .la-ball-clip-rotate-multiple.la-3x>div {
            border-width: 6px;
        }

        .la-ball-clip-rotate-multiple.la-3x>div:first-child {
            width: 96px;
            height: 96px;
        }

        .la-ball-clip-rotate-multiple.la-3x>div:last-child {
            width: 48px;
            height: 48px;
        }

        /*
             * Animation
             */
        @-webkit-keyframes ball-clip-rotate-multiple-rotate {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -webkit-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @-moz-keyframes ball-clip-rotate-multiple-rotate {
            0% {
                -moz-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -moz-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -moz-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @-o-keyframes ball-clip-rotate-multiple-rotate {
            0% {
                -o-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -o-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -o-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes ball-clip-rotate-multiple-rotate {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                -moz-transform: translate(-50%, -50%) rotate(0deg);
                -o-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -webkit-transform: translate(-50%, -50%) rotate(180deg);
                -moz-transform: translate(-50%, -50%) rotate(180deg);
                -o-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                -moz-transform: translate(-50%, -50%) rotate(360deg);
                -o-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
@endpush
