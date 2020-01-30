<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    //掲示板ログの取得
    public function index(){
        $text = Board::latest()->paginate(5);
        return view('board', compact('text'));
    }

    //管理者画面での掲示板ログの取得
    public function admin(Request $request){
        if (!$request->session()->exists('logined')) {
            return redirect('/login');
        };
        $text = Board::latest()->paginate(5);
        return view('admin', compact('text'));
    }

    //ログインセッションがあれば管理者画面へ
    public function loginadmin(Request $request){
        if (!$request->session()->exists('logined')) {
            return redirect('/login');
        };
        return redirect('/admin');
        // return $this->admin();
    }

    //投稿の処理
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:10',
            'message' => 'required|max:30',
        ]);
        Board::create($request->all());
        return $this->index();
    }

    //編集画面で選択した情報
    public function show($id, $flag)
    {
        $colum = Board::find($id);
        return view('edit', compact('colum', 'flag'));
    }

    //掲示板更新の処理
    public function upd(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:10',
            'message' => 'required|max:30',
        ]);
        
        // $colum = Board::find($id);
        // $colum->name = $request->name;
        // $colum->message = $request->message;
        // $colum->save();

        Board::where('id', $id)
            ->update([
                'name' => $request->name,
                'message' => $request->message
            ]);
        return $this->admin();
    }

    //掲示板削除の処理
    public function destroy($id){
        Board::destroy($id);
        return $this->admin();
    }

    //ログインパスワードが合ってるかの確認
    public function login(Request $request){
        define("PASSWORD", "heika83");
        $pass = $request->input('password');
        if($pass == PASSWORD){
            $request->session()->put('logined', 1);
            return $this->loginadmin($request);
        }else{
            $error = 'パスワードが正しくありません';
            return view('login', compact('error'));
        }
    }

    public function logout(Request $request){
        $request->session()->forget('logined');
        return view('login');
    }


    //CSVダウンロード
    public function export(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=csvexport.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
 
        $callback = function() 
        {
            
            $createCsvFile = fopen('php://output', 'w'); //ファイル作成
            
            $columns = [ //1行目の情報
                'id',
                'name',
                'message',
                'created_at',
                'updated_at'
            ];
 
            mb_convert_variables('SJIS-win', 'UTF-8', $columns); //文字化け対策
    
            fputcsv($createCsvFile, $columns); //1行目の情報を追記
 
            $bookingCurve = DB::table('board');  // データベースのテーブルを指定
 
            $bookingCurveResults = $bookingCurve  //データベースからデータ取得
                ->select(['id', 'name' , 'message', 'created_at', 'updated_at'])
                ->get();
        
            foreach ($bookingCurveResults as $row) {  //データを1行ずつ回す
                $csv = [
                    $row->id,  //オブジェクトなので -> で取得
                    $row->name,
                    $row->message,
                    $row->created_at,
                    $row->updated_at
                ];
 
                mb_convert_variables('SJIS-win', 'UTF-8', $csv); //文字化け対策
 
                fputcsv($createCsvFile, $csv); //ファイルに追記する
            }
            fclose($createCsvFile); //ファイル閉じる
        };
        
        return response()->streamDownload($callback, 'board.csv', $headers); //ここで実行
        
    }
}

?>

