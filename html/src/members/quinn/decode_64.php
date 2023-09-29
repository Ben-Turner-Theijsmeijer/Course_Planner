<?php
    function decode_64($input_string)
    {
        $output_string = "";
        $base_64_dict="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
        for($x = 0; $x < strlen($input_string); $x += 4)
        {
            if(
                ($input_string[$x] ?? "=") != "=" &&
                ($input_string[$x+1] ?? "=") != "=" &&
                ($input_string[$x+2] ?? "=") != "=" &&
                ($input_string[$x+3] ?? "=") != "=")
            {
                $chunk1 = $input_string[$x];
                $chunk2 = $input_string[$x+1];
                $chunk3 = $input_string[$x+2];
                $chunk4 = $input_string[$x+3];
            
                $chunk1 = strpos($base_64_dict, $chunk1);
                $chunk2 = strpos($base_64_dict, $chunk2);
                $chunk3 = strpos($base_64_dict, $chunk3);
                $chunk4 = strpos($base_64_dict, $chunk4);

                $b1 = ($chunk1 << 2) | ($chunk2 >> 4);
                $b2 = ($chunk2 << 4) | ($chunk3 >> 2);
                $b3 = ($chunk3 << 6) | ($chunk4);

                $b1 = chr($b1);
                $b2 = chr($b2);
                $b3 = chr($b3);
            
                $output_string = "{$output_string}{$b1}{$b2}{$b3}";
            }
            elseif(
                ($input_string[$x] ?? "=") != "=" &&
                ($input_string[$x+1] ?? "=") != "=" &&
                ($input_string[$x+2] ?? "=") != "=" &&
                ($input_string[$x+3] ?? "=") == "=")
            {
                $chunk1 = $input_string[$x];
                $chunk2 = $input_string[$x+1];
                $chunk3 = $input_string[$x+2];
            
                $chunk1 = strpos($base_64_dict, $chunk1);
                $chunk2 = strpos($base_64_dict, $chunk2);
                $chunk3 = strpos($base_64_dict, $chunk3);

                $b1 = ($chunk1 << 2) | ($chunk2 >> 4);
                $b2 = ($chunk2 << 4) | ($chunk3 >> 2);

                $b1 = chr($b1);
                $b2 = chr($b2);
            
                $output_string = "{$output_string}{$b1}{$b2}";
            }
            elseif(
                ($input_string[$x] ?? "=") != "=" &&
                ($input_string[$x+1] ?? "=") != "=" &&
                ($input_string[$x+2] ?? "=") == "=" &&
                ($input_string[$x+3] ?? "=") == "=")
            {
                $chunk1 = $input_string[$x];
                $chunk2 = $input_string[$x+1];
            
                $chunk1 = strpos($base_64_dict, $chunk1);
                $chunk2 = strpos($base_64_dict, $chunk2);

                $b1 = ($chunk1 << 2) | ($chunk2 >> 4);

                $b1 = chr($b1);

                $output_string = "{$output_string}{$b1}";
            }
        }
        return $output_string;
    }
?>