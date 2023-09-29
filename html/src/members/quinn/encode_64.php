<?php
    function encode_64($input_string)
    {
        $output_string = "";
        $base_64_dict="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
        for($x = 0; $x < strlen($input_string); $x += 3)
        {
            $b1 = $input_string[$x]   ?? "";
            $b2 = $input_string[$x+1] ?? "";
            $b3 = $input_string[$x+2] ?? "";
        
            // Case all three characters are present to form a chunk
            if(!is_null($input_string[$x] ?? null) && !is_null($input_string[$x+1] ?? null) && !is_null($input_string[$x+2] ?? null))
            {
                $b1 = $input_string[$x]   ?? "";
                $b2 = $input_string[$x+1] ?? "";
                $b3 = $input_string[$x+2] ?? "";
            
                $b1 = ord($b1);
                $b2 = ord($b2);
                $b3 = ord($b3);
            
                $chunk1 = $b1 >> 2;
                $chunk2 = ($b2 >> 4) | (($b1 & 0x03) << 4);
                $chunk3 = ($b3 >> 6) | (($b2 & 0x0f) << 2);
                $chunk4 = $b3 & 0x3f;
            
                $output_string = "{$output_string}{$base_64_dict[$chunk1]}{$base_64_dict[$chunk2]}{$base_64_dict[$chunk3]}{$base_64_dict[$chunk4]}";
            }
            elseif(!is_null($input_string[$x] ?? null) && !is_null($input_string[$x+1]?? null) && is_null($input_string[$x+2] ?? null))
            {
                $b1 = $input_string[$x]   ?? "";
                $b2 = $input_string[$x+1] ?? "";
            
                $b1 = ord($b1);
                $b2 = ord($b2);
            
                $chunk1 = $b1 >> 2;
                $chunk2 = ($b2 >> 4) | (($b1 & 0x03) << 4);
                $chunk3 = ($b2 & 0x0f) << 2;
            
                $output_string = "{$output_string}{$base_64_dict[$chunk1]}{$base_64_dict[$chunk2]}{$base_64_dict[$chunk3]}=";
            }
            elseif(!is_null($input_string[$x] ?? null) && is_null($input_string[$x+1]?? null) && is_null($input_string[$x+2] ?? null))
            {
                $b1 = $input_string[$x]   ?? "";
            
                $b1 = ord($b1);
            
                $chunk1 = $b1 >> 2;
                $chunk2 = ($b1 & 0x03) << 4;
                $output_string = "{$output_string}{$base_64_dict[$chunk1]}{$base_64_dict[$chunk2]}==";
            }
        }
        return $output_string;
    }
?>