@if ($articles->count() > 0)

    @foreach ($articles as $article)
        <tr id="articleRow_{{ $article->id }}">
            <th scope="row">
                
                {{ $article->title }}

            </th>
            <td colspan="2">
                {{ $article->reference }}
                
            </td>
            
            <td>
                <button class="btn btn-secondary" 
                onclick="editArticle({{ $article->id }},'{{ $article->title }}','{{ $article->reference }}')"
                data-toggle="tooltip" data-placement="top" title="edit">
                    <img src="/images/pencil.svg" alt="edit icon">
                </button>
                <button class="btn btn-secondary" onclick="deleteArticle({{ $article->id }})" data-toggle="tooltip" data-placement="top" title="delete">
                    <img src="/images/trash.svg" alt="delete icon">
                </button>
            </td>
        </tr>
    @endforeach
@else
    No articles found
@endif
