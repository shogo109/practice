if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker
        .register('/sw.js')
        .then((reg) => console.log('サービスワーカーの登録成功', reg.scope))
        .catch((err) => console.log('サービスワーカーの登録失敗', err));
    });
  }