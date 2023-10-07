// function load() {
//     console.log("呼び込み");
// }

// load();
//いいねボタンの要素取得
const likeButton = document.querySelector('.love');
const unLikeButton = document.querySelector('.loved');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//postidを取得する
const postId = likeButton.getAttribute('data-name');
// console.log(love);

//非同期処理
function fetchFunc(className) {
    fetch(`/posts/${postId}/likes`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
        },
        body: '',
    })
    .then(data => {
        console.log(data);
        if (className === "love") {
            likeButton.classList.toggle("loved");
            console.log(className);
        } else if (className === "loved") {
            unLikeButton.classList.toggle("loved");
            console.log(className);
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}

//いいね追加
likeButton.addEventListener('click', function (e) {
    e.preventDefault();

    fetchFunc("love");
    
})
//いいね解除
unLikeButton.addEventListener('click', function (e) {
    e.preventDefault();

    fetchFunc("loved");
    
})

