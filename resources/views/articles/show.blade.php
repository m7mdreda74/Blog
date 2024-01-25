@if($article->status == 'approved')
<h1>The Article Details</h1>

<h2>{{$article->title}}</h2>

<h3>{{$article->body}}</h3>

<h3>{{$article->status}}</h3>
@endif
