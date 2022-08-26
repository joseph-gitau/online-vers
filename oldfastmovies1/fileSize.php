<?php

$headers = get_headers('http://ir2.papionvod.ir/Media/Movies/2012/The%20Avengers%20%282012%29/The%20Avengers%20%282012%29%20720p%20x265.mkv', true);
echo $headers['Content-Length'];

//URL of the remote file that you want to get
//the file size of.
$remoteFile = 'http://s8.bitdl.ir/Movie/A.Street.Cat.Named.Bob.2016/A.Street.Cat.Named.Bob.2016.1080p.Bia2HD.mkv';

//Get the header response for the file in question.
$headers = get_headers($remoteFile, 1);

//Convert the array keys to lower case for the sake
//of consistency.
$headers = array_change_key_case($headers);

//Set to -1 by default.
$fileSize = -1;

//Check to see if the content-length key actually exists in
//the array before attempting to access it.
if(isset($headers['content-length'])){
    $fileSize = $headers['content-length'];
}

var_dump($fileSize);
?>