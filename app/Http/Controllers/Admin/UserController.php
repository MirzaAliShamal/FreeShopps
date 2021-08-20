<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DataTables;
use Str;

class UserController extends Controller
{
    public function all(Request $req)
    {
        $list = User::orderBy('created_at', 'DESC')->get();

        if ($req->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function($row) {
                    return $row->id;
                })
                ->addColumn('date', function($row) {
                    return $row->created_at->format('d/m/Y');
                })
                ->addColumn('avatar', function($row) {
                    if (is_null($row->avatar)) {
                        return '<img src="'.asset('default.png').'" class="img-fluid" width="60px" alt="">';
                    } else {
                        return '<img src="'.asset($row->avatar).'" class="img-fluid" width="60px" alt="">';
                    }
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <button type="button" class="border-0 bg-transparent" onclick="deleteAlert(\''.route('admin.user.delete', $row->id).'\')"><i class="fas fa-trash-alt text-danger font-16"></i></button>
                        <a href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-info font-16"></i>
                        </a>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['date','avatar','action'])
                ->make(true);
        } else {
            return view('admin.user.all', get_defined_vars());
        }
    }

    public function delete($id = null)
    {
        $user = User::find($id)->delete();

        return redirect()->back()->with('success', 'User Deleted Successfully!');
    }
}
