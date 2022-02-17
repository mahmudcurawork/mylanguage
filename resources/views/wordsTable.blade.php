@if ($words->count() > 0)
    @php
        $counter = 0;
    @endphp
    @foreach ($words as $word)
        <tr id="wordRow_{{ $word->id }}">
            <th scope="row">
                <input type="checkbox" name="select" id="select1">
                <label for="select1">{{ ++$counter }}. {{ $word->word }}</label>

            </th>
            <td>
                <span class="d-none" id="{{ $word->id }}_definition">{{ $word->definition }}</span>

                <img data-toggle="tooltip" data-placement="top" title="View definition"
                    onclick="toggleDefinition('{{ $word->id }}_definition')" src="/images/eye-black.svg" alt="view icon">

            </td>
            <td>

                <?php if ($word->learned) { ?>
                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Click to mark not learned">
                    <img src="/images/check2-circle.svg" alt="Learned">
                </button>
                
                <?php }else { ?>
                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Click to mark learned" onclick="markLearned({{ $word->id }}, {{ $word->no_of_read }})">
                    <img src="/images/dash-circle.svg" alt="Not learned">
                </button>
                
                <?php } ?>
                <small>{{ $word->no_of_read? '(' . $word->no_of_read . ')':'' }}</small>

            </td>
            <td>
                <button class="btn btn-secondary" 
                onclick="editData({{ $word->id }},'{{ $word->word }}','{{ $word->definition }}')"
                data-toggle="tooltip" data-placement="top" title="edit">
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
