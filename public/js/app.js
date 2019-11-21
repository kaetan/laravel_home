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

        let comments = await response.json();

        for (var i = 0; i < comments.length; i++) {
            $(".comments").append(`
                <div id="comment-${comments[i].id}" class="comment card mb-3">
                    <div class="card-body">
                        <p class="card-text small text-muted">
                         ${comments[i].author} wrote ${comments[i].date}
                        </p>
                        <p class="card-text lead">
                        ${comments[i].text}
                        </p>
                    </div>
                </div>
            `);
        }

        offset = document.querySelector('.comments').lastElementChild.id.slice(8);
        loadBtn.setAttribute('data-offset', offset);

        e.preventDefault();
    }
});
