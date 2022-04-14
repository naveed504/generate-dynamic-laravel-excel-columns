<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as FileModel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Models\FileColumn;
use App\Models\FileData;
use Excel;
use Exception;
use SoftpersHelper;
class ExcelFileController extends Controller
{
    public function importExcelFile(Request $request)
    {
        try {
            $columnNames = (new HeadingRowImport)->toArray($request->excelfile);        

            $filePath =storage_path('app/public/excelfiles/');
            $saveExcelFile =SoftpersHelper::saveFile($request->excelfile,$filePath);  
           
            $saveFile =FileModel::create([
                'name' => $saveExcelFile
            ]);        
            $lastcolumnid = [];        
            foreach($columnNames[0] as $columns){
                foreach($columns as $column){
                    $saveColumn =FileColumn::create([
                        'name' => $column,
                        'file_id' =>$saveFile->id    
                    ]);
                    array_push($lastcolumnid ,$saveColumn->id);
                }           
            }
             
            $excelFileData =Excel::toArray([],$filePath.$saveFile->name);  
               
            foreach($excelFileData as $excelRows){
                unset($excelRows[0]); //skip first row columns name
                foreach($excelRows as $singleRow){                  
                   foreach($singleRow as $key=>$singleRowValue){              
                        FileData::create([
                            'data' => $singleRowValue,
                            'column_id' => $lastcolumnid[$key]
                        ]); 
                    }           
                }                          
            }
            parent::successMessage("Excel File Imported Successfully");
            return redirect()->back();
        } catch(Exception $e) {
            parent::dangerMessage("Something went Wrong File Does Not Imported");
            parent::dangerMessage("Please Check File And Try Again");
            return redirect()->back();
        }
       
       
    }
}
