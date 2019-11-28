$(document).ready(function () {
    document.querySelector('.js-load-comments').addEventListener('click', loadComments);

    const loadBtn = document.querySelector('.js-load-comments');
    const article = document.querySelector('.article').id.slice(8);
    let offset = document.querySelector('.comments').lastElementChild.id.slice(8);

    loadBtn.setAttribute('data-offset', offset);
    loadBtn.setAttribute('data-article', article);

    async function loadComments(e) {
        let url = `/articles/${article}/load/${offset}`;
        let response = await fetch(url);

        let view = await response.json();

        $(".comments").append(view);

        offset = document.querySelector('.comments').lastElementChild.id.slice(8);
        loadBtn.setAttribute('data-offset', offset);

        e.preventDefault();
    }
});
