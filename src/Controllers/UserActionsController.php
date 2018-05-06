<?php
namespace Laraveldaily\Quickadmin\Controllers;

use App\Http\Controllers\Controller;
use Laraveldaily\Quickadmin\Models\UsersLogs;
use Yajra\Datatables\Datatables;

/**
 * Class UserActionsController
 *
 * @package Laraveldaily\Quickadmin\Controllers
 */
class UserActionsController extends Controller
{
    /**
     * Show User actions log
     *
     * @return Response
     */
    public function index()
    {
        return view('qa::logs.index');
    }

    /**
     * @return mixed
     */
    public function table()
    {
        return Datatables::of(UsersLogs::with('users')->orderBy('id', 'desc'))->make(true);
    }
}