<?php

namespace App\Livewire\Post;

use App\Models\PostComment;
use App\Models\Posts;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app', ['page_title' => 'Post Detail'])]
#[Title('Post Detail')]
class PostDetail extends Component
{
    public $post;
    public $newComment;
    public $commentId;

    public function mount($id){
        $this->post = Posts::find($id);
    }

    public function addComment(){
        $this->validate([
            'newComment' => 'required|string|max:255'
        ]);

        $data = [
            'id_post' => $this->post->id,
        ];

        $createUpdateComment = PostComment::updateOrCreate(['id' => $this->commentId], $data);

        if($createUpdateComment){
            $this->newComment = '';
            $this->post->refresh();
        }
    }

    public function render()
    {
        return view('livewire.post.post-detail');
    }
}
