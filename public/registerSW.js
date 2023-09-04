if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker
        .register('/sw.js')
        .then((reg) => console.log('サービスワーカーの登録成功', reg.scope))
        .catch((err) => console.log('サービスワーカーの登録失敗', err));
    });
  }

// let deferredPrompt;
// const addBtn = document.querySelector(".add-button");
// console.log(addBtn);
// const overlay = document.getElementById('js-overlay');
// const body = document.body;


// window.addEventListener("beforeinstallprompt", (e) => {
//   // ユーザーエージェントをチェックして、インストール済みの場合はプロンプトを表示しない
//   // if (window.matchMedia("(display-mode: standalone)").matches) {
//   //   return;
//   // }
//   // Chrome 67以前のバージョンでプロンプトが自動的に表示されないようにする
//   e.preventDefault();
//   // 後で発生させることができるように、イベントを隠しておく。
//   deferredPrompt = e;
//   // ホーム画面に内側へ追加できることをユーザーに通知する UI の更新
//   addBtn.style.display = "block";
//   overlay.classList.add('is-active');
//   body.classList.add('hidden');

//   addBtn.addEventListener("click", (e) => {
//     // A2HS ボタンを表示するユーザーインターフェイスを非表示にします。
//     addBtn.style.display = "none";
//     // プロンプトを表示
//     deferredPrompt.prompt();
//     // ユーザーがプロンプトに応答するのを待つ
//     deferredPrompt.userChoice.then((choiceResult) => {
//       if (choiceResult.outcome === "accepted") {
//         console.log("ユーザーが A2HS プロンプトを受け入れました。");
//       } else {
//         console.log("ユーザーは A2HS のプロンプトを拒否しました。");
//       }
//       deferredPrompt = null;
//       overlay.classList.remove('is-active'); // クラスを削除
//       body.classList.remove('hidden');
//     });
//   });
// });
