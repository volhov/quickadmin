<?php

namespace Laraveldaily\Quickadmin\Controllers;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use Illuminate\Http\Request;

/**
 * Class QuickadminCacheController
 *
 * @package Laraveldaily\Quickadmin\Controllers
 */
class QuickadminSystemController extends Controller
{
    /**
     * System cache management.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $systemCommandConfig = config('quickadmin.systemcommnad');

        view()->share('systemCommandConfig', $systemCommandConfig);

        return view('admin.system');
    }

    /**
     * CLear all caches defined in configuration.
     *
     * @param string $command Command
     *
     * @return \Illuminate\View\View
     */
    public function execute($command)
    {
        $systemCommandConfig = config('quickadmin.systemcommnad');
        if ($command == 'all') {
            $cacheCommandConfig = config('quickadmin.cache');
            foreach ($cacheCommandConfig as $command) {
                \Artisan::call($command);
            }
        } elseif (array_key_exists($command, $systemCommandConfig)) {
            \Artisan::call($command);
        }
        return redirect()->to(url(config('quickadmin.route').'/system'));
    }
}
