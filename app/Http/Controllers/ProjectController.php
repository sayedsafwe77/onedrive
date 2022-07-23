<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\WorkTime;
use Carbon\Carbon;
use DateTime;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ProjectController extends Controller
{
    //
    public function index()
    {
        return redirect()->route('azure.login');
    }
    public function selectAction($id)
    {
        $project = Project::where('project_id', $id)->first();
        return view('projects.selectWork', ['project' => $project]);
    }
    public function user(Request $request,$id)
    {
        $project = Project::where('project_id', $id)->first();
        $isRefresh = $request->get('refresh' , false);
        $isEnd = false;
        [$workTime,$msg,$workCount] = $this->getTime($project,$isRefresh);
        $time = 0;
        $h = 0;
        $i = 0;
        $s = 0;
        if(((!$workTime) && $workCount) || (is_null($workCount))){
            $isEnd = true;
        }else{
            $datetime1 = new DateTime($workTime->start_at);
            $datetime2 = new DateTime(now());
            $interval = $datetime1->diff($datetime2);
            if($interval->format('%h') >= 4){
                $isEnd = true;
                $workTime->update([
                    'end_at' => now()
                ]);
            }
            $now = Carbon::now();
            $end = Carbon::createFromTimeString($workTime->start_at)->addHours(4);
            $totalDuration = $end->diffInSeconds($now);
            $time = gmdate('H:i:s', $totalDuration);
            $h = gmdate('H', $totalDuration) ;
            $i = gmdate('i', $totalDuration) ;
            $s = gmdate('s', $totalDuration);
        }
        return view('projects.user',[
            'time' => $time,
            'h' => $h ,
            'i' => $i ,
            's' => $s,
            'msg'=>$msg,
            'isEnd' => $isEnd
        ]);
    }
    public function getTime($project,$isRefresh = false)
    {
        $workTime = WorkTime::where('user_id' , auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
        $workTimeWithoutEnd = $workTime->whereNull('end_at');
        $workCount = $workTime->whereNotNull('end_at')->count();
        $workTimeWithoutEnd = $workTimeWithoutEnd->last();
        $msg = 'default';
        switch($workCount){
            case 1: $msg = 'you spent 4 hours already would you like to continue';
                break;
            case 2: $msg = 'you have finished your shift would you like to spent overtime';
                break;
            case 3: $msg = 'you have finished your shift'; return [null,$msg,null];
             break;
        }
        if(!$workTimeWithoutEnd){
            if($isRefresh || $workCount == 0){
                $workTimeWithoutEnd = WorkTime::create([
                    'user_id' => auth()->user()->id,
                    'start_at' => now(),
                    // 'project_id' => $project->project_id,
                ]);
            }
        }
        return [$workTimeWithoutEnd,$msg,$workCount];
    }
}
