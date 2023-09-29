<?php
    function encode_64($input_string)
    {

        // Note: See https://www.php.net/manual/en/migration70.new-features.php for the ?? Null coalesing operator used below

        // Output string that is built upon in each loop
        $output_string = "";

        // Dictionary of base64 values by array index, i.e., A=0, B=1, etc...
        $base_64_dict="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";

        for($x = 0; $x < strlen($input_string); $x += 3)
        {   // Iterate through all groups of 3 characters in the string
        
            
            if(!is_null($input_string[$x] ?? null) && !is_null($input_string[$x+1] ?? null) && !is_null($input_string[$x+2] ?? null))
            {   // CASE 1: all three characters are present to form a chunk

                // Get all three characters from the string
                $b1 = $input_string[$x];
                $b2 = $input_string[$x+1];
                $b3 = $input_string[$x+2];
                
                // Convert ascii chars to integer values
                $b1 = ord($b1);
                $b2 = ord($b2);
                $b3 = ord($b3);
                
                // Split 8-bit ascii values into 6-bit chunks
                $chunk1 = $b1 >> 2;
                $chunk2 = ($b2 >> 4) | (($b1 & 0x03) << 4);
                $chunk3 = ($b3 >> 6) | (($b2 & 0x0f) << 2);
                $chunk4 = $b3 & 0x3f;
                
                // Concatenate base64 characters onto the output string
                $output_string = "{$output_string}{$base_64_dict[$chunk1]}{$base_64_dict[$chunk2]}{$base_64_dict[$chunk3]}{$base_64_dict[$chunk4]}";
            }
            elseif(!is_null($input_string[$x] ?? null) && !is_null($input_string[$x+1]?? null) && is_null($input_string[$x+2] ?? null))
            {   // CASE 2: only 2 characters are present to form a chunk

                // Get first two characters, pad rest of chunk with 0's
                $b1 = $input_string[$x];
                $b2 = $input_string[$x+1];
                
                // Convert ascii chars to integer values
                $b1 = ord($b1);
                $b2 = ord($b2);
                
                // Split 8-bit ascii values into 6-bit chunks
                $chunk1 = $b1 >> 2;
                $chunk2 = ($b2 >> 4) | (($b1 & 0x03) << 4);
                $chunk3 = ($b2 & 0x0f) << 2;
                
                // Concatenate base64 characters onto the output string, add '=' to pad chunk
                $output_string = "{$output_string}{$base_64_dict[$chunk1]}{$base_64_dict[$chunk2]}{$base_64_dict[$chunk3]}=";
            }
            elseif(!is_null($input_string[$x] ?? null) && is_null($input_string[$x+1]?? null) && is_null($input_string[$x+2] ?? null))
            {   // CASE 3: only 1 character is present to form a chunk

                // Get the first character, pad rest of chunk with 0's
                $b1 = $input_string[$x]   ?? "";
                
                // Convert ascii chars to integer values
                $b1 = ord($b1);
                
                // Split 8-bit ascii values into 6-bit chunks
                $chunk1 = $b1 >> 2;
                $chunk2 = ($b1 & 0x03) << 4;

                // Concatenate base64 characters onto the output string, add '=' to pad chunk
                $output_string = "{$output_string}{$base_64_dict[$chunk1]}{$base_64_dict[$chunk2]}==";
            }
        }

        // Return the final output string
        return $output_string;
    }
?>