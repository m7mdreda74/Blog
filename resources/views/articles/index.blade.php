@foreach($articles as $article)
    <div>
      title:  {{$article->title}}
    </div>
    <div>
      body:  {{$article->body}}
    </div>
@endforeach
