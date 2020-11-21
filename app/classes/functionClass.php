<?php

namespace App\classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\stock as stocks;
use App\Models\orders as sells;
use App\Models\User as users;
use App\Models\Log as logs;
use App\Models\Comment as comments;
use App\Models\Post as posts;
use App\Models\Like as likes;
use App\Models\mail as mails;
use App\Models\order_number as orders;
use App\Models\logout as logouts;
use Illuminate\Support\Facades\Crypt;


class functionClass
{
    const SELL_TYPE = ['received' => 'Received' , 'packed' => 'Ready to sent' , 'sent' => 'Sent'];
    const ROLE_TYPE = ['admin' , 'user'];
    const COMMENT_STATUS = ['approve' , 'disapprove'];
    const POST_STATUS = ['publish' , 'draft'];
  
    public function getItemCode()
    {
        $getCode = stocks::distinct()->pluck('itemcode');
        return $getCode;
    }
    public function getItemName()
    {
        $getCode = stocks::distinct()->pluck('itemname');
        return $getCode;
    }

    public function addNewItem($name , $code , $count)
    {
        $addItem = stocks::create(['itemname' => $name, 'itemcode' => $code , 'count' => $count]);
        return $addItem;
    }

    public function getId($get_id)
    {
        $id = $this->decrypt($get_id);
        $item = stocks::find($id);
        return $item;
    }

    public function updateNewItem($get_id , $count)
    {
        $id = $this->decrypt($get_id);
        $model = stocks::find($id);
        $model->count = $count;
        $model->save();

        return $model;

    }
    public function deleteNewItem($get_id)
    {
        $id = $this->decrypt($get_id);
        $model = stocks::find($id);
        $model->delete();
        return $model;

    }
    public function addSellItem($order , $name , $type, $count , $note)
    {
        //print_r($count);exit();
        if(empty($note))
        {
            $addItem = sells::create(['order_number' => $order, 'itemname' => $name , 'sell_type' => $type , 'sellcount' => $count]);
        
        }
        else
        {
            $addItem = sells::create(['order_number' => $order, 'itemname' => $name , 'sell_type' => $type , 'sellcount' => $count , 'note' => $note]);
        
        }
        return $addItem;
    }

    public function getItemCount($name)
    {
        $count = stocks::where('itemname' , $name)->first()->count;
        return $count;
    }
    public function updateItemCount($name , $tCount , $sellCount)
    {
        $count = stocks::where('itemname' , $name)
                        ->update(['count' => $tCount - $sellCount]);            
        return $count;
    }
    public function addSellItemSample($order , $product)
    {
        foreach($product as $details)
        {
            $sellItems = new sells;
            $sellItems->order_number = $order;
            $sellItems->itemname = $details["'name'"];
            $sellItems->sell_type = $details["'type'"];
            $sellItems->sellcount = $details["'quantity'"];
            if(!empty($details["'note'"]))
            {
                $sellItems->note = $details["'note'"];
            }
            $sellItems->save();
            if($sellItems)
            {
                $count = $this->getItemCount($details["'name'"]);
                $update = $this->updateItemCount($details["'name'"] , $count , $details["'quantity'"]);
            }
            else
            {
                return false;
            }
        }
        return true;
    }

    public function getSellHistory()
    {
        $sellItem = sells::orderBy('created_at', 'desc')->get();
        return $sellItem;
    }
    public function getSellItemDetail($get_id)
    {
        $id = $this->decrypt($get_id);
        $model = sells::find($id);
        return $model;

    }

    public function updateSellNewItem($get_id , $number , $name , $type , $note , $packedBy )
    {
        $currentCount = $this->getSellItemDetail($get_id)->sellcount;
        $model = stocks::where('itemname' , $name)->first();
        $model->count = $model->count + $currentCount - $number;
        $model->save();

        if($model)
        {
            $updateOrder = $this->getSellItemDetail($get_id);
            $updateOrder->sell_type = $type;
            $updateOrder->sellcount = $number;
            if(!empty($note))
            {
                $updateOrder->note = $note;
            }
            if(!empty($packedBy))
            {
                $updateOrder->packed_by = json_encode($packedBy);
            }
            $updateOrder->save();
            return $updateOrder;

        }
        else
        {
            return false;
        }

        

    }

    public function deleteSellNewItem($get_id , $name )
    {
        $currentCount = $this->getSellItemDetail($get_id)->sellcount;
        $model = stocks::where('itemname' , $name)->first();
        $model->count = $model->count + $currentCount;
        $model->save();

        if($model)
        {
            $updateOrder = $this->getSellItemDetail($get_id);
            $updateOrder->delete();
            return $updateOrder;

        }
        else
        {
            return false;
        }

        

    }

    public function trackSellNewItem($name , $fromdate , $todate)
    {
        
        
         if(!empty($fromdate) and !empty($todate))
         {
            $model = sells::where('itemname' , $name)
                            ->whereBetween('created_at' , [$fromdate , $todate])
                            ->orderBy('created_at' , 'desc')
                            ->get();
        }
         else
         {
            $model = sells::where('itemname' , $name)
                    ->orderBy('created_at' , 'desc')
                    ->get();
         }
        
        return $model;


    }

    public function getUsers()
    {
        $item = users::all();
        return $item;
    }

    public function decrypt($string)
    {
        return Crypt::decryptString($string);

    }
    public function encrypt($string)
    {
        return Crypt::encryptString($string);

    }
    public function getUserDetail($get_id)
    {
        $id = $this->decrypt($get_id);
        $model = users::find($id);
        return $model;
    }

    public function updateUserRoles($get_id , $role)
    {
        $id = $this->decrypt($get_id);
        $model = users::find($id);
        $model->roles = $role;
        $model->save();

        return $model;
    }

    public function deleteUsers($get_id )
    {
        $id = $this->decrypt($get_id);
        $item = comments::where('user_id' , $id)->exists();
        if(!empty($item))
        {
            
            $item = comments::where('user_id' , $id)->delete();
        }
        $likes = likes::where('user_id' , $id)->exists();
        if(!empty($likes))
        {
            
            $likes = likes::where('user_id' , $id)->delete();
        }
        $logs = logs::where('user_id' , $id)->exists();
        if(!empty($logs))
        {
            $logs = logs::where('user_id' , $id)->delete();
        }
        $logouts = logouts::where('user_id' , $id)->exists();
        if(!empty($logouts))
        {
            $logouts = logouts::where('user_id' , $id)->delete();
        }
        $item1 = posts::where('user_id' , $id)->exists();
        if(!empty($item1))
        {
            $getId = posts::where('user_id' , $id)->pluck('id');
            //delete all the commetns was given to the posts were created by this user
            $deleteComment = comments::whereIn('post_id' , $getId)->exists();
            if($deleteComment)
            {
                $deleteComment = comments::whereIn('post_id' , $getId)->delete();
            }
            //similrly likes
            $deleteLikes = likes::whereIn('post_id' , $getId)->exists();
            if($deleteLikes)
            {
                $deleteLikes = likes::whereIn('post_id' , $getId)->delete();
            }
            $item1 = posts::where('user_id' , $id)->delete();
        }
        $mail = mails::where('from' , $id)->orWhere('to' , $id)->exists();
        if(!empty($mail))
        {
            $mail = mails::where('from' , $id)->orWhere('to' , $id)->delete();
        }
        $model = users::find($id);
                    $model->delete();
        if($model)
        {
            return true;
        }
        return false;
    }
    public function getUsersOnly()
    {
        $user = $this->getUsers()->pluck('id' , 'name');
        $array = array();
        foreach($user as $name => $id)
        {
            $array[$id] = $name;
        }
        return $array;
    }

    public function getComments()
    {
        $item = comments::orderBy('created_at' , 'desc')->get();
        return $item;
    }
    public function getUsersComments()
    {
        $item = users::find(session('user_id'))->Comments;
        return $item;
    }
    public function getCommentDetail($get_id)
    {
        $id = $this->decrypt($get_id);
        $item = comments::find($id);
        return $item;
    }

    public function updateCommentStatus($get_id , $type)
    {
        $getType = request('type');
        $update = $this->getCommentDetail($get_id);
        $update->status = $type;
        $update->save();

        return $update;
    }
    public function deleteUserComment($get_id)
    {
        $update = $this->getCommentDetail($get_id);
        $update->delete();

        return $update;
    }
    public function getPosts()
    {
        $item = posts::orderBy('created_at' , 'desc')->paginate(3);
        return $item;
    }
    public function getPostsView()
    {
        $item = posts::orderBy('created_at' , 'desc')->get();
        return $item;
    }
    public function getUserPostsView()
    {
        $item = users::find(session('user_id'))->Posts;
        return $item;
    }
    public function getPostDetail($get_id)
    {
        $id = $this->decrypt($get_id);
        $item = posts::find($id);
        return $item;
    }

    public function createNewPost($title , $content , $status)
    {
        $addItem = posts::create(['user_id' => 1, 'title' => $title , 'content' => $content , 'status' => $status]);
        return $addItem;
    }
    public function updateNewPost($get_id , $title , $content , $status)
    {
        $id = $this->decrypt($get_id);
        $update = posts::find($id);
        $update->title = $title;
        $update->content = $content;
        $update->status = $status;
        $update->save();
        return $update;
    }

    public function updatePostStatus($get_id, $status)
    {
        $id = $this->decrypt($get_id);
        $update = posts::find($id);
        $update->status = $status;
        $update->save();
        return $update;
    }

    public function deleteUserPost($get_id)
    {
        $id = $this->decrypt($get_id);
        $item = comments::where('post_id' , $id)->delete();
        $likes = likes::where('post_id' , $id)->delete();
        $update = posts::find($id);
        $update->delete();

        return $update;
    }

    public function massUpdateComments($type , $checkbox)
    {
        $array = array();
        foreach($checkbox as $check)
        {
            array_push($array , $this->decrypt($check));
        }
        $id = implode(',' , $array);
        //print_r($id);exit();
        if($type == 'delete')
        {
            $item = comments::whereIn('id', $array)->delete();
        }
        else
        {
            $item = comments::whereIn('id' , $array)->update(['status' => $type]);
        }
        return $item;
        
    }

    public function getLogs($user = '')
    {
        if(empty($user))
        {
            $logs = logs::orderBy('created_at' , 'desc')->get();
        }
        else
        {
            $id = $this->decrypt($user);
            $logs = users::find($id)->Logs;
        }
        
        return $logs;
    }
    public function getUserLogOnly()
    {
        $logs = users::find(session('user_id'))->Logs;
        
        return $logs;
    }
    

    public function getCommentTotal($id)
    {
        $getComments =  posts::find($id)->comments()->count();
        return $getComments;
    }

    public function getCommentsPost($id)
    {
        $getComments =  posts::find($id)->comments()->get();
        return $getComments;
    }
    public function getLikesPost($id)
    {
        $getComments =  posts::find($id)->likes()->count();
        return $getComments;
    }

    public function checkLikeOrUnlike($user_id , $post_id)
    {
        $get = likes::where('user_id' , $user_id)
                    ->where('post_id' , $post_id)
                    ->count();

                   // print_r($user_id ." ". $post_id);exit();
        return $get;
    }

    public function addLikeToPost($user_id , $post_id)
    {
        $addItem = likes::create(['user_id' => $user_id, 'post_id' => $post_id]);
        return $addItem;
    }
    public function deleteLikeToPost($user_id , $post_id)
    {
        $deleteLike = likes::where('user_id' , $user_id)
                        ->where('post_id' , $post_id)
                        ->delete();
        return $deleteLike;
    }

    public function addCommentToPost($user_id , $post_id, $comment)
    {
        $addItem = comments::create(['user_id'=>$user_id ,'post_id'=>$post_id , 'content'=>$comment , 'status'=>'approve']);
        return $addItem;
    }

    public function createSendMessage($name , $sender , $content)
    {
        $allUser = $this->getUsersOnly();
        $userId= array_search($name, $allUser,true);
        $array = array();
        
        if($sender[0] == 'all')
        {
            foreach ($allUser as $id => $user)
            {
                if($user != $name)
                {
                    $create = mails::create(['from' => $userId , 'to' => $id , 'content' => $content]);
                }
            }
        }
        else
        {
            for($i = 0; $i < count($sender) ; $i++)
            {
                $sendId = array_search($sender[$i], $allUser,true);
                $create = mails::create(['from' => $userId , 'to' => $sendId , 'content' => $content]);
                //array_push($array , array('from' => $userId , 'to' => $sendId , 'content' => $content ));
            }
        }
        
        //$create = mails::create($array);
        return $create;
    }

    public function forgetSession()
    {
        session()->forget(['error', 'msg']);
    }

    public function getInboxTotal()
    {
        $total  = mails::where('status' , 'active')
                        ->where('read' , 'unread')
                        ->where('to' , session('user_id'))
                        ->count();
        return $total;
    }
    public function getMailId($id)
    {
        $getInbox =  mails::find($id);
        return $getInbox;
    }
    public function getAllMails()
    {
        $id = session('user_id');
        $getInbox =  users::find($id)->mails()
                            ->where('status' , 'active')->paginate(10);
        return $getInbox;
    }

    public function getAllSentMails()
    {
        $id = session('user_id');
        $getInbox =  users::find($id)->sendMails()->where('status' , 'active')->simplePaginate(3);
        return $getInbox;
    }
    public function getAllTrashMails()
    {
        $id = session('user_id');
        $getInbox =  users::find($id)->mails()->where('status' , 'trash')->simplePaginate(3);
        return $getInbox;
    }

    public function userPassword()
    {
        $userPassword = users::find(session('user_id'))->password;
        return $userPassword;
    }

    public function UpdateUserPassword($newPassword)
    {
        $id = session('user_id');
        $hashed = Hash::make($newPassword);
        //print_r($hashed);exit();
        $update = users::find($id);
        $update -> $hashed;
        $update -> save();
        return $update;
    }

    public function updateInbox($action , $ids)
    {
        //print_r($action);exit();
        if($action == 'trash' or $action == 'active' or $action == 'delete')
        {
            $update = mails::whereIn('id' , $ids)
                        ->update(['status' => $action]);
        }
        elseif($action == 'deletep')
        {
            $update = mails::destroy($ids);
        }
        else
        {
            $update = mails::whereIn('id' , $ids)
                        ->update(['read' => $action]);
        }
        
        return $update;
    }

    public function moveToRead($id)
    {
        $update = mails::where('id' , $id)
                        ->update(['read' => 'read']);
        return $update;
    }

    public function topSellingItem()
    {
        $getItem = DB::table('orders')->select(DB::raw('sum(sellcount) as total , itemname'))
                        ->groupBy('itemname')
                        ->orderBy('total' , 'desc')
                        ->limit(10)
                        ->get();
        return $getItem;
    }

    public function resentOrders()
    {
        $order = sells::orderBy('created_at' , 'desc')
                        ->limit(10)
                        ->get();
        return $order;
    }

    public function allUsers()
    {
        $result = users::get()->count();
        return $result;
    }
    public function recentUsers()
    {
        $today = date('Y-m-d')." 23:59:59";
        $last = date('Y-m-d' , strtotime($today . ' -7 day'))." 23:59:59";
        
        $result = users::whereBetween('created_at' , [$last , $today])->get()->count();
        return $result;
    }
    public function allOrders()
    {
        $result = sells::get()->count();
        return $result;
    }
    public function recentOrders()
    {
        $today = date('Y-m-d')." 23:59:59";
        $last = date('Y-m-d' , strtotime($today . ' -7 day'))." 23:59:59";
        
        
        $result = sells::whereBetween('created_at' , [$last , $today])->get()->count();
        return $result;
    }
    public function allProducts()
    {
        $result = stocks::get()->count();
        return $result;
    }
    public function recentProducts()
    {
        $today = date('Y-m-d')." 23:59:59";
        $last = date('Y-m-d' , strtotime($today . ' -7 day'))." 23:59:59";
        
        
        $result = stocks::whereBetween('created_at' , [$last , $today])->get()->count();
        return $result;
    }
    public function allPosts()
    {
        $result = posts::get()->count();
        return $result;
    }
    public function recentPosts()
    {
        $today = date('Y-m-d')." 23:59:59";
        $last = date('Y-m-d' , strtotime($today . ' -7 day'))." 23:59:59";
        
        
        $result = posts::whereBetween('created_at' , [$last , $today])->get()->count();
        return $result;
    }
    public function storeLogs($action , $description)
    {
        $logs = new logs;
        $logs->user_id = session('user_id');
        $logs->action = $action;
        $logs->description = $description;
        $logs->save();

        return $logs;
    }
    public function getNewPostTotal()
    {
        //firstly find the last logout time
        $id = session('user_id');
        $logoutTime = logouts::find($id);
        if(empty($logoutTime))
        {
            $count = posts::get()->count();
            return $count;
        }
        else
        {
            $time = $logoutTime->updated_at;
            $count = posts::where('created_at' , '>=' , $time)->count();
            return $count;

        }
       
    }

    
}

?>