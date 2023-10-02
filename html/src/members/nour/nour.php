<!DOCTYPE html>
<html class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nour</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../../../src/favicon/favicon.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<?php
$result;
function sentimentAnalysis($inputText)
{
    $emotions = ['Sadness 😔', 'Joy 😁', 'Love 💕', 'Anger 😤', 'Fear 😱', 'Suprise 😮'];

    $apiUrl = "https://api.cohere.ai/v1/classify";

    // Create an array with the request data
    $data = [
        'truncate' => 'END',
        'model' => 'b92a2d69-4a3a-4e9e-9ba8-5ff000a61f3b-ft',
        'inputs' => [
            $inputText
        ]
    ];

    // Set the HTTP headers
    $headers = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-type: application/json\r\n" .
                "Authorization: Bearer exQMw58EGsXQxGwpYk5y03hlkqJP434HAJ8ohHpC",
            'content' => json_encode($data),
        ]
    ];

    $context = stream_context_create($headers);

    // Make the HTTP request using file_get_contents
    $response = file_get_contents($apiUrl, false, $context);
    if ($response === false) {
        $error = error_get_last();
        echo "Error making the request: " . $error['message'];
    } else {
        global $result;
        $result = $emotions[(int)json_decode($response, true)['classifications'][0]['prediction']];
    }
}

if (isset($_POST['submit'])) {
    // Check if the 'inputText' field is set and not empty
    if (isset($_POST['inputText']) && !empty($_POST['inputText'])) {
        $inputText = $_POST['inputText'];

        // Call a function to perform an operation based on the input
        sentimentAnalysis($inputText);
    } else {
        echo "Please enter some text.";
    }
}
?>
<!-- Header -->

<body class=" bg-no-repeat bg-top bg-fixed bg-[url('../../../imgs/background.png')] bg-cover">
    <header class="bg-black w-full sticky top-0 z-30">
        <div class="flex flex-row relative">
            <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
                <a href="../../meet_the_team.php">
                    <span class="font-sans font-bold text-white text-4xl leading-10 underline decoration-[#FFC72A] hover:decoration-[#C20430] transition-all duration-300 decoration-4 underline-offset-4">Noureldeen Ahmed</span>
                </a>
            </div>
            <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
                <a href="../../meet_the_team.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                    Meet The Team
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]"></span>
                </a>
                <a href="../../how_it_works.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                    How It Works
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]"></span>
                </a>
                <a href="/excel/course_selection_tool.xlsm" download="course_selection.xlsm" class="bg-[#FFC72A] rounded-sm py-1 text-2xl font-bold p-3.5 group">Download
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                </a>
            </div>
            <div class="h-4 w-3/4 bg-[#C20430] absolute -bottom-6"></div>
            <div class="h-4 w-1/3 bg-[#FFC72A] absolute -bottom-12"></div>
        </div>
    </header>
    <div class="flex flex-col h-screen items-center pt-36 w-full">
        <div class="py-[4rem] px-4 md:px-14 flex max-w-4xl w-full gap-20 justify-between rounded-md backdrop-blur-sm bg-black/60 flex-col items-center">
            <div class="flex flex-col w-full justify-between md:flex-row">
                <div class="flex flex-col max-w-xs w-full gap-4">
                    <h1 class="text-5xl underline decoration-[#FFC72A] text-white font-bold">Welcome to MoodAnalyser</h1>
                    <span class="text-xl text-white font-bold">Powered by <a href="https://cohere.com/classify" target="_blank" class="underline decoration-[#FFC72A] transition-all duration-300 hover:decoration-[#C20430]"><span>Cohere Classify</span></a></span></h1>
                </div>
                <div class="max-w-xs w-full mt-8 md:mt-0">
                    <form method="post" action="nour.php" class="w-full flex flex-col">
                        <label for="inputText" class="decoration-[#FFC72A] underline text-2xl font-bold text-white">How do you feel?</label>
                        <div class="flex flex-col w-full self-center md:self-start">
                            <input type="text" id="inputText" placeholder="I feel like..." name="inputText" class="w-full px-4 py-2 border mt-2 rounded-lg focus:outline-none focus:border-[#FFC72A]">
                            <button type="submit" name="submit" class="self-center group bg-[#FFC72A] text-xl text-black font-bold mt-6 py-2 px-4 rounded">Submit
                                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($result)) {
                echo '<h1 class="text-2xl font-bold text-white h-auto w-auto text-center">The emotion you are experiencing is:<br><span class="text-4xl underline decoration-[#FFC72A]">';
                echo $result;
                echo '</span>';
            }
            ?>
        </div>
    </div>
    <div class="w-full backdrop-blur-sm bg-black/60 md:flex-col p-16">
        <h1 class="text-2xl underline decoration-[#FFC72A] text-white font-bold">Dataset Acknowledgements:</h1>
        <br>
        <?php
        $AcknowledgementData = [
            'Title' => "{CARER}: Contextualized Affect Representations for Emotion Recognition",
            'Authors' => "Saravia, Elvis  and
            Liu, Hsien-Chi Toby  and
            Huang, Yen-Hao  and
            Wu, Junlin  and
            Chen, Yi-Shin",
            'Booktitle' => "Proceedings of the 2018 Conference on Empirical Methods in Natural Language Processing",
            'Month' => "Oct - Nov",
            'Year' => "2018",
            'Address' => "Brussels, Belgium",
            'Publisher' => "Association for Computational Linguistics",
            'Url' => "https://www.aclweb.org/anthology/D18-1404",
            'Doi' => "10.18653/v1/D18-1404",
            'Pages' => "3687--3697",
            'Abstract' => "Emotions are expressed in nuanced ways, which varies by collective or individual experiences, knowledge, and beliefs. Therefore, to understand emotion, as conveyed through text, a robust mechanism capable of capturing and modeling different linguistic nuances and phenomena is needed. We propose a semi-supervised, graph-based algorithm to produce rich structural descriptors which serve as the building blocks for constructing contextualized affect representations from text. The pattern-based representations are further enriched with word embeddings and evaluated through several emotion recognition tasks. Our experimental results demonstrate that the proposed method outperforms state-of-the-art techniques on emotion recognition tasks."
        ];
        foreach ($AcknowledgementData as $key => $Acknowledgement) {
            echo '<h1 class="text-xl underline decoration-[#FFC72A] font-bold text-white h-auto w-auto">';
            echo $key;
            echo ':<span class="no-underline font-normal inline-block ml-1">';
            echo (string)$Acknowledgement;
            echo '</span> </h>';
        }
        ?>
    </div>
    <section class="footer">
        <footer class="w-full bg-black text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; CIS 3760 Group 11</p>
            </div>
        </footer>
    </section>
</body>

</html>