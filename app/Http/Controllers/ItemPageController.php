<?php

namespace App\Http\Controllers;
use App\classes\functionClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ItemPageController extends Controller
{
    public function addItem(Request $request)
    {
        $validateData = $request->validate([
            'item_type' => 'required',
            'item_name' => 'required',
            'item_code' => 'required',
            'number' => 'required|regex:/^[0-9]+$/',
        ]);
        
        $add = new functionClass();
        $addItem = $add->addNewItem($request->item_name , $request->item_code , $request->number);
        if($addItem)
        {
            session()->flash('success' , $request->item_name.' has been Added To the Database');
            $add->storeLogs($action = 'Add New Item' , $description = "'".$request->item_name."' has been added to the system!!!");
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }

        return redirect()->back();
    }

    public function updateItem(Request $request)
    {
        //print_r($request->all());exit();
        $add = new functionClass();
        $addItem = $add->updateNewItem($request->update_item_id , $request->number);
        if($addItem)
        {
            session()->flash('success' , $request->item_name.' has been Updated To the Database');
            $add->storeLogs($action = 'Update an Item' , $description ="'".$request->item_name."' has been Updated to the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        return redirect()->route('view_item');
    }

    public function deleteItem(Request $request)
    {
        $add = new functionClass();
        $addItem = $add->deleteNewItem($request->delete_item_id);
        if($addItem)
        {
            session()->flash('success' , $request->item_name.' has been Deleted From the Database');
            $add->storeLogs($action = 'Delete an Item' , $description ="'".$request->item_name."' has been Deleted from the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        return redirect()->route('view_item');
    }

    public function sellItemSample(Request $request)
    {
        
        $order_no = $request->order_number;
        $products = $request->orderProducts;
        $add = new functionClass();
        $addItem = $add->addSellItemSample($order_no , $products);
        if($addItem)
        {
            session(['error' => 'success']);
            session(['msg' => 'Message has been sent successfully!!!']);
            $add->storeLogs($action = 'Sell Items' , $description =" Order: '".$request->order_number."' has been Created in the system!!!");
        
        }
        else
        {
            session(['error' => 'error']);
            session(['msg' => 'Something went wrong!! please try again later!!']);
        }

        return redirect()->back();
    }

    public function updateSellItem(Request $request)
    {
        $validateData = $request->validate([
            'number' => 'required|regex:/^[0-9]+$/',
            'sell_type' => ['required',Rule::in(['received', 'packed' , 'packed'])],
        ]);
        $add = new functionClass();
        $id = session('update_sell_item_id');
        $name = session('update_sell_item_name');
        $type = $request->sell_type;
        $note = $request->note;
        $packedBy = $request->packed_by;
        
        $addItem = $add->updateSellNewItem($id , $request->number , $name , $type , $note , $packedBy );
        if($addItem)
        {
            session()->flash('success' , $request->order_number.' has been Updated in the Database');
            $request->session()->forget(['update_sell_item_id', 'update_sell_item_name']);
            $add->storeLogs($action = 'Update Order' , $description =" Order: '".$request->order_number."' has been Updated in the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        return redirect()->route('view_history');
        
    }

    public function deleteSellItem(Request $request)
    {
        
        $id = session('delete_sell_item_id');
        $name = session('delete_sell_item_name');
        
        $add = new functionClass();
        $addItem = $add->deleteSellNewItem($id , $name);
        if($addItem)
        {
            session()->flash('success' , 'Order has been Cancelled in the Database');
            $array = array('err' => 'success' , 'msg' => 'Requested Order has been Deleted from the system!!!!');
            $request->session()->forget(['delete_sell_item_id', 'delete_sell_item_name']);
            $add->storeLogs($action = 'Update Order' , $description =" Order: '".$request->order_number."' has been Cencelled in the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        return redirect()->route('view_history');
        
    }


    public function trackSellItem(Request $request)
    {
        $validateData = $request->validate([
            'item_name' => 'required',
            'customRadio' => 'required',
        ]);
        $add = new functionClass();
        $hValue = $request->customRadio;
        if($hValue == 'customhistory')
        {
            $validateData = $request->validate([
                'fromdate' => 'required|date',
                'todate' => 'required|date',
            ]);

            $toDate = date('Y-m-d' , strtotime($request->todate));
            $fromDate = date('Y-m-d' , strtotime($request->fromdate));
            
            $addItem = $add->trackSellNewItem($request->item_name , $fromDate , $toDate);
        }
        else{
            $addItem = $add->trackSellNewItem($request->item_name , $fromDate="" , $toDate="");
        }

        return view('admin.custom_sell_item')->with('trackHistory' ,$addItem );

    }

    public function updateUserRole(Request $request)
    {
        $id = session('update_user_id');
        $role = $request->role_type;
        $add = new functionClass();
        $updateRole = $add->updateUserRoles($id , $role);
        if($updateRole)
        {
            session()->flash('success' , " User '".$request->user_name."' Role has been changed in the system!!!");
            $request->session()->forget(['update_user_id']);
            $add->storeLogs($action = 'Update USer Role' , $description =" User '".$request->user_name."' Role has been changed in the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        return redirect()->route('view_users');

    }

    public function deleteUser(Request $request)
    {
        $id = session('delete_user_id');
        $add = new functionClass();
        $deleteUser = $add->deleteUsers($id );
        if($deleteUser)
        {
            session()->flash('success' , " User '".$request->user_name."' has been deleted from the system!!!");
            $request->session()->forget(['delete_user_id']);
            $add->storeLogs($action = 'Update USer Role' , $description =" User '".$request->user_name."' has been deleted from the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        return redirect()->route('view_users');
    }
    
    public function editCommentStatus(Request $request)
    {
        $id = session('get_comment_id');
        $getType = session('userType');
        $add = new functionClass();
        $updateComment = $add->updateCommentStatus($id , $request->status_type);
        if($updateComment)
        {
            
            session()->flash('success' , 'Comment\'s Status has been Altered Successfully!!!!');
            $request->session()->forget(['get_comment_id']);
            $add->storeLogs($action = 'Edit Comment Status' , $description ="Comment's status has been changed in the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        if($getType == 'all')
        {
            session()->forget(['userType']);
            return redirect()->route('view_comment');
        }
        elseif($getType == 'user')
        {
            session()->forget(['userType']);
            return redirect()->route('view_user_comment');
        }
        
    }

    public function deleteComment(Request $request)
    {
        $id = session('get_comment_id');
        $getType = session('userType');
        //print_r( $getType);exit();
        $add = new functionClass();
        $deleteComment = $add->deleteUserComment($id);
        if($deleteComment)
        {

            session()->flash('success' , 'Comment has been Deleted Successfully!!!!');
            $request->session()->forget(['get_comment_id']);
            $add->storeLogs($action = 'Update USer Role' , $description =" Comment has been deleted from the system!!!");
        
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        if($getType == 'all')
        {
            session()->forget(['userType']);
            return redirect()->route('view_comment');
        }
        elseif($getType == 'user')
        {
            session()->forget(['userType']);
            return redirect()->route('view_user_comment');
        }
    }

    public function createPost(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'status_type' => ['required',Rule::in(['publish', 'draft'])],
        ]);
        $add = new functionClass();
        $newPost = $add->createNewPost($request->title , $request->content,$request->status_type );
        if($newPost)
        {

            session()->flash('success' , 'Post has been Created Successfully!!!!');
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        return redirect()->route('create_post');
        
    }
    public function updatePostStatus(Request $request)
    {
        $validateData = $request->validate([
            'status_type' => ['required',Rule::in(['publish', 'draft'])],
        ]);
        $id = session('get_post_id');
        $getType = session('userType');
        $add = new functionClass();
        $newPost = $add->updatePostStatus($id , $request->status_type );
        if($newPost)
        {
            session()->flash('success' , 'Post\'s status has been Changed Successfully!!!!');
            $request->session()->forget(['get_post_id']);
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        if($getType == 'all')
        {
            session()->forget(['userType']);
            return redirect()->route('view_post');
        }
        elseif($getType == 'user')
        {
            session()->forget(['userType']);
            return redirect()->route('view_user_post');
        }
        
    }
    public function updatePost(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'status_type' => ['required',Rule::in(['publish', 'draft'])],
        ]);
        
        $add = new functionClass();
        $id = session('get_post_id');
        $getType = session('userType');
        //print_r($id);exit();
        $newPost = $add->updateNewPost($id , $request->title , $request->content,$request->status_type );
        if($newPost)
        {

            session()->flash('success' , 'Post has been Updated Successfully!!!!');
            $request->session()->forget(['get_post_id']);
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        if($getType == 'all')
        {
            session()->forget(['userType']);
            return redirect()->route('view_post');
        }
        elseif($getType == 'user')
        {
            session()->forget(['userType']);
            return redirect()->route('view_user_post');
        }
        
    }

    public function deletePost(Request $request)
    {
        $id = session('get_post_id');
        $add = new functionClass();
        $getType = session('userType');
        $deletePost = $add->deleteUserPost($id);
        if($deletePost)
        {

            session()->flash('success' , 'Post has been Deleted Successfully!!!!');
            $request->session()->forget(['get_post_id']);
        }
        else
        {
            session()->flash('error' ,' Something went wrong!! please try again later..');
        }
        
        if($getType == 'all')
        {
            session()->forget(['userType']);
            return redirect()->route('view_post');
        }
        elseif($getType == 'user')
        {
            session()->forget(['userType']);
            return redirect()->route('view_user_post');
        }
    }

    public function massUpdateComment(Request $request)
    {
        $validateData = $request->validate([
            
            'operation_type' => ['required', Rule::in(['approve', 'disapprove', 'delete'])],
            'check_box' =>'required',
        ]);
        $getType = request('type');
        $type = $request->operation_type;
        $checkbox = $request->check_box;
        $add = new functionClass();
        $perform = $add->massUpdateComments($type , $checkbox);
        if($perform)
        {
            session()->flash('success' , 'Selected Operation has been performed Successfully!!!!');
            $add->storeLogs($action = 'Update USer Role' , $description =" Comments has been deleted/changed from the system!!!");
        
        }
        else
        {
            session()->flash('success' , 'Selected Operation has been performed Successfully!!!!');
        }
        if($getType == 'all')
        {
            return redirect()->route('view_comment');
        }
        elseif($getType == 'user')
        {
            return redirect()->route('view_user_comment');
        }
    }

    public function userLog(Request $request)
    {
        $add = new functionClass();
        $array = $add->getLogs($request->user_type);
        return view('admin.user_log')->with('getLog' , $array);
    }

    public function userLogView(Request $request)
    {
        $add = new functionClass();
        $array = $add->getLogsFilter($request->user_type);
    }

    public function likeUnlikePost(Request $request)
    {
        $array = array();
        $user_id = session('user_id');
        $post_id = $request->id;
        $add = new functionClass();
        $check = $add->checkLikeOrUnlike($user_id , $post_id);
        if($check == 0)
        {
            $check = $add->addLikeToPost($user_id , $post_id);
            if($check)
            {
                $getLikes = $add->getLikesPost($post_id);
                $array = array('err' => 'success' , 'like' => $getLikes , 'type' => 'unlike' );
            }
        }
        else
        {
            $check = $add->deleteLikeToPost($user_id , $post_id);
            if($check)
            {
                $getLikes = $add->getLikesPost($post_id);
                $array = array('err' => 'success' , 'like' => $getLikes , 'type' => 'like' );
            }
        }
        print_r(json_encode($array));
    }

    public function addCommentPost(Request $request)
    {
        $post_id = $request->id;
        $comment = $request->comment;
        $user_id = session('user_id');
        //print_r($user_id ." ". $post_id." ". $comment);exit();
        if(!empty($post_id) and !empty($comment))
        {
            $add = new functionClass();
            $check = $add->addCommentToPost($user_id , $post_id, $comment);
            if($check)
            {
                $array = array('err' => 'success' );
                print_r(json_encode($array)); 
            }
        }
        
    }

    public function sendMessage(Request $request)
    {
        $validateData = $request->validate([
            
            'sender' => 'required',
            'description' =>'required',
        ]);
        $name = session('user_name');
        $add = new functionClass();
        $createMessage = $add->createSendMessage($name , $request->sender , $request->description);

        if($createMessage)
        {
            session(['error' => 'success']);
            session(['msg' => 'Message has been sent successfully!!!']);
        }
        else
        {
            session(['error' => 'error']);
            session(['msg' => 'Something went wrong!! please try again later!!']);
        }

        return redirect()->back();

    }

    

    public function chancePassword(Request $request)
    {
        $validateData = $request->validate([
            
            'current_password' => 'required',
            'password' =>'required|confirmed|min:8',
            ]);
            $currentPassword = $request->current_password;
            $newPassword = $request->password;
            $add = new functionClass();
            $getUserPassword = $add->userPassword();
            if(Hash::check($currentPassword , $getUserPassword))
            {
                $update = $add->UpdateUserPassword($newPassword);
                if($update)
                {
                    session(['error' => 'success']);
                    session(['msg' => 'Password has been changed successfully!!!']);
                }
                else
                {
                    session(['error' => 'error']);
                    session(['msg' => 'Something went wrong!! Please try again later!!!']);
                }
            }
            else
            {
                session(['error' => 'error']);
                session(['msg' => 'Current Password does not match with the System!!!']);
            }
            return redirect()->back();
    }

      public function readUnreadInbox(Request $request)
      {
          $action = $request->action;
          $ids = $request->array;
          $add = new functionClass();
          $update = $add->updateInbox($action , $ids);
          if($update)
          {
              $array = array('err'=>'success');
              print_r(json_encode($array));
          }
        
      }
}
