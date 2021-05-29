<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use DB;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->get('username');
        //$password = $request->get('password');
        $password = hash('sha256', $request->get('password')."jatupron"); 
        
        $users = Users::login($username,$password);
        if($users){
            $user = (array)$users;
            $user['message'] = 'success';
            $user['status'] = 'true';    
            $user['token'] = sha1($username . $password . "@%#XYaU12$");        
        }else{
            $user = array(
                'message' => 'this user is not found', 
                'status' => 'false');
        }

        return response()->json($user);
    }

    public function create(Request $request)
    {
        //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
        $this->validate($request, ['file' => 'image']);

        //upload file
        $image = "de_user.png";        
        $file = $request->file('file');
        if(isset($file)){
            $file->move('assets/uploadfile/user',$file->getClientOriginalName());
            $image = $file->getClientOriginalName();
        }        
        
        //add user data into users table
        $user = new Users();
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');        
        $user->Phone = $request->get('Phone');
       // $user->gender = $request->get('gender');        
        $user->username = $request->get('username');
       // $user->password = $request->get('password');   
        $user->password = hash('sha256', $request->get('password')."jatupron");     
        $user->image = $image;   
        $user->email = $request->get('email');
        $user->userTypeID = 1;           
        //$user->lineID = $request->get('lineID');
        $user->isActive = 0;
        $user->save();                
        return response()->json(array(
            'message' => 'add a user successfully', 
            'status' => 'true'));  
    }
        
    public function view($id)
    {
        $sql="SELECT * FROM users WHERE userID = $id";
        $user=DB::select($sql)[0];         
        return response()->json($user);
    }
    
    public function update(Request $request, $id)
    {       
        //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
        $this->validate($request, ['file' => 'image']);

        $user = Users::find($id);
        $user->firstName = $request->get('firstName');//ซ้ายชื่อbase ขวาค่าที่ส่งไปโพสแมน
        $user->lastName = $request->get('lastName');        
        $user->phone = $request->get('phone');    
        $user->username = $request->get('username');
       // $user->password = hash('sha256', $request->get('password')."jatupron");  
        $user->email = $request->get('email');
        $user->address = $request->get('address');

        $user->userTypeID = 1;        

        $file = $request->file('file');
        if(isset($file)){
            $file->move('assets/uploadfile/user',$file->getClientOriginalName());
            $user->image = $file->getClientOriginalName();
        }        

        $user->save();

        return response()->json(array(
            'message' => 'update a user successfully', 
            'status' => 'true'));
    }
    public function updateadd(Request $request, $id)
    {       
        //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
     
        $user = Users::find($id);

        $user->phone = $request->get('phone');
        $user->address = $request->get('address');       
        $user->save();

        return response()->json(array(
            'message' => 'update a user successfully', 
            'status' => 'true'));
    }

    public function delete($id)
    {
        //hard delete
        //$user = User::find($id);
        //$user->delete();

        //soft delete
        $user = User::find($id);
        $user->isActive = 0;    
        $user->save();      
   
        return response()->json(array(
            'message' => 'delete a user successfully', 
            'status' => 'true'));
    }         

        public function Hashpassword($id)
        {
            $pass= hash('sha256', $id);
    
            return response()->json(array(
                'message' => $pass, 
                'status' => 'true'));
        }  
        public function updatePass(Request $request, $id)
        {       
 
            $user = Users::find($id);
            $user->password = hash('sha256', $request->get('password')."jatupron");       
            $user->save();
    
            return response()->json(array(
                'message' => 'updatePass a user successfully', 
                'status' => 'true'));
        }
}