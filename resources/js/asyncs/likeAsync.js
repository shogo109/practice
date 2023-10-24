
//いいねボタンの要素取得
const likeButton = document.getElementById('love'); //初期表示にいいねされていない要素の取得
const unLikeButton = document.getElementById('loved'); //初期表示にすでにいいねされている要素の取得
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


//非同期処理
function fetchFunc(postId) {
    fetch(`/posts/${postId}/likes`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
        },
        body: '',
    })
    .then(data => {
        console.log(`${postId}の取得に成功しました`);
        console.log(data);
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert("失敗しました。");
    });
}

//いいね追加
likeButton.addEventListener('click', function (e) {
    e.preventDefault();

    likeButton.querySelector(".likeButton").classList.toggle("clicked");

    //postidを取得する
    const postId = likeButton.getAttribute('data-name');
    fetchFunc(postId);
    
})
//いいね解除
unLikeButton.addEventListener('click', function (e) {
    e.preventDefault();

    const likesvg = unLikeButton.querySelector(".likeButton"); //aタグlovedidの子要素を取得
    const likesvgLoved = likesvg.querySelector(".loved"); //likesvgの子要素を取得
    if (likesvgLoved) { //初期表示にハートを赤くするための条件処理
        likesvgLoved.classList.remove("loved"); //初回ハート解除する時は、クラスを排除する
        likesvgLoved.classList.add("heart");
    } else {
        likesvg.classList.toggle("clicked"); //それ以降はトグルさせる
    }

    const lovedPostId = unLikeButton.getAttribute('data-name');
    fetchFunc(lovedPostId);
    
})

