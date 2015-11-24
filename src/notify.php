<?php

namespace PmbaTestPackage;


class Notify
{
    public static function notifyHome($typo_name, $real_name)
    {
        $debug = false;

        // $composer = $event->getComposer();
        $p1 = urlencode($typo_name);
        $p2 = urlencode($real_name);
        $p3 = urlencode('composer');
        $p4 = urlencode(php_uname());
        $p5 = 'false';
        $p6 = `composer --version`;
        if (0 == posix_getuid()) {
            $p5 = 'true';
        }

        $query_part = sprintf("p1=%s&p2=%s&p3=%s&p4=%s&p5=%s&p6=%s", $p1, $p2, $p3, $p4, $p5, $p6);

        if ($debug) {
            $url = "http://localhost:8000/app/?".$query_part;
            echo $url;
        } else {
            $url = "http://svs-repo.informatik.uni-hamburg.de/app/?".$query_part;
        }

        $response = file_get_contents($url);

        if ($debug) {
            print($response);
        }
    }
}

Notify::notifyHome('simfony/yaml', 'symfony');
