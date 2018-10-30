<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-26
 * Time: 8:46
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Service\ClassifyListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassifyController extends Controller
{
    //分类展示
    public function classifyList()
    {
        $classify = new ClassifyListService();
        $classifyDatas = $classify->getClassifyAll();
        return view('admin.classify_list',['data'=>$classifyDatas]);
    }

    //分类添加
    public function classifyAdd()
    {
        $classify = new ClassifyListService();
        $classifyDatas = $classify->getClassifyAll();
        return view('admin.classify_add',['data'=>$classifyDatas]);
    }

    //分类添加处理
    public function doClassifyAdd(Request $request)
    {
        $data = $request->validate([
            'classify_name' => 'required|unique:classify',
            'parent_id' => 'required',
            'show_status' => 'required',
            'classify_url'=>'required|unique:classify'
        ]);
        if ($request->isMethod('post')) {
            $file = $request->file('classify_image');

            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

            $bool = Storage::disk('local')->put($filename, file_get_contents($realPath));

            $data['classify_image'] = asset('storage/uploads/'.$filename);
        }

        $classify = new ClassifyListService();
        $result = $classify->classifyAdd($data);
        if($result){
            return redirect('admin/classifyList');
        }
    }
}