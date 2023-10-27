<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ben Turner-Theijsmeijer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
</head>

<!-- Header -->
<?php
require_once('../../components/navbar.php');
echo generateNav('member', 'Ben');
?>

<!-- Content  -->
<section class="content">
    <div class="mt-36 container mx-auto text-center max-width-md font-sans">
        <h1 class="text-2xl font-bold mt-4">TIC-TAC-TOE</h1>
        <p class="mt-4 mb-4 font-bold text-lg">
            Board
        </p>

        <!------------- PHP SECTION ------------->
        <?php
        // set up board placeholder
        $boardPlaceholder = "1----------";
        if (isset($_POST["board"])) {
            $boardPlaceholder = ($_POST["board"]);
        }

        // Initialize the Tic-Tac-Toe board
        $board = [
            [' ', ' ', ' '],
            [' ', ' ', ' '],
            [' ', ' ', ' '],
        ];


        // Begin with Player X
        $player = 'X';
        $winner = ' ';
        $pos = 0;
        $x = 0;
        $y = 0;

        // ----------- Function to display the Tic-Tac-Toe board -----------
        function displayBoard($board)
        {
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 3; $j++) {
                    echo "<span class='text-5xl'> {$board[$i][$j]} </span>";
                    if ($j < 2) {
                        echo "<span class='text-5xl'>|</span>";
                    }
                }
                echo "<br>";
            }
        }
        // ----------- Function to check if the game is over -----------
        function isGameOver($board, $player, &$winner)
        {
            // Check rows, columns, and diagonals for a win
            for ($i = 0; $i < 3; $i++) {
                if ($board[$i][0] != '-' && $board[$i][0] == $board[$i][1] && $board[$i][1] == $board[$i][2]) {
                    $winner = $player;
                    return true;
                }
                if ($board[0][$i] != '-' && $board[0][$i] == $board[1][$i] && $board[1][$i] == $board[2][$i]) {
                    $winner = $player;
                    return true;
                }
            }
            if ($board[0][0] != '-' && $board[0][0] == $board[1][1] && $board[1][1] == $board[2][2]) {
                $winner = $player;
                return true;
            }
            if ($board[0][2] != '-' && $board[0][2] == $board[1][1] && $board[1][1] == $board[2][0]) {
                $winner = $player;
                return true;
            }

            // Check for a draw
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 3; $j++) {
                    if ($board[$i][$j] == '-') {
                        return false; // The game is not over
                    }
                }
            }
            $winner = 'T';
            return true; // It's a draw
        }

        // ----------- Function to convert position into X and Y values -----------
        function convertPos($pos, &$x, &$y)
        {
            switch ($pos) {
                case 1:
                    $x = 0;
                    $y = 0;
                    break;
                case 2:
                    $x = 0;
                    $y = 1;
                    break;
                case 3:
                    $x = 0;
                    $y = 2;
                    break;
                case 4:
                    $x = 1;
                    $y = 0;
                    break;
                case 5:
                    $x = 1;
                    $y = 1;
                    break;
                case 6:
                    $x = 1;
                    $y = 2;
                    break;
                case 7:
                    $x = 2;
                    $y = 0;
                    break;
                case 8:
                    $x = 2;
                    $y = 1;
                    break;
                case 9:
                    $x = 2;
                    $y = 2;
                    break;
                default:
                    $x = -1;
                    $y = -1;
            }
        }

        // ----------- Function to decode placeholder info into current board and current player
        function decodePlaceholder($boardPlaceholder, &$board, &$player, &$winner)
        {
            // Deconde Player Turn
            if ($boardPlaceholder[0] == 0) $player = 'O';
            else $player = 'X';

            // Decode & create board
            for ($i = 1; $i < 10; $i++) {
                $tempX = 0;
                $tempY = 0;
                // Get x and y position of current element
                convertPos($i, $tempX, $tempY);

                // Check what the specified element contains
                if ($boardPlaceholder[$i] == 'X') { // contains X
                    $board[$tempX][$tempY] = 'X';
                } else if ($boardPlaceholder[$i] == 'O') { // contains O
                    $board[$tempX][$tempY] = 'O';
                } else {
                    $board[$tempX][$tempY] = '-'; // is empty (contains -)
                }
            }

            // Determin if the game has ended
            if ($boardPlaceholder[10] == 'O') $winner = 'O';
            else if ($boardPlaceholder[10] == 'X') $winner = 'X';
            else if ($boardPlaceholder[10] == 'T') $winner = 'T';
            else $winner = ' ';
        }


        // ----------- Function to encode current board and current player into placeholder
        function encodePlaceholder(&$boardPlaceholder, $board, $player, $winner)
        {
            if ($player == 'X') $boardPlaceholder[0] = 1;
            else $boardPlaceholder[0] = 0;
            $boardPlaceholder[1] = $board[0][0];
            $boardPlaceholder[2] = $board[0][1];
            $boardPlaceholder[3] = $board[0][2];
            $boardPlaceholder[4] = $board[1][0];
            $boardPlaceholder[5] = $board[1][1];
            $boardPlaceholder[6] = $board[1][2];
            $boardPlaceholder[7] = $board[2][0];
            $boardPlaceholder[8] = $board[2][1];
            $boardPlaceholder[9] = $board[2][2];

            if ($winner == 'O') $boardPlaceholder[10] = 'O';
            else if ($winner == 'X') $boardPlaceholder[10]  = 'X';
            else if ($winner == 'T') $boardPlaceholder[10] = 'T';
            else $boardPlaceholder[10] = '-';
        }

        // ----------- Main Game Loop -------------
        decodePlaceholder($boardPlaceholder, $board, $player, $winner);
        // Check if a position was entered
        if (isset($_POST["pos"]) == 1) { // Position was entered

            // Get the player's Move
            $pos = intval($_POST["pos"]);
            // convert to x and y values
            convertPos($pos, $x, $y);

            // check if move is valid
            if ($x != -1 && $y != -1 && $pos < 10 && $pos > 0 && $board[$x][$y] == '-' && $winner == ' ') {
                // set board value
                $board[$x][$y] = $player;
                echo "Player: {$player} played in position: {$pos} coordiants: {$x} {$y}<br>";

                // check for game over
                if (isGameOver($board, $player, $winner)) { // Game Ended
                    if ($winner == 'T') {
                        echo "Tie Game!<br>";
                    } else {
                        echo "The Winner is: {$winner}<br><br>";
                    }
                } else { // game continue
                    // Switch players
                    if ($player == 'X') $player = 'O';
                    else $player = 'X';
                }
                encodePlaceholder($boardPlaceholder, $board, $player, $winner);
            } else if ($winner != ' ') {
                echo "Please reset the board to play again. <br>";
            } else {
                echo "Invalid Move, Try Again. <br>";
            }
        }
        displayBoard($board);
        ?>

        <!-- Form for choosing where to play -->
        <form action="" method="post" class="mt-4">
            <div class="mb-4">
                <label for="pos" class="text-lg">Choose a Position to Play</label>
                <br>
                <input type="text" id="pos" name="pos" maxlength="1" minlength="1" class="p-2 rounded border border-grey-400 text-center mt-4 mb-2" placeholder="Ex: 1">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-[#FFC72A] hover:bg-yellow-300 text-black w-1/6 py-2 mt-4 mb-2 rounded font-bold">Play at Position</button>
                <input type="hidden" id="board" name="board" value="<?php echo $boardPlaceholder ?>">
            </div>
            <div class="mb-4">
                <a href="ben.php" class="button border border-[#FFC72A] hover:bg-[#FFC72A] text-black px-8 py-2 mt-4 mb-2 rounded font-bold">Reset Game</a>
            </div>
        </form>

        <!-- Tic-Tac-Toe example table goes here -->
        <div class="w-1/3 p-10 container mx-auto mt-8 ">
            <div class="grid grid-cols-3 grid-rows-3 gap-4 text-black font-bold leading-10 bg-black p-4 rounded-lg text-center">
                <div class="p-5 bg-white rounded-tl-lg">1</div>
                <div class="p-5 bg-white">2</div>
                <div class="p-5 bg-white rounded-tr-lg">3</div>
                <div class="p-5 bg-white">4</div>
                <div class="p-5 bg-white">5</div>
                <div class="p-5 bg-white">6</div>
                <div class="p-5 bg-white rounded-bl-lg">7</div>
                <div class="p-5 bg-white">8</div>
                <div class="p-5 bg-white rounded-br-lg">9</div>
            </div>
        </div>
    </div>
</section>


<!-- Footer Section -->
<section class="footer">
    <footer class="w-full bg-black text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; CIS 3760 Group 11</p>
        </div>
    </footer>
</section>

</html>