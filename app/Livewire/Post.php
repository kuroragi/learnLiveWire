<?php

namespace App\Livewire;

use App\Models\Posts;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Post extends Component
{
    use WithFileUploads;

    public $page_title = 'DataTables Post';

    public $postId;

    #[Validate('required|min:3')]
    public $content_title;

    #[Validate('required')]
    public $content;

    // #[Validate('image|max:12040')]
    public $header_image;

    public $isEditMode = false;

    public $listener = ['closeModal', 'editPost'];

    public function mount($id = null){
        if($id){
            $post = Posts::find($id);
            $this->postId = $post->id;
            $this->content_title = $post->content_title;
            $this->content = $post->content;
            $this->header_image = $post->header_image;
        }
    }

    public function savePost(){
        $validated = $this->validate();

        $data = [
            'content_title' => $validated['content_title'],
            'content' => $validated['content'],
            'header_image' => $this->header_image,
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

    public function CreatePost(){
        $validated = $this->validate();

        $data = [
            'content_title' => $validated['content_title'],
            'content' => $validated['content'],
            'header_image' => $this->header_image,
        ];

        $createPost = Posts::create($data);

        if($createPost){
            $this->ResetField();
            session()->flash('success', 'Berhasil Tambah Post.');
            $this->dispatch('closeModal');
        }

    }

    public function updatedContent($value)
    {
        $this->content = $value;
    }

    public function uploadImage($file)
    {
        dd('halo');
        $path = $file->store('uploads', 'public');
    
        return asset('storage/' . $path);
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

    public function UpdatePost(){
        $validated = $this->validate();

        $data = [
            'content_title' => $validated['content_title'],
            'content' => $validated['content'],
            'header_image' => $this->header_image,
        ];

        $updatePost = Posts::findOrFail($this->postId)->update($data);

        if($updatePost){
            $this->ResetField();
            session()->flash('success', 'Berhasil Tambah Post.');
            $this->dispatch('closeModal');
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
    }

    public function render()
    {

        $posts = Posts::orderBy('created_at', 'Desc')->get();
        // dd($posts);
        return view('livewire.post', [
            'posts' => $posts
        ]);
    }
}
