<?php

namespace App\Http\Controllers;

use App\DatabaseHandeler;
use App\Traits\DatabaseHelper;
use Illuminate\Http\Request;

class DatabaseHandelerController extends Controller
{
    use DatabaseHelper;

    public function createDbBackup()
    {
        $this->exportSql();
    }

    public function importSql(Request $request)
    {

        $this->importSql($request);
    }
}
