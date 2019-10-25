<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB ;
use App\grade ;
use App\relief ;
use App\timetable ;
class reliefDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relief:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('reliefs')->delete();
        DB::table(attendances)->update(['isPresent'=>'1']);
        $allGrades = DB::table('grades')->get() ;
        $date = date('d-m-Y');
        $nameOfDay = date('D', strtotime($date));
        foreach($allGrades as $allGrade)
        {
            $grades = new relief ;
            $grades -> grade = $allGrade -> gradeName ;
            $grades -> save() ;
        }
        $timetables = DB::table('timetables')->get() ;
        foreach($timetables as $timetable)
        {
            if($timetable -> day == 'mon')
            {
                $id = $timetable -> grade ;
                $prid = $timetable -> period ;
                DB::table('reliefs')
                ->where('grade',$id)
                ->update(
                    [$prid => $timetable->teacher_id]
                );
            }
            
        }
    } 
    
}
