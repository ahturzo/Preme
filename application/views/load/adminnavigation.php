<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?= base_url('main'); ?>">Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('main'); ?>">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('viewload/profile'); ?>">Profile</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Parent Profiles</a>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                  <a class="dropdown-item" href="<?= base_url('viewload/parent_list'); ?>">List Of Parent's Profile</a>
                  <a class="dropdown-item" href="<?= base_url('work/addParent'); ?>">Add Parent</a>
                </div>
            </li> <!--Child dropdownlist end here-->

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('work/add_care'); ?>">Add Child Care</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('work/add_problem'); ?>">Add Child Problem</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('login/logout'); ?>">Logout</a>
          </li>
        </ul>
      </div>
</nav>