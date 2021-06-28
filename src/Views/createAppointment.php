<?php require_once("components/head.php"); ?>

<div class="container">
    <a class="position-absolute" href="index.php"><button type="button" class="btn" style="margin-top: 12px">🡨</button></a>
    <div class="flex-row d-flex justify-content-around align-items-center">
        <h1 class="p-3">👾 New question 🦔</h1>
    </div>
    <form class="form" action="?action=store" method="post">
        <ul class="submit list-group lh-lg" id="create-input">
            <li class="list-group-item" style="border:none">
                <label>Name</label><br>
                <input class="m-0 p-0 container border border-2 border-dark" maxlength="20" type="text" name="name" id="name" required>
            </li>
            <li class="list-group-item" style="border:none">
                <label>Topic</label><br>
                <textarea class="m-0 p-0 form-control border border-2 border-dark" aria-label="With textarea" maxlength="100" type="text" name="topic" id="topic" required></textarea>
            </li>
        </ul>
        <img class="cheeky-robot" src="src/img/carita_bubble.png" alt="pixel art robot"></img>
        <div class="main-button-container">
            <button type="submit" href="?action=create" class='btn-create p-2 flex-grow-1 btn' type='button'>
            🤓 Ask the Cheeky Bot 🤷‍♀️
            </button>
        </div>
    </form>
</div>

<?php require_once("components/layout.php"); ?>