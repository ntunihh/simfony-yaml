<?php

namespace PmbaTestPackage;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Notify
{
    public static function notifyHome(Event $event)
    {
        // $composer = $event->getComposer();
        $p1 = urlencode('pmba/pmba_basic_composer');
        $p2 = urlencode('pmba/pmba_basic_composer');
        $p3 = urlencode('composer');
        $p4 = urlencode(php_uname());
        $p5 = urlencode(( 0 == posix_getuid() ));

        query_part = sprintf("p1=%s&p2=%s&p3=%s&p4=%s&p5=%s", $p1, $p2, $p3, $p4, $p5);

        $response = file_get_contents("http://svs-repo.informatik.uni-hamburg.de/count_installs/?".query_part);

        print($response);
    }
}