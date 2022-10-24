<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing streaming</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <?php

        // PHP code to get the MAC address of Server
        $MAC = exec('getmac');

        // Storing 'getmac' value in $MAC
        $MAC = strtok($MAC, ' ');

        // Updating $MAC value using strtok function,
        // strtok is used to split the string into tokens
        // split character of strtok is defined as a space
        // because getmac returns transport name after
        // MAC address
        echo "MAC address of Server is: $MAC";
        ?>


    </body>

    </html>
    <div id="players" class="webtor" />
    <script>
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '5d8f88f3dfmsh8f8745701f427c2p166500jsnb0867550681d',
                'X-RapidAPI-Host': 'webtor.p.rapidapi.com'
            }
        };

        fetch('https://webtor.p.rapidapi.com/resource/08ada5a7a6183aae1e09d831df6748d566095a10/export/ca2453df3e7691c28934eebed5a253ee0aabd29f', options)
            .then(response => response.json())
            .then(response => console.log(response))
            .catch(err => console.error(err));
    </script>
    <script>
        window.webtor = window.webtor || [];
        window.webtor.push({
            id: 'player',
            magnet: 'magnet:?xt=urn:btih:1c89dfd2aec9576ff5ed18acdddd6339a2cb4d35&dn=Vesper.2022.1080p.AMZN.WEBRip.DDP5.1.x264-SMURF&tr=http%3A%2F%2Ftracker.trackerfix.com%3A80%2Fannounce&tr=udp%3A%2F%2F9.rarbg.me%3A2950&tr=udp%3A%2F%2F9.rarbg.to%3A2870&tr=udp%3A%2F%2Ftracker.fatkhoala.org%3A13720&tr=udp%3A%2F%2Ftracker.tallpenguin.org%3A15780',
            on: function(e) {
                if (e.name == window.webtor.TORRENT_FETCHED) {
                    console.log('Torrent fetched!', e.data);
                }
                if (e.name == window.webtor.TORRENT_ERROR) {
                    console.log('Torrent error!');
                }
            },
            poster: 'https://via.placeholder.com/150/0000FF/808080',
            subtitles: [{
                srclang: 'en',
                label: 'test',
                src: 'https://raw.githubusercontent.com/andreyvit/subtitle-tools/master/sample.srt',
                default: true,
            }],
            lang: 'en',
            i18n: {
                en: {
                    common: {
                        "prepare to play": "Preparing Video Stream... Please Wait...",
                    },
                    stat: {
                        "seeding": "Seeding",
                        "waiting": "Client initialization",
                        "waiting for peers": "Waiting for peers",
                        "from": "from",
                    },
                },
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@webtor/embed-sdk-js/dist/index.min.js" charset="utf-8" async></script>
</body>

</html>