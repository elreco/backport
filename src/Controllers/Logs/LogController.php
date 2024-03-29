<?php

namespace Elreco\Backport\Controllers\Logs;

use Elreco\Backport\Facades\Backport;
use Elreco\Backport\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogController extends Controller
{
    public function index($file = null, Request $request)
    {
        if ($file === null) {
            $file = (new LogViewer())->getLastModifiedLog();
        }

        return Backport::content(function (Content $content) use ($file, $request) {
            $offset = $request->get('offset');

            $viewer = new LogViewer($file);

            $content->body(view('backport::logs.index', [
                'logs'      => $viewer->fetch($offset),
                'logFiles'  => $viewer->getLogFiles(),
                'fileName'  => $viewer->file,
                'end'       => $viewer->getFilesize(),
                'tailPath'  => route('logs-tail', ['file' => $viewer->file]),
                'prevUrl'   => $viewer->getPrevPageUrl(),
                'nextUrl'   => $viewer->getNextPageUrl(),
                'filePath'  => $viewer->getFilePath(),
                'size'      => static::bytesToHuman($viewer->getFilesize()),
            ]));

            $content->header($viewer->file);
        });
    }

    public function tail($file, Request $request)
    {
        $offset = $request->get('offset');

        $viewer = new LogViewer($file);

        list($pos, $logs) = $viewer->tail($offset);

        return compact('pos', 'logs');
    }

    protected static function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2).' '.$units[$i];
    }
}
