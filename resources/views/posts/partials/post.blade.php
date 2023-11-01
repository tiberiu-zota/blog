{{-- {{ dd($post['id']) }} --}}
@if ($loop->even)
    <div style="width:200px;"> {{ $post->id }} . {{ $post->title }} {{ $bau }}</div>
@else
    <div style="width:200px;background-color : #dddded"> {{ $post->id }} . {{ $post->title }}</div>
@endif

<div>
    <form action="{{ route('posts.destroy', ['post' => $post->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete!">
    </form>
</div>