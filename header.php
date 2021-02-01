<style>
    #navigation {
        horiz-align: right;
        background-color: #e6002e;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navigation">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!--            меню-->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Главная</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    О нас
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">О проекте</a>
                    <a class="dropdown-item" href="#">Что надо делать</a>
<!--                    <div class="dropdown-divider"></div>-->
<!--                    <a class="dropdown-item" href="#">Reading List</a>-->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Профиль</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" data-bs-toggle="modal" data-bs-target="#signmod">Вход</a>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="#" tabindex="-1" data-bs-toggle="modal"
                   data-bs-target="#regmod">Регистрация</a>
            </li>


            <li class="nav-item">
                <form action="#" method="post">
                    <input type="submit" class="btn btn-dark" name="signout" value="Выход">
                </form>
            </li>

            <!------------------- конец меню>-->
        </ul>

    </div>
</nav>


<div class="modal fade" id="signmod" tabindex="-1" aria-labelledby="modlb" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modlb">Вход
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                         class="bi bi-brightness-low" viewBox="0 0 16 16">
                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z"/>
                    </svg>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="checks/check_auth.php" method="post">
                    <div class="mb-3">
                        <label for="logauth" class="form-label">Почта</label>
                        <input type="text" class="form-control" id="logauth" name="logauth" placeholder="Почта">
                    </div>
                    <div class="mb-3">
                        <label for="passauth" class="form-label">Пароль  </label>
                        <input type="password" class="form-control" id="passauth" name="passauth" placeholder="Пароль">
                    </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" name="do_login" class="btn btn-dark">Авторизация</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="regmod" tabindex="-1" aria-labelledby="modlb" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modlb">Регистрация
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                         class="bi bi-brightness-low" viewBox="0 0 16 16">
                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z"/>
                    </svg>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="namereg" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="namereg" name="namereg" placeholder="Имя">
                    </div>

                    <div class="mb-3">
                        <label for="logreg" class="form-label">Почта</label>
                        <input type="text" class="form-control" id="logreg" name="logreg" placeholder="Почта">
                    </div>

                    <div class="mb-3">
                        <label for="number_form" class="form-label">Класс</label>
                        <input type="number" class="form-control" id="number_form" name="number_form" placeholder="Класс">
                    </div>

                    <div class="mb-3">
                        <label for="form_name" class="form-label">Буква</label>
                        <input type="text" maxlength="1" class="form-control" id="form_name" name="form_name" placeholder="Буква класса">
                    </div>

                    <div class="mb-3">
                        <label for="passreg" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="passreg" name="passreg" placeholder="Пароль">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" name="do_reg" class="btn btn-dark">Создать аккаунт</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>