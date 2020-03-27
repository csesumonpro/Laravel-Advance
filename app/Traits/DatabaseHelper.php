<?php
namespace App\Traits;

use App\DatabaseHandeler;

trait DatabaseHelper {

    public function exportSql()
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

    public function importSql($request=null)
    {

        $file = $request->file('sql');
        $upload_path = public_path('database/');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $db_name = env('DB_DATABASE');

        $name = 'import_'.time().'.sql';
        $file->move($upload_path,$name);

        $full_path = $upload_path.$name;

        exec("mysql -u$username -p$password $db_name < $full_path");

        if (file_exists($full_path)){
            unlink($full_path);
        }
        return redirect()->back();

    }
}
