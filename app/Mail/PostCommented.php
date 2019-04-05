<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Post;
use App\Comment;
use App\User;

class PostCommented extends Mailable
{
    public $post;
    public $comment;
    public $user;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment,Post $post,User $user)
    {
        $this->post = $post;
        $this->comment = $comment;
        $this->user = $user;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.posts.commented');
    }
}
