<header>
      <div class="bs-component">
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
          <div class="container-fluid">
            <img src="assets/img/logo.png" width="50">
            <a class="navbar-brand" href="index.php">
              <strong>PHP</strong><sup>CRUD</sup></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
              aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav me-auto">
                <li class="nav-item me-3">
                  <a class="nav-link btn btn-outline-info" href="index.php">Users
                    <span class="visually-hidden">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-outline-info" href="create.php">Add User</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link btn btn-outline-info" href="documentation.php">Documentation</a>
                </li>
              </ul>
              <form class="d-flex" action="index.php" method="get">
                <input class="form-control me-sm-2 text-white" type="text" name="keyword" placeholder="Search" autocomplete="off">
                <button class="btn btn-outline-info my-2 my-sm-0 text-light" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>