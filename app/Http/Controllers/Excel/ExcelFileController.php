<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as FileModel;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\HeadingColumnImport;
use App\Models\FileColumn;
use App\Models\FileData;
use Excel;

class ExcelFileController extends Controller
{
    public function importExcelFile(Request $request)
    {
        $columnheadings = (new HeadingRowImport)->toArray($request->excelfile);

        $filePath =public_path('admin/excel/');
        $fileName = time().'.'.$request->excelfile->clientExtension();
        $request->excelfile->move($filePath, $fileName); 
        $saveFile =FileModel::create([
            'name' => $fileName
        ]);

             $lastcolumnid = [];
        foreach($columnheadings[0] as $heading){
            foreach($heading as $name){
                $saveColumns =FileColumn::create([
                    'name' => $name,
                    'file_id' =>$saveFile->id    
                ]);
                array_push($lastcolumnid ,$saveColumns->id);
            }           
        }
        ////above working fine
        $fileData =Excel::toArray([],$filePath.$saveFile->name);
       

        foreach($fileData as $key=>$fdata){
               unset($fdata[0]);
             
               $first_elements = array_map(function($i) use($key) {
                return $i[$key];
            }, $fdata); 
            dump($first_elements);
            
        }
       
    }
}
