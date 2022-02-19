<option value="0" selected>Articles</option>

@if (count($articles) > 0)
    @foreach ($articles as $article)
        <option value="{{ $article->id }}">{{ $article->title }}</option>
    @endforeach
@else
    <p>No Options Found</p>
@endif

