$('#add-image').click(function () {
    // Je recupere le n° des futures champs que je vais créer
    const index = +$('#widgets-counter').val();

    // Je recupere le prototype des entrées
    const tmpl = $('#ad_images').data('prototype').replace(/__name__/g, index);

    $('#widgets-counter').val(index + 1);

    // J'injecte ce code au sein de la div
    $('#ad_images').append(tmpl);

    // Je gère le button de suppression
    handleDeleteButtons();
});

function handleDeleteButtons() {
    $('button[data-action="delete"]').click(function () {
        const target = this.dataset.target;
        $(target).remove()
    });
}

function updateCounter() {
    const count = +$('#ad_images div.form-group').length

    $('#widgets-counter').val(count);
}

updateCounter();

handleDeleteButtons();

$("#ad_content").prop('id', 'ad_contenu')