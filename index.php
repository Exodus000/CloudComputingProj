<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        div#container {
            width: 100%;
            height: 100%;
        }

        div#header {
            background-color: #99bbbb;
            text-align: center;
        }

        div#find {
            height: auto;
            width: 100%;
            display: inline-block;
            text-align: center;
        }

        div#content {
            height: 70%;
            width: 100%;
            display: inline-block;
            text-align: center;
        }

        i#dl {
            color: #6078ff;
        }

        a#link {
            color: white;
            text-decoration: none;
        }

        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-bottom: 0;
        }

        h2 {
            margin-bottom: 0;
            font-size: 14px;
        }

        ul {
            margin: 0;
        }

        li {
            list-style: none;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

</head>

<body>

<div id="container">

    <div id="header">
        <h1>MUSIC PLAYER</h1>
    </div>

    <div id="find">

        <ul>


            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <title>Music</title>
            </head>
            <body>

            </body>


        </ul>

        <audio id="audio1" style="width:60%" controls>Canvas not supported</audio>
    </div>


    <section>

        <link rel="stylesheet" type="text/css" href="table.css">

        <!--for demo wrap-->

        <div class="tbl-header" id="content">
            <table align="center">


                <tr align="center">

                    <th><img src="/icons/blank.gif" alt="[ICO]"></th>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

            </table>
        </div>


        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tbody align="center">

                <?php

                require_once('getID3/getid3/getid3.php');

                // Initialize getID3 engine
                $getID3 = new getID3;

                $DirectoryToScan = 'music'; // change to whatever directory you want to scan
                $dir = opendir($DirectoryToScan);

                while (($file = readdir($dir)) !== false) {
                    $FullFileName = realpath($DirectoryToScan . '/' . $file);
                    if ((substr($file, 0, 1) != '.') && is_file($FullFileName)) {
                        set_time_limit(30);

                        $ThisFileInfo = $getID3->analyze($FullFileName);

                        getid3_lib::CopyTagsToComments($ThisFileInfo);

                        // output desired information in whatever format you want
                        echo '<tr>';
                        echo '<td><i class="fa fa-music fa-lg" aria-hidden="false"></i></td>';
                        echo '<td align="left">' . $file . '</td>';
                        echo '<td align="left">' . htmlentities(!empty($ThisFileInfo['playtime_string']) ? $ThisFileInfo['playtime_string'] : chr(160)) . '</td>';
                        echo '<td>' . htmlentities(!empty($ThisFileInfo['comments_html']['artist']) ? implode('<br>', $ThisFileInfo['comments_html']['artist']) : chr(160)) . '</td>';
                        //echo '<td>'              .htmlentities(!empty($ThisFileInfo['comments_html']['title'])  ? implode('<br>', $ThisFileInfo['comments_html']['title'])          : chr(160)).'</td>';
                        //echo '<td align="right">'.htmlentities(!empty($ThisFileInfo['audio']['bitrate'])        ?           round($ThisFileInfo['audio']['bitrate'] / 1000).' kbps' : chr(160)).'</td>';
                        echo '<td>' . htmlentities(!empty($ThisFileInfo['comments_html']['album']) ? implode('<br>', $ThisFileInfo['comments_html']['album']) : chr(160)) . '</td>';
                        echo '<td> <button class="btn"  id=\'' . $file . '\'    onclick="playAudio(\'audio1\' , this.id);">  <i class=\'fa fa-play fa-lg\' aria-hidden=\'true\'></i>  </button>';
                        echo '<a class="link" href= "music/' . $file . '" download=\'' . $file . ' \'>';
                        echo '<i id="dl" class="fa fa-download fa-lg" aria-hidden="true"></i> </a></td>';
                        echo '<td>&nbsp;</td>';
                        echo '</tr>';
                    }
                }
                ?>


            </table>


            <script type="text/javascript">
                function playAudio(audioElm, clicked_id) {
                    var audioElm = document.getElementById('audio1');
                    audioElm.src = "music/" + document.getElementById(clicked_id).id;
                    audioElm.play();
                }
                // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
                $(window).on("load resize ", function () {
                    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
                    $('.tbl-header').css({
                        'padding-right': scrollWidth
                    });
                }).resize();
            </script>


        </div>
    </section>
</body>
</html>
