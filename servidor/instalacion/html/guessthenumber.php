<?php
session_start();

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;
const MAX_ATTEMPTS = 10;

function startGame(): void
{
    $_SESSION['targetNumber'] = random_int(MIN_NUMBER, MAX_NUMBER);
    $_SESSION['attempts'] = 0;
    $_SESSION['lastGuess'] = null;
    $_SESSION['message'] = 'He pensado un número entre 1 y 100. ¡Adivínalo!';
    $_SESSION['status'] = 'playing';
}

function resetGame(): void
{
    unset(
        $_SESSION['targetNumber'],
        $_SESSION['attempts'],
        $_SESSION['lastGuess'],
        $_SESSION['message'],
        $_SESSION['status']
    );
}

function getGameStatus(): string
{
    return $_SESSION['status'] ?? 'not_started';
}

function processGuess(int $guess): void
{
    if (!isset($_SESSION['targetNumber'])) {
        startGame();
    }

    $_SESSION['attempts']++;
    $_SESSION['lastGuess'] = $guess;

    if ($guess === $_SESSION['targetNumber']) {
        $_SESSION['message'] = "¡Acertaste! El número era $guess.";
        $_SESSION['status'] = 'won';
        return;
    }

    if ($_SESSION['attempts'] >= MAX_ATTEMPTS) {
        $targetNumber = $_SESSION['targetNumber'];
        $_SESSION['message'] = "Has superado el número de intentos. El número era $targetNumber.";
        $_SESSION['status'] = 'lost';
        return;
    }

    if ($guess < $_SESSION['targetNumber']) {
        $_SESSION['message'] = 'El número es mayor. ¡Prueba otra vez!';
    } else {
        $_SESSION['message'] = 'El número es menor. ¡Prueba otra vez!';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'start') {
        startGame();
    } elseif ($action === 'guess' && getGameStatus() === 'playing') {
        $guess = filter_input(
            INPUT_POST,
            'guess',
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => MIN_NUMBER, 'max_range' => MAX_NUMBER]]
        );

        if ($guess === false || $guess === null) {
            $_SESSION['message'] = 'Introduce un número válido entre 1 y 100.';
        } else {
            processGuess($guess);
        }
    } elseif ($action === 'restart') {
        startGame();
    } elseif ($action === 'exit') {
        resetGame();
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$status = getGameStatus();
$message = $_SESSION['message'] ?? '';
$attempts = $_SESSION['attempts'] ?? 0;
$lastGuess = $_SESSION['lastGuess'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el número</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
<main class="game">
    <h1>Adivina el número</h1>
    <p class="subtitle">Un número secreto entre 1 y 100</p>

    <?php if ($status === 'not_started'): ?>

        <div class="message">
            ¿Preparado para jugar?
        </div>

        <form method="post">
            <input type="hidden" name="action" value="start">
            <button type="submit" class="start">Empezar</button>
        </form>

    <?php else: ?>

        <div class="message">
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
        </div>

        <div class="stats">
            <div class="stat">
                Intentos
                <strong><?= $attempts ?> / <?= MAX_ATTEMPTS ?></strong>
            </div>
            <div class="stat">
                Último número
                <strong><?= $lastGuess !== null ? $lastGuess : '—' ?></strong>
            </div>
        </div>

        <?php if ($status === 'playing'): ?>

            <form method="post">
                <input type="hidden" name="action" value="guess">
                <input
                    type="number"
                    name="guess"
                    min="<?= MIN_NUMBER ?>"
                    max="<?= MAX_NUMBER ?>"
                    placeholder="Escribe un número"
                    required
                    autofocus
                >
                <button type="submit">Comprobar</button>
            </form>

            <p class="hint">
                Tienes <?= MAX_ATTEMPTS - $attempts ?> intento<?= MAX_ATTEMPTS - $attempts === 1 ? '' : 's' ?> restante<?= MAX_ATTEMPTS - $attempts === 1 ? '' : 's' ?>.
            </p>

        <?php else: ?>

            <div class="result">
                <?= $status === 'won' ? '¡Partida completada!' : 'Fin de la partida' ?>
            </div>

            <form method="post">
                <input type="hidden" name="action" value="restart">
                <button type="submit">Empezar otra partida</button>
            </form>

        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="action" value="exit">
            <button type="submit" class="secondary">Salir</button>
        </form>

    <?php endif; ?>
</main>
</body>
</html>
