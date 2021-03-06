<?php

namespace App\Controllers\Admin;

use App\Models\Comment;

class CommentsController extends BaseController
{
    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        $this->handleUnauthorizedUser();
    }

    /**
     * Show comments page
     *
     * @return mixed
     * @throws \Exception
     */
    public function showComments()
    {
        $approved   = Comment::selectAll('WHERE approved = 1 ORDER BY id DESC');
        $pending    = Comment::selectAll('WHERE approved = 0 ORDER BY id DESC');

        return view('admin/comments', compact('approved', 'pending'));
    }

    /**
     * Approve comment
     *
     * @throws \Exception
     */
    public function approve()
    {
        Comment::findBy('id', $_POST['id'])->approve();

        return redirect('/admin/comments', ['success' => 'You successfully approved comment']);
    }

    /**
     * Deny comment and delete it from database
     *
     * @throws \Exception
     */
    public function delete()
    {
        Comment::findBy('id', $_POST['id'])->delete();

        return redirect('/admin/comments', ['success' => 'You successfully deleted comment']);
    }

}