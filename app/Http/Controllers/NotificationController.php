<?php

namespace App\Http\Controllers;

use App\Helpers\SMSHelper;
use App\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    static public function sendTaskNotification()
    {
        $result = ["success" => false, "message" => ""];
        try {
            $tasks = Procedure::where('start_at', '<', now()) // Tasks that have started
            ->where('end_at', '>', now()) // Tasks that haven't finished
            ->where('notification_sent', 0) // Tasks where notification has not been sent
            ->get();
            if ($tasks) {
                foreach ($tasks as $task) {
                    $currentTime = Carbon::now();
                    $totalDuration = $task->end_at->diffInMinutes($task->start_at);
                    $elapsedTime = $currentTime->diffInMinutes($task->start_at);

                    $progressPercentage = ($elapsedTime / $totalDuration) * 100;
                    if ($progressPercentage > 50) {
                        if ($task->start_at)
                            $employees = $task->users;
                        foreach ($employees as $employee) {
                            SMSHelper::sendSMS([$employee->phone], __("auth.stageOneTask", ["date" => $task->end_at, "name" => $employee->first_name, "task" => $task->title]));
                        }
                        $task->notification_sent = 1;
                        $task->save();
                    }
                    if ($progressPercentage > 70) {
                        // Execute code for more than 70% progress
                        // ...
                    }
                }
            }
            $result["success"] = true;
            $result["message"] = "Executed on " . count($tasks) . " tasks successfully. Interesters: ";
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
            return response()->json($result);
        }
        return response()->json($result);
    }
}
