<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Imports\PostsImport;
 
use Maatwebsite\Excel\Facades\Excel;
 
use App\Models\Post;
 
class ExcelCSVController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
       return view('blog.excel-csv-import');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([
 
           'file' => 'required',
 
        ]);
 
        Excel::import(new PostsImport,$request->file('file'));
 
            
        return redirect('blog')->with('status', 'The file has been excel/csv imported to database in laravel 8');
    }

    
}