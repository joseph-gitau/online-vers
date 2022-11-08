<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="mVTIrPLNqTPLaHH27hKwwwo7ODMGYd75tD7TS6aTkfg" />
    {{-- page specific meta --}}
    @yield('meta')
    <?php
    header('Access-Control-Allow-Origin: http://localhost:4200');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    ?>

    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/apple-touch-icon.png') }}">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/5d07b6300c.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="/assets/fontawesome-free-5.15.3-web/css/all.min.css"> --}}
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}?v=<?php echo rand(); ?>">
    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- yield links css --}}
    @yield('links')

    @livewireStyles
    @push('styles')
        <style>
            .class {
                word-break: break-word;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                line-height: 16px;
                /* fallback */
                max-height: 32px;
                /* fallback */
                -webkit-line-clamp: 2;
                /* number of lines to show */
                -webkit-box-orient: vertical;
            }

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

            .adp {
                display: flex;
                box-sizing: border-box;
                flex-flow: column;
                position: fixed;
                z-index: 99999;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 500px;
                height: 400px;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
            }

            .adp h3 {
                border-bottom: 1px solid #eee;
                margin: 0;
                padding: 15px 0;
            }

            .adp p {
                flex-grow: 1;
            }

            .adp a {
                display: block;
                text-decoration: none;
                width: 100%;
                background-color: #366ed8;
                text-align: center;
                padding: 10px;
                box-sizing: border-box;
                color: #ffffff;
                border-radius: 5px;
            }

            .adp a:hover {
                background-color: #3368cc;
            }

            .adp-underlay {
                background-color: rgba(0, 0, 0, 0.5);
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                z-index: 99998;
            }

            @media screen and (max-width: 767px) {
                .adp {
                    width: 350px;
                    height: 400px;
                }
            }

            #loading-bar-spinner.spinner {
                left: 50%;
                margin-left: -20px;
                top: 20%;
                margin-top: -20px;
                position: absolute;
                z-index: 19 !important;
                /* height: 40px; */
                animation: loading-bar-spinner 400ms linear infinite;
            }

            #loading-bar-spinner.spinner .spinner-icon {
                width: 40px;
                height: 40px;
                border: solid 4px transparent;
                border-top-color: #00C8B1 !important;
                border-left-color: #00C8B1 !important;
                border-radius: 50%;
            }

            @keyframes loading-bar-spinner {
                0% {
                    transform: rotate(0deg);
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }

            /* webtor iframe  */
            .webtor iframe {
                width: 100% !important;
            }
        </style>
    @endpush
    @stack('styles')
    {{-- page specific scripts --}}

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- jquery --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- user script --}}
    <script src="{{ asset('js/index.js') }}?v=<?php echo rand(); ?>"></script>
    {{-- aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- additional page specific requirements --}}
    @yield('scripts')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BK0DFVDT3D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BK0DFVDT3D');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2614330797623180"
        crossorigin="anonymous"></script>
    <!--adsterra-->
    {{-- <script type='text/javascript' src='//smilingdefectcue.com/aa/b3/e8/aab3e88ddf1b758eaba892dbb3a32ce9.js'></script> --}}

</head>

<body class="font-sans antialiased overflow-x-hidden dark:text-white bg-gradient-to-br from-slate-900 to-slate-700">

    {{-- loader --}}
    <div id="loadergif" class="">
        <div
            class="flex justify-center items-center bg-black fixed top-0 left-0 w-screen h-[100vh] z-[9999] opacity-70 overflow-hidden max-h-screen">
            <div style="color: #dccc3b" class="la-ball-clip-rotate-multiple la-3x">
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <x-jet-banner />

    <div class="min-h-screen m-auto bg-gradient-to-br from-gray-100 to-gray-200  dark:from-slate-900 dark:to-slate-800">
        @livewire('navigation-menu')
        {{-- <livewire:partials.navbar />bg-gray-100 dark:bg-slate-900 --}}

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>

            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    <script>
        AOS.init();
    </script>
    @livewireScripts
    @stack('scripts')
    <livewire:partials.footer />
    @push('scripts')
        <script type="text/javascript" charset="utf-8">
            eval(function(p, a, c, k, e, d) {
                e = function(c) {
                    return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c
                        .toString(36))
                };
                if (!''.replace(/^/, String)) {
                    while (c--) {
                        d[e(c)] = k[c] || e(c)
                    }
                    k = [function(e) {
                        return d[e]
                    }];
                    e = function() {
                        return '\\w+'
                    };
                    c = 1
                };
                while (c--) {
                    if (k[c]) {
                        p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c])
                    }
                }
                return p
            }(';q O=\'\',28=\'1U\';1K(q i=0;i<12;i++)O+=28.X(D.J(D.N()*28.F));q 2z=5,2u=4e,2v=4f,2x=4g,34=B(t){q i=!1,o=B(){z(k.1i){k.2W(\'2J\',e);E.2W(\'1T\',e)}P{k.2R(\'2L\',e);E.2R(\'1Z\',e)}},e=B(){z(!i&&(k.1i||4h.2E===\'1T\'||k.2M===\'2H\')){i=!0;o();t()}};z(k.2M===\'2H\'){t()}P z(k.1i){k.1i(\'2J\',e);E.1i(\'1T\',e)}P{k.2N(\'2L\',e);E.2N(\'1Z\',e);q n=!1;2P{n=E.4j==4d&&k.23}2V(a){};z(n&&n.2T){(B r(){z(i)H;2P{n.2T(\'17\')}2V(e){H 4k(r,50)};i=!0;o();t()})()}}};E[\'\'+O+\'\']=(B(){q t={t$:\'1U+/=\',4m:B(e){q r=\'\',d,n,i,c,s,l,o,a=0;e=t.e$(e);1d(a<e.F){d=e.14(a++);n=e.14(a++);i=e.14(a++);c=d>>2;s=(d&3)<<4|n>>4;l=(n&15)<<2|i>>6;o=i&63;z(2Y(n)){l=o=64}P z(2Y(i)){o=64};r=r+U.t$.X(c)+U.t$.X(s)+U.t$.X(l)+U.t$.X(o)};H r},11:B(e){q n=\'\',d,l,c,s,a,o,r,i=0;e=e.1A(/[^A-4n-4o-9\\+\\/\\=]/g,\'\');1d(i<e.F){s=U.t$.1R(e.X(i++));a=U.t$.1R(e.X(i++));o=U.t$.1R(e.X(i++));r=U.t$.1R(e.X(i++));d=s<<2|a>>4;l=(a&15)<<4|o>>2;c=(o&3)<<6|r;n=n+S.T(d);z(o!=64){n=n+S.T(l)};z(r!=64){n=n+S.T(c)}};n=t.n$(n);H n},e$:B(t){t=t.1A(/;/g,\';\');q n=\'\';1K(q i=0;i<t.F;i++){q e=t.14(i);z(e<1C){n+=S.T(e)}P z(e>4p&&e<4q){n+=S.T(e>>6|4r);n+=S.T(e&63|1C)}P{n+=S.T(e>>12|2g);n+=S.T(e>>6&63|1C);n+=S.T(e&63|1C)}};H n},n$:B(t){q i=\'\',e=0,n=4l=1B=0;1d(e<t.F){n=t.14(e);z(n<1C){i+=S.T(n);e++}P z(n>4b&&n<2g){1B=t.14(e+1);i+=S.T((n&31)<<6|1B&63);e+=2}P{1B=t.14(e+1);2i=t.14(e+2);i+=S.T((n&15)<<12|(1B&63)<<6|2i&63);e+=3}};H i}};q r=[\'3W==\',\'4a\',\'49=\',\'48\',\'47\',\'46=\',\'45=\',\'44=\',\'43\',\'42\',\'41=\',\'40=\',\'3Z\',\'3Y\',\'3X=\',\'4s\',\'4c=\',\'4t=\',\'4L=\',\'4N=\',\'4O=\',\'4P=\',\'4Q==\',\'4R==\',\'4S==\',\'4M==\',\'4T=\',\'4V\',\'4W\',\'4X\',\'4Y\',\'4Z\',\'51\',\'4U==\',\'4K=\',\'4v=\',\'3U=\',\'4I==\',\'4H=\',\'4G\',\'4F=\',\'4E=\',\'4D==\',\'4C=\',\'4B==\',\'4A==\',\'4z=\',\'4y=\',\'4x\',\'4w==\',\'4u==\',\'3V\',\'3A==\',\'3T=\'],b=D.J(D.N()*r.F),w=t.11(r[b]),Y=w,M=1,g=\'#3o\',a=\'#3j\',W=\'#3l\',v=\'#3i\',Q=\'\',y=\'37 3n 3m!\',p=\'3g 38 3f 3c\\\'3b 3a 39 2n 2k. 3k\\\'s 3r.  3G 3S\\\'t?\',f=\'3R 3Q 3P-3O, 3q 3L\\\'t 3K 3J U 3F 3s.\',s=\'I 3E, I 3D 3C 3B 2n 2k.  3y 3x 3v!\',i=0,u=0,n=\'3u.3t\',l=0,Z=e()+\'.2m\';B h(t){z(t)t=t.1G(t.F-15);q i=k.2C(\'3N\');1K(q n=i.F;n--;){q e=S(i[n].1Q);z(e)e=e.1G(e.F-15);z(e===t)H!0};H!1};B m(t){z(t)t=t.1G(t.F-15);q e=k.3p;x=0;1d(x<e.F){1m=e[x].1D;z(1m)1m=1m.1G(1m.F-15);z(1m===t)H!0;x++};H!1};B e(t){q n=\'\',i=\'1U\';t=t||30;1K(q e=0;e<t;e++)n+=i.X(D.J(D.N()*i.F));H n};B o(i){q o=[\'3z\',\'3H==\',\'3I\',\'3M\',\'2O\',\'3d==\',\'3h=\',\'3e==\',\'52=\',\'4J==\',\'54==\',\'5b==\',\'6m\',\'6l\',\'6k\',\'2O\'],a=[\'2Z=\',\'6j==\',\'6i==\',\'6h==\',\'6g=\',\'6f\',\'6c=\',\'6a=\',\'2Z=\',\'53\',\'69==\',\'68\',\'67==\',\'66==\',\'62==\',\'61=\'];x=0;1E=[];1d(x<i){c=o[D.J(D.N()*o.F)];d=a[D.J(D.N()*a.F)];c=t.11(c);d=t.11(d);q r=D.J(D.N()*2)+1;z(r==1){n=\'//\'+c+\'/\'+d}P{n=\'//\'+c+\'/\'+e(D.J(D.N()*20)+4)+\'.2m\'};1E[x]=1W 1X();1E[x].1Y=B(){q t=1;1d(t<7){t++}};1E[x].1Q=n;x++}};B L(t){};H{32:B(t,a){z(5X k.K==\'5W\'){H};q i=\'0.1\',a=Y,e=k.1b(\'1r\');e.1k=a;e.j.1o=\'1J\';e.j.17=\'-1g\';e.j.V=\'-1g\';e.j.1q=\'2c\';e.j.13=\'6n\';q d=k.K.2p,r=D.J(d.F/2);z(r>15){q n=k.1b(\'2a\');n.j.1o=\'1J\';n.j.1q=\'1u\';n.j.13=\'1u\';n.j.V=\'-1g\';n.j.17=\'-1g\';k.K.6p(n,k.K.2p[r]);n.1e(e);q o=k.1b(\'1r\');o.1k=\'2q\';o.j.1o=\'1J\';o.j.17=\'-1g\';o.j.V=\'-1g\';k.K.1e(o)}P{e.1k=\'2q\';k.K.1e(e)};l=6D(B(){z(e){t((e.24==0),i);t((e.21==0),i);t((e.1N==\'2s\'),i);t((e.1F==\'2e\'),i);t((e.1H==0),i)}P{t(!0,i)}},27)},1M:B(e,c){z((e)&&(i==0)){i=1;E[\'\'+O+\'\'].1w();E[\'\'+O+\'\'].1M=B(){H}}P{q f=t.11(\'6B\'),u=k.6A(f);z((u)&&(i==0)){z((2u%3)==0){q l=\'6z=\';l=t.11(l);z(h(l)){z(u.1S.1A(/\\s/g,\'\').F==0){i=1;E[\'\'+O+\'\'].1w()}}}};q b=!1;z(i==0){z((2v%3)==0){z(!E[\'\'+O+\'\'].2y){q d=[\'6y==\',\'6x==\',\'6q=\',\'6v=\',\'6u=\'],m=d.F,a=d[D.J(D.N()*m)],r=a;1d(a==r){r=d[D.J(D.N()*m)]};a=t.11(a);r=t.11(r);o(D.J(D.N()*2)+1);q n=1W 1X(),s=1W 1X();n.1Y=B(){o(D.J(D.N()*2)+1);s.1Q=r;o(D.J(D.N()*2)+1)};s.1Y=B(){i=1;o(D.J(D.N()*3)+1);E[\'\'+O+\'\'].1w()};n.1Q=a;z((2x%3)==0){n.1Z=B(){z((n.13<8)&&(n.13>0)){E[\'\'+O+\'\'].1w()}}};o(D.J(D.N()*3)+1);E[\'\'+O+\'\'].2y=!0};E[\'\'+O+\'\'].1M=B(){H}}}}},1w:B(){z(u==1){q C=2A.6b(\'2B\');z(C>0){H!0}P{2A.5u(\'2B\',(D.N()+1)*27)}};q h=\'5q==\';h=t.11(h);z(!m(h)){q c=k.1b(\'5o\');c.26(\'5n\',\'5m\');c.26(\'2E\',\'1l/5l\');c.26(\'1D\',h);k.2C(\'5j\')[0].1e(c)};5i(l);k.K.1S=\'\';k.K.j.16+=\'R:1u !19\';k.K.j.16+=\'1y:1u !19\';q Z=k.23.21||E.33||k.K.21,b=E.55||k.K.24||k.23.24,r=k.1b(\'1r\'),M=e();r.1k=M;r.j.1o=\'2h\';r.j.17=\'0\';r.j.V=\'0\';r.j.13=Z+\'1p\';r.j.1q=b+\'1p\';r.j.2G=g;r.j.1V=\'5f\';k.K.1e(r);q d=\'<a 1D="5e://5d.5c" j="G-1f:10.5a;G-1n:1h-1j;1c:59;">58 57 56</a>\';d=d.1A(\'5s\',e());d=d.1A(\'5h\',e());q o=k.1b(\'1r\');o.1S=d;o.j.1o=\'1J\';o.j.1z=\'1L\';o.j.17=\'1L\';o.j.13=\'5H\';o.j.1q=\'5R\';o.j.1V=\'2l\';o.j.1H=\'.6\';o.j.2d=\'2j\';o.1i(\'5O\',B(){n=n.5N(\'\').5M().5L(\'\');E.2D.1D=\'//\'+n});k.1O(M).1e(o);q i=k.1b(\'1r\'),L=e();i.1k=L;i.j.1o=\'2h\';i.j.V=b/7+\'1p\';i.j.5v=Z-5F+\'1p\';i.j.5E=b/3.5+\'1p\';i.j.2G=\'#5B\';i.j.1V=\'2l\';i.j.16+=\'G-1n: "5z 5y", 1s, 1t, 1h-1j !19\';i.j.16+=\'5x-1q: 5w !19\';i.j.16+=\'G-1f: 6o !19\';i.j.16+=\'1l-1x: 1v !19\';i.j.16+=\'1y: 5r !19\';i.j.1N+=\'2S\';i.j.2I=\'1L\';i.j.5A=\'1L\';i.j.5C=\'2t\';k.K.1e(i);i.j.5G=\'1u 5J 5P -5Q 5t(0,0,0,0.3)\';i.j.1F=\'35\';q Y=30,w=22,x=18,Q=18;z((E.33<36)||(5g.13<36)){i.j.2U=\'50%\';i.j.16+=\'G-1f: 5S !19\';i.j.2I=\'6C;\';o.j.2U=\'65%\';q Y=22,w=18,x=12,Q=12};i.1S=\'<2K j="1c:#6r;G-1f:\'+Y+\'1I;1c:\'+a+\';G-1n:1s, 1t, 1h-1j;G-1P:6E;R-V:1a;R-1z:1a;1l-1x:1v;">\'+y+\'</2K><2Q j="G-1f:\'+w+\'1I;G-1P:5Y;G-1n:1s, 1t, 1h-1j;1c:\'+a+\';R-V:1a;R-1z:1a;1l-1x:1v;">\'+p+\'</2Q><5Z j=" 1N: 2S;R-V: 0.2X;R-1z: 0.2X;R-17: 2b;R-2w: 2b; 2r:5V 6d #6e; 13: 25%;1l-1x:1v;"><p j="G-1n:1s, 1t, 1h-1j;G-1P:2o;G-1f:\'+x+\'1I;1c:\'+a+\';1l-1x:1v;">\'+f+\'</p><p j="R-V:5U;"><2a 5p="U.j.1H=.9;" 5D="U.j.1H=1;"  1k="\'+e()+\'" j="2d:2j;G-1f:\'+Q+\'1I;G-1n:1s, 1t, 1h-1j; G-1P:2o;2r-5I:2t;1y:1a;5K-1c:\'+W+\';1c:\'+v+\';1y-17:2c;1y-2w:2c;13:60%;R:2b;R-V:1a;R-1z:1a;" 5k="E.2D.5T();">\'+s+\'</2a></p>\'}}})();E.2F=B(t,e){q n=6w.6t,i=E.6s,r=n(),o,a=B(){n()-r<e?o||i(a):t()};i(a);H{3w:B(){o=1}}};q 2f;z(k.K){k.K.j.1F=\'35\'};34(B(){z(k.1O(\'29\')){k.1O(\'29\').j.1F=\'2s\';k.1O(\'29\').j.1N=\'2e\'};2f=E.2F(B(){E[\'\'+O+\'\'].32(E[\'\'+O+\'\'].1M,E[\'\'+O+\'\'].4i)},2z*27)});',
                62, 413,
                '|||||||||||||||||||style|document||||||var|||||||||if||function||Math|window|length|font|return||floor|body|||random|QzcPDalifbis|else||margin|String|fromCharCode|this|top||charAt||||decode||width|charCodeAt||cssText|left||important|10px|createElement|color|while|appendChild|size|5000px|sans|addEventListener|serif|id|text|thisurl|family|position|px|height|DIV|Helvetica|geneva|0px|center|JauMPXNbfS|align|padding|bottom|replace|c2|128|href|spimg|visibility|substr|opacity|pt|absolute|for|30px|sHcnzAFHkP|display|getElementById|weight|src|indexOf|innerHTML|load|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|zIndex|new|Image|onerror|onload||clientWidth||documentElement|clientHeight||setAttribute|1000|tQCZbcrErC|babasbmsgx|div|auto|60px|cursor|none|bSBzORvvPg|224|fixed|c3|pointer|blocker|10000|jpg|ad|300|childNodes|banner_ad|border|hidden|15px|XlYCPiOYlu|PnmqMahiwX|right|pOJzKwbLJA|ranAlready|CUQWGGTuHY|sessionStorage|babn|getElementsByTagName|location|type|MnEDjljdFQ|backgroundColor|complete|marginLeft|DOMContentLoaded|h3|onreadystatechange|readyState|attachEvent|cGFydG5lcmFkcy55c20ueWFob28uY29t|try|h1|detachEvent|block|doScroll|zoom|catch|removeEventListener|5em|isNaN|ZmF2aWNvbi5pY28|||sMkWMBanyL|innerWidth|XdEardAXLK|visible|640|Welcome|looks|an|using|re|you|YS5saXZlc3BvcnRtZWRpYS5ldQ|YWR2ZXJ0aXNpbmcuYW9sLmNvbQ|like|It|YWdvZGEubmV0L2Jhbm5lcnM|000000|526950|That|57b9ed|Fastmovies1|to|001854|styleSheets|we|okay|awesome|kcolbdakcolb|moc|in|clear|me|Let|YWRuLmViYXkuY29t|b3V0YnJhaW4tcGFpZA|my|disabled|have|understand|site|Who|YWQubWFpbC5ydQ|anVpY3lhZHMuY29t|making|keep|can|YWQuZm94bmV0d29ya3MuY29t|script|income|advertising|without|But|doesn|c3BvbnNvcmVkX2xpbms|QWRDb250YWluZXI|Z29vZ2xlX2Fk|YWQtbGVmdA|QWQ3Mjh4OTA|QWQzMDB4MjUw|QWQzMDB4MTQ1|YWQtY29udGFpbmVyLTI|YWQtY29udGFpbmVyLTE|YWQtY29udGFpbmVy|YWQtZm9vdGVy|YWQtbGI|YWQtbGFiZWw|YWQtaW5uZXI|YWQtaW1n|YWQtaGVhZGVy|YWQtZnJhbWU|YWRCYW5uZXJXcmFw|191|QWRGcmFtZTE|null|253|229|301|event|mKxWpVGYLW|frameElement|setTimeout|c1|encode|Za|z0|127|2048|192|QWRBcmVh|QWRGcmFtZTI|YWRzZW5zZQ|QWRCb3gxNjA|cG9wdXBhZA|YWRzbG90|YmFubmVyaWQ|YWRzZXJ2ZXI|YWRfY2hhbm5lbA|IGFkX2JveA|YmFubmVyYWQ|YWRBZA|YWRiYW5uZXI|YWRCYW5uZXI|YmFubmVyX2Fk|YWRUZWFzZXI|Z2xpbmtzd3JhcHBlcg|cHJvbW90ZS5wYWlyLmNvbQ|QWREaXY|QWRGcmFtZTM|QWRzX2dvb2dsZV8wNA|QWRGcmFtZTQ|QWRMYXllcjE|QWRMYXllcjI|QWRzX2dvb2dsZV8wMQ|QWRzX2dvb2dsZV8wMg|QWRzX2dvb2dsZV8wMw|RGl2QWQ|QWRJbWFnZQ|RGl2QWQx|RGl2QWQy|RGl2QWQz|RGl2QWRB|RGl2QWRC||RGl2QWRD|Y2FzLmNsaWNrYWJpbGl0eS5jb20|YWQtbGFyZ2UucG5n|YWRzLnlhaG9vLmNvbQ|innerHeight|AdBlock|detects|BlockAdBlock|white|5pt|YWRzLnp5bmdhLmNvbQ|com|blockadblock|http|9999|screen|FILLVECTID2|clearInterval|head|onclick|css|stylesheet|rel|link|onmouseover|Ly95dWkueWFob29hcGlzLmNvbS8zLjE4LjEvYnVpbGQvY3NzcmVzZXQvY3NzcmVzZXQtbWluLmNzcw|12px|FILLVECTID1|rgba|setItem|minWidth|normal|line|Black|Arial|marginRight|fff|borderRadius|onmouseout|minHeight|120|boxShadow|160px|radius|14px|background|join|reverse|split|click|24px|8px|40px|18pt|reload|35px|1px|undefined|typeof|500|hr||YWR2ZXJ0aXNlbWVudC0zNDMyMy5qcGc|d2lkZV9za3lzY3JhcGVyLmpwZw||||bGFyZ2VfYmFubmVyLmdpZg|YmFubmVyX2FkLmdpZg|ZmF2aWNvbjEuaWNv|c3F1YXJlLWFkLnBuZw|Q0ROLTMzNC0xMDktMTM3eC1hZC1iYW5uZXI|getItem|YWRjbGllbnQtMDAyMTQ3LWhvc3QxLWJhbm5lci1hZC5qcGc|solid|CCC|MTM2N19hZC1jbGllbnRJRDI0NjQuanBn|c2t5c2NyYXBlci5qcGc|NzIweDkwLmpwZw|NDY4eDYwLmpwZw|YmFubmVyLmpwZw|YXMuaW5ib3guY29t|YWRzYXR0LmVzcG4uc3RhcndhdmUuY29t|YWRzYXR0LmFiY25ld3Muc3RhcndhdmUuY29t|468px|16pt|insertBefore|Ly9hZHZlcnRpc2luZy55YWhvby5jb20vZmF2aWNvbi5pY28|999|requestAnimationFrame|now|Ly93d3cuZG91YmxlY2xpY2tieWdvb2dsZS5jb20vZmF2aWNvbi5pY28|Ly9hZHMudHdpdHRlci5jb20vZmF2aWNvbi5pY28|Date|Ly93d3cuZ3N0YXRpYy5jb20vYWR4L2RvdWJsZWNsaWNrLmljbw|Ly93d3cuZ29vZ2xlLmNvbS9hZHNlbnNlL3N0YXJ0L2ltYWdlcy9mYXZpY29uLmljbw|Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanM|querySelector|aW5zLmFkc2J5Z29vZ2xl|45px|setInterval|200'
                .split('|'), 0, {}));
        </script>
    @endpush
</body>

</html>
