<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="login.css" />
    <title>СГТУ-летучки</title>
  </head>
  <body class="body">
    <div class="layout">
      <header class="header"></header>
      <!--#region main-->
      <main class="main">
        <div class="container">
          <div class="greeting">Добро пожаловать</div>
          <form class="form" action="">
            <input
              type="text"
              placeholder="Введите имя"
              required
              class="input-text"
            />
            <input
              type="password"
              placeholder="Введите пороль"
              required
              class="input-text"
            />
            <button type="submit" class="button-submit">Войти</button>
          </form>
        </div>
      </main>
      <!--#endregion main-->
      <footer class="footer"></footer>
    </div>
  </body>
</html>
