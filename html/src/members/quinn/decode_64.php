<?php
    function decode_64($input_string)
    {

        // Note: See https://www.php.net/manual/en/migration70.new-features.php for the ?? Null coalesing operator used below

        // Output string that is built upon in each loop
        $output_string = "";

        // Dictionary of base64 values by array index, i.e., A=0, B=1, etc...
        $base_64_dict="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";

        for($x = 0; $x < strlen($input_string); $x += 4)
        {   // Iterate through all groups of 4 characters in the string

            if( // CASE 1: If group of 4 characters does not contain any '=' characters
                ($input_string[$x] ?? "=") != "=" &&
                ($input_string[$x+1] ?? "=") != "=" &&
                ($input_string[$x+2] ?? "=") != "=" &&
                ($input_string[$x+3] ?? "=") != "=")
            {
                // All characters are valid
                $chunk1 = $input_string[$x];
                $chunk2 = $input_string[$x+1];
                $chunk3 = $input_string[$x+2];
                $chunk4 = $input_string[$x+3];
            
                // Base64 value of each character
                $chunk1 = strpos($base_64_dict, $chunk1);
                $chunk2 = strpos($base_64_dict, $chunk2);
                $chunk3 = strpos($base_64_dict, $chunk3);
                $chunk4 = strpos($base_64_dict, $chunk4);

                // Combine chunks of 6-bits into 8-bit ascii values
                $b1 = ($chunk1 << 2) | ($chunk2 >> 4);
                $b2 = ($chunk2 << 4) | ($chunk3 >> 2);
                $b3 = ($chunk3 << 6) | ($chunk4);

                // Get ascii character of the values
                $b1 = chr($b1);
                $b2 = chr($b2);
                $b3 = chr($b3);
            
                // Concatenate onto the output string
                $output_string = "{$output_string}{$b1}{$b2}{$b3}";
            }
            elseif( // CASE 2: If group of 4 contains one '=' character at the end
                ($input_string[$x] ?? "=") != "=" &&
                ($input_string[$x+1] ?? "=") != "=" &&
                ($input_string[$x+2] ?? "=") != "=" &&
                ($input_string[$x+3] ?? "=") == "=")
            {
                // Only the first three characters are valid
                $chunk1 = $input_string[$x];
                $chunk2 = $input_string[$x+1];
                $chunk3 = $input_string[$x+2];
                
                // Base64 value of each character
                $chunk1 = strpos($base_64_dict, $chunk1);
                $chunk2 = strpos($base_64_dict, $chunk2);
                $chunk3 = strpos($base_64_dict, $chunk3);

                // Combine chunks of 6-bits into 8-bit ascii values
                $b1 = ($chunk1 << 2) | ($chunk2 >> 4);
                $b2 = ($chunk2 << 4) | ($chunk3 >> 2);

                // Get ascii character of the values
                $b1 = chr($b1);
                $b2 = chr($b2);
            
                // Concatenate onto the output string
                $output_string = "{$output_string}{$b1}{$b2}";
            }
            elseif( // CASE 3: If group of 4 characters contains 2 '=' characters at the end
                ($input_string[$x] ?? "=") != "=" &&
                ($input_string[$x+1] ?? "=") != "=" &&
                ($input_string[$x+2] ?? "=") == "=" &&
                ($input_string[$x+3] ?? "=") == "=")
            {   

                // Only the first two characters are valid
                $chunk1 = $input_string[$x];
                $chunk2 = $input_string[$x+1];
                
                // Base64 value of each character
                $chunk1 = strpos($base_64_dict, $chunk1);
                $chunk2 = strpos($base_64_dict, $chunk2);

                // Combine chunks of 6-bits into 8-bit ascii values
                $b1 = ($chunk1 << 2) | ($chunk2 >> 4);

                // Get ascii character of the value
                $b1 = chr($b1);

                // Concatenate onto the output string
                $output_string = "{$output_string}{$b1}";
            }
        }

        // Return the final output string
        return $output_string;
    }
?>