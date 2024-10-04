<div>
    <div class="card">
        <div class="card-body">
            <div class="w-100">
                <h2 class="my-3 w-100 text-center">{{ $post->content_title }}</h2>
                <img src="/storage/{{ $post->header_image }}" class="w-100 px-5"
                    style="object-fit:contain; max-height:1000px" style="" alt="">
                <div class="my-3">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
