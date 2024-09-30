<?php

namespace App\Livewire;

use App\Models\Posts;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\TemporaryUpdaloadedFile;

#[Title('Post')]
#[Layout('layouts.app', ['page_title' => 'Data Post'])]
class Post extends Component
{
    use WithFileUploads;

    public $title = 'Post';

    public $page_title = 'DataTables Post';

    public $postId;

    #[Validate('required|min:3')]
    public $content_title;

    #[Validate('required')]
    public $content;

    #[Validate('image|max:12040')]
    public $header_image;

    public $isEditMode = false;

    public $listener = ['resetField', 'closeModal', 'editPost'];

    public function savePost(){
        $validated = $this->validate();

        if($this->header_image instanceof TemporaryUploadedFile){
            $name = $this->header_image->getClientOriginalName();
            $path = $this->header_image->storeAs('header_image', $name, 'public');
        }

        $data = [
            'content_title' => $validated['content_title'],
            'content' => $validated['content'],
            'header_image' => $path,
        ];

        $createUpdatePost = Posts::updateOrCreate(
            ['id' => $this->postId], 
            $data
        );

        session()->flash('message', $this->isEditMode ? 'post berhasil di update' : 'post berhasil disimpan');

        if($createUpdatePost){
            $this->dispatch('closeModal');
            $this->ResetField();
        }
    }

    public function EditPost($id){
        $post = Posts::findOrFail($id);
        
        if($post){
            $this->postId = $id;
            $this->content_title = $post->content_title;
            $this->content = $post->content;
            $this->header_image = $post->header_image;
            $this->isEditMode = true;
            $this->dispatch('editModal');
        }
    }

    public function DeletePost($id){
        if($id){
            Posts::destroy($id);
        }
    }

    public function ResetField(){
        $this->reset(['postId', 'content_title', 'content', 'header_image']);
        $this->isEditMode = false;
        $this->dispatch('resetField');
    }

    public function render()
    {

        $posts = Posts::orderBy('created_at', 'Desc')->get();
        // dd($posts);
        return view('livewire.post', [
            'posts' => $posts,
            'page_title' => 'Data Post',
        ]);
    }
}
