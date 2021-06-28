<?php require_once("components/head.php"); ?>

<header class="header flex-row d-flex justify-content-around align-items-center fluid">
    
    <hgroup>
        <h1>✨  CHEEKY_BOT  🌈 <br/>👩‍💻 consulting 🧠</h1>
    </hgroup>
</header>
<div class="container">
    <main class="bubble-container">
        <ul class="bubble-list">
            <?php
            echo '';
            foreach ($data["appointments"] as $appointment) {
                $colorArray = ['FBE7C6', 'B4F8C8', 'A0E7E5', 'FFAEBC', '98ddca', 'd5ecc2', 'ffd3b4', 'ffaaa7', 'fdffbc', 'ffdcb8', 'ffeebb'];
                $rand = rand(0, 7);
                echo
                "
                   <li class='bubble view overlay mask flex-column' style='background-color: #$colorArray[$rand]; ' >
                        <header class='message-header flex-row d-flex justify-content-between'>
                            <ul class='message-data'>
                                <li>#{$appointment->getId()} </li>
                                <li><strong> {$appointment->getName()} </strong></li>
                            </ul>
                            <ul class='edit-buttons'>
                                <li><a class='button' href='?action=delete&id={$appointment->getId()}'>❌</a></li>
                                <li><a class='button' href='?action=edit&id={$appointment->getId()}'>✏️</a></li>
                            </ul>
                        </header>
                        <p>{$appointment->getTopic()}</p>
                        <time> {$appointment->getDate()} </time> 
                    </li>";
            }
            ?>
        </ul>
        <img class="cheeky-robot"src="src/img/carita_bubble.png" alt="pixel art robot"></img>
    </main>
    <div class="main-button-container">
        <a href="?action=create" class='p-2 flex-grow-1 btn' type='button'>
        🤯 I am stuck with code! 🚨
        </a>
    </div>
</div>

<?php require_once("components/layout.php"); ?>

<!-- ✨🤯🤓🧠⛏ 🛎🛠 👩‍💻🤷‍♀️ 👵🏽👵🏻😬🚨 -->