<h1>Hello USER</h1>

<form action="{{route('articles.store')}}"
    method="POST">
    @csrf
    <label for="">
    Title: <input type="text" name="title">
    </label>
    <br>
    Body: <textarea name="body" id="" cols="30" rows="10"></textarea>


<div>
        <label>
     Tags:       <select multiple name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </label>
</div>

    <div>
        <label>
         Categories:   <select multiple name="categories[]">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </label>
    </div>
    <button type="submit">Send</button>

</form>
