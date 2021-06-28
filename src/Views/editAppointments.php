<?php require("components/head.php"); ?>
<div class="container">
    <a class="position-absolute" href="index.php">
        <button type="button" class="btn" style="margin-top: 12px">
            🡨
        </button>
    </a>

    <h1 class="d-flex justify-content-center p-3">🛠 Update question 🎆</h1>
    <form class="form" action='?action=update&id=<?php echo $data["appointments"]->getId() ?>' method="post">
        <ul class="edit list-group lh-lg">
            <li class="list-group-item" style="border:none">
                <label>ID</label><br>
                <input value='<?php echo $data["appointments"]->getId() ?>' class="gray m-0 p-0 container border border-2 border-dark" disabled="disabled">
            </li>
            <li class="list-group-item" style="border:none">
                <label>Name</label><br>
                <input required value='<?php echo $data["appointments"]->getName() ?>' class="m-0 p-0 container border border-2 border-dark" maxlength="20" type="text" name="name" id="name" required>
            </li>
            <li class="list-group-item" style="border:none">
                <label>Topic</label><br>
                <textarea class="m-0 p-0 form-control border border-2 border-dark" aria-label="With textarea" maxlength="100" type="text" name="topic" id="topic" required><?php echo $data["appointments"]->getTopic() ?></textarea>
            </li>
            <li class="list-group-item" style="border:none">
                <label>Date</label><br>
                <input value='<?php echo $data["appointments"]->getDate() ?>' class="gray m-0 p-0 container border border-2 border-dark" disabled="disabled">
            </li>
        </ul>
        <img class="cheeky-robot" src="src/img/carita_bubble.png" alt="pixel art robot"></img>

        <div class="main-button-container">
            <button type="submit" class='btn-create p-2 flex-grow-1 btn' type='button'>
            🧠 Update my question! 👵🏽
            </button>
        </div>
    </form>
</div>
<?php require("components/layout.php"); ?>