<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewPageController extends Controller
{
    function __construct () {
        $this->middleware('auth');
    }
    public function deleteItemPage()
    {
        return view('admin.delete_item');
    }

    public function addItemPage()
    {
        return view('admin.add_item');
    }
    public function viewItemPage()
    {
        return view('admin.view_item');
    }
    public function updateItemPage()
    {
        return view('admin.update_item');
    }

    public function sellItemPage()
    {
        return view('admin.sell_item');
    }

    public function sellHistoryItemPage()
    {
        return view('admin.history_sell_item');
    }
    public function updateSellItemPage()
    {
        return view('admin.update_sell_item');
    }
    public function deleteSellItemPage()
    {
        return view('admin.delete_sell_item');
    }
    public function trackHistoryItemPage()
    {
        return view('admin.custom_sell_item');
    }
    public function userViewPage()
    {
        return view('admin.user_manage');
    }
    public function getUserRole()
    {
        return view('admin.update_user_role');
    }
    public function deleteUser()
    {
        return view('admin.delete_user');
    }
    public function commentViewPage()
    {
        return view('admin.view_comment');
    }
    public function commentUserViewPage()
    {
        return view('admin.view_user_comment');
    }
    public function editCommentStatus()
    {
        return view('admin.edit_comment');
    }

    public function deleteCommentStatus()
    {
        return view('admin.delete_comment');
    }

    public function postViewPage()
    {
        return view('admin.view_post');
    }
    public function postUserViewPage()
    {
        return view('admin.view_user_post');
    }
    public function editPostViewPage()
    {
        return view('admin.edit_post');
    }
    public function deletePostViewPage()
    {
        return view('admin.delete_post');
    }
    public function createPostViewPage()
    {
        return view('admin.create_post');
    }
    public function editNewPostViewPage()
    {
        return view('admin.edit_post_content');
    }

    public function userLogsViewPage()
    {
        return view('admin.view_user_log');
    }

    public function viewSendMailPage()
    {
        return view('admin.create_mail');
    }
    public function viewInboxMailPage()
    {
        return view('admin.view_inbox_mail');
    }
    public function viewSentMailPage()
    {
        return view('admin.sent_mail_show');
    }
    public function viewTrashMailPage()
    {
        return view('admin.trash_mail_show');
    }
    
    public function changePassword()
    {
        return view('admin.change_password');
    }
    public function viewInboxSingleMailPage()
    {
        return view('admin.open_mail');
    }
    public function profilePage()
    {
        return view('admin.profile');
    }

    public function viewRequestPostPage()
    {
        return view('admin.view_a_post');
    }

    
}
