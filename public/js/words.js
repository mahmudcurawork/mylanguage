$(function () {
    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true
    });
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function editData(wordId, word, definition) {
    $('#word').val(word);
    $('#definition').val(definition);
    $('#wordModal').modal('show');
    $('#saveData').attr('onclick', 'updateData(' + wordId + ')');
}

$('input').on('keyup', function () {
    checkValidity();
});

function markLearned(wordId, noOfRead) {

    var requestFor = 'learned';
    var noOfRead = noOfRead + 1;

    var formData = new FormData;
    formData.append('wordId', wordId);
    formData.append('requestFor', requestFor);
    formData.append('noOfRead', noOfRead);

    $('#wordRow_' + wordId).fadeOut("slow");

    ajax('/update-word', 'POST', '', formData);


}

function checkValidity() {

    var flag = 1;

    if (!$('#word').val()) {
        $('#word').addClass('border-danger');
        flag = flag - 1;
    } else {
        $('#word').removeClass('border-danger');
    }

    if (!$('#definition').val()) {
        $('#definition').addClass('border-danger');
        flag = flag - 1;
    } else {
        $('#definition').removeClass('border-danger');
    }

    if (flag < 1) {
        return false;
    } else {
        return true;
    }

}

function toggleDefinition(toShow) {
    $('#' + toShow).toggleClass('d-none');
}

function addWord() {
    $('#wordModal').modal('show');
    $('#saveData').attr('onclick', 'saveData()');
    $('#word').val('');
    $('#definition').val('');

}

function updateData(wordId) {

    if (checkValidity()) {


        $('#wordModal').modal('hide');
        $('#saveData').attr('onclick', 'saveData()');


        var word = $('#word').val();
        var definition = $('#definition').val();

        var formData = new FormData;
        formData.append('wordId', wordId);
        formData.append('word', word);
        formData.append('definition', definition);

        ajax('/update-word', 'POST', '', formData);
        loadWords();

        $('#word').val('');
        $('#definition').val('');

    } else {
        console.log('Error updating data');
    }

}

function hideModal() {
    $('#wordModal').modal('toggle');
}

function saveData() {

    if (checkValidity()) {



        var word = $('#word').val();
        var definition = $('#definition').val();

        $('#wordModal').modal('hide');

        var formData = new FormData;
        formData.append('word', word);
        formData.append('definition', definition);

        ajax('/save-word', 'POST', '', formData);
        loadWords();

        $('#word').val('');
        $('#definition').val('');

    } else {
        console.log('Error saving data');
    }


}

loadWords();

function loadWords() {

    var contentId = 'wordsTable';
    var skeletonId = 'skeleton';

    hideContentShowSkeletons(contentId, skeletonId);
    var functionsOnSuccess = [
        [showContentHideSkeletons, [contentId, skeletonId, 'response']],
    ];

    ajax('/loadWords', 'GET', functionsOnSuccess);

}


function ajax(url, method, functionsOnSuccess, form) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (typeof form === 'undefined') {
        form = new FormData;
    }

    $.ajax({
        url: url,
        type: method,
        async: true,
        data: form,
        processData: false,
        contentType: false,
        dataType: 'json',
        error: function () {
            console.log("ajax error" + url);
        },
        success: function (response) {

            for (var j = 0; j < functionsOnSuccess.length; j++) {
                for (var i = 0; i < functionsOnSuccess[j][1].length; i++) {
                    if (functionsOnSuccess[j][1][i] == "response") {

                        functionsOnSuccess[j][1][i] = response;
                    }
                }

                functionsOnSuccess[j][0].apply(this, functionsOnSuccess[j][1]);
            }


        }
    });
}

function showContentHideSkeletons(contentId, skeletonId, content) {

    if (typeof content === 'undefined') {
        content = 'default';
    }
    var skeleton = $('#' + skeletonId);
    var contentContainer = $('#' + contentId);

    skeleton.addClass('d-none');
    contentContainer.removeClass('d-none');
    if (content != 'default') {
        contentContainer.html(content);
    }

}

function hideContentShowSkeletons(contentId, skeletonId) {
    var skeleton = $('#' + skeletonId);
    var contentContainer = $('#' + contentId);
    skeleton.removeClass('d-none');
    contentContainer.addClass('d-none');
}
