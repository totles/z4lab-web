<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/z4lab-logo.png">
    <title>z4lab Community Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/z4lab.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">[z4lab Community]</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="https://z4lab.com/manifesto">About</a>
            <a class="nav-link" href="https://steamcommunity.com/groups/z4lab">Steam Group</a>
            <a class="nav-link" href="https://z4lab.com/discord">Discord</a>
            <a class="nav-link" href="https://bans.z4lab.com">SourceBans</a>
            <a class="nav-link" href="https://z4lab.com/arena/leaderboards.php">Arena Stats</a>
          </nav>
        </div>
      </header>
      <main role="main" class="inner cover">
        <h1 class="z4lab-heading">Our Community Servers</h1>
          <?php include 'servers.php'; ?>
          <p class="lead"><a href="ts3server://ts.z4lab.com/?port=9987">[TS3] z4lab Community TeamSpeak</a></p>
      </main>
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>powered by <a href="https://debian.org/">Debian GNU/Linux</a> - view latest <a href="https://z4lab.com/changelog/">changes</a></p>
        </div>
      </footer>
    </div>
  </body>
</html>
