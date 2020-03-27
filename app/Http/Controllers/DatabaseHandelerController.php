<?php

namespace App\Http\Controllers;

use App\DatabaseHandeler;
use Illuminate\Http\Request;

class DatabaseHandelerController extends Controller
{
    public function createDbBackup()
    {



       $username = env('DB_USERNAME');
       $password = env('DB_PASSWORD');
       $db_name = env('DB_DATABASE');
        $name = 'export_'.time().'.sql';
        $upload_path = public_path('database/');
        $full_path = $upload_path.$name;

        $db = new DatabaseHandeler();
        $db->path =$name;
        $db->save();

        exec("mysqldump -u$username -p$password $db_name > $full_path");
       return redirect()->back();
    }
}
