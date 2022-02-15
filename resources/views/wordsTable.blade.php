@if ($words->count() > 0)
    @foreach ($words as $word)
        <tr>
            <th scope="row">
                <input type="checkbox" name="select" id="select1">
                <label for="select1">1. {{ $word->word }}</label>

            </th>
            <td>{{ $word->definition }}</td>
            <td>{{ $word->learned }}</td>
            <td>
                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="clear">
                    <img src="/images/x-lg.svg" alt="edit icon">
                </button>
                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="edit">
                    <img src="/images/pencil.svg" alt="edit icon">
                </button>
                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="delete">
                    <img src="/images/trash.svg" alt="edit icon">
                </button>
            </td>
        </tr>
    @endforeach
@else
    No words found
@endif
