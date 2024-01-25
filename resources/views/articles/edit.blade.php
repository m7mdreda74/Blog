 <h1>Edit Article</h1>

 <form action="{{route('articles.update',[$article])}}" method="post">
     @method('PATCH')

     @csrf

     <input type="text" name="title" value="{{$article->title}}">

     <textarea name="body">{{{$article->body}}}</textarea>

     <button type="submit">Send</button>
 </form>


 <form action="{{route('articles.destroy', [$article])}}" method="POST">
     @csrf
     @method('DELETE')
     <button type="submit">Delete</button>
 </form>
