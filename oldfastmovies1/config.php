<?php
include 'dbh.php';
$sql3 = "SELECT * FROM 45finished";
$res3 = mysqli_query($conn, $sql3);
$rowcount3 = mysqli_num_rows($res3);
if ($rowcount3 > 0) {
    while ($row3 = mysqli_fetch_assoc($res3)) {
        $string = $row3['movie_name'];
        $clean = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        $id3 = $row3['a_id'];
        $sql4 = "UPDATE 45finished SET normal_name='$clean' WHERE a_id='$id3'";
        $res4 = mysqli_query($conn, $sql4);
    }
} else {
    echo mysqli_error($conn);
}
$sql = "SELECT * FROM 45finished";
$res = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($res);
if ($rowcount > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $sound = " ";
        $words = explode(" ", $row['normal_name']);
        foreach ($words as $word) {
            $sound .= metaphone($word) . "";
        }

        $id = $row['a_id'];
        $sql2 = "UPDATE 45finished SET indexing='$sound' WHERE a_id='$id'";
        $result = mysqli_query($conn, $sql2);
        if (!$result) {
            echo mysqli_error($conn);
        }
    }
} else {
    echo "no result Found";
}
// nw
$sql5 = "SELECT * FROM series";
$res5 = mysqli_query($conn, $sql5);
$rowcount5 = mysqli_num_rows($res5);
if ($rowcount5 > 0) {
    while ($row5 = mysqli_fetch_assoc($res5)) {
        $string2 = $row5['s_name'];
        $clean2 = preg_replace('/[^A-Za-z0-9\-]/', '', $string2);
        $id5 = $row5['a_id'];
        $sql6 = "UPDATE series SET normal_name='$clean2' WHERE a_id='$id5'";
        $res6 = mysqli_query($conn, $sql6);
    }
} else {
    echo mysqli_error($conn);
}
// nw
$sql2 = "SELECT * FROM series";
$res2 = mysqli_query($conn, $sql2);
$rowcount2 = mysqli_num_rows($res2);
if ($rowcount2 > 0) {
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $sound2 = " ";
        $words2 = explode(" ", $row2['s_name']);
        foreach ($words2 as $word2) {
            $sound2 .= metaphone($word2) . " ";
        }
        $id2 = $row2['a_id'];
        $sql2 = "UPDATE series SET indexing='$sound2' WHERE a_id='$id2'";
        $result2 = mysqli_query($conn, $sql2);
        if (!$result2) {
            echo mysqli_error($conn);
        }
    }
} else {
    echo "no result Found!";
}
