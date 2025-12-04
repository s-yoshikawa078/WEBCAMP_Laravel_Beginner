<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedTask as CompletedTaskModel;

class CompletedTaskController extends Controller
{
    /**
     * 完了タスクの一覧を表示する
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $user_id = \Auth::id();

        $list = CompletedTaskModel::where('user_id', $user_id)
                                  ->orderBy('id', 'desc')
                                  ->paginate(10);

        return view('task.completed_list', [
            'list' => $list,
        ]);
    }
}