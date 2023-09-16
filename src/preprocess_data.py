# Module that pre processes course data to remove unwanted information
# Skips the first X lines and reads the file's contents
def process_data(file_path, lines_to_skip):
    data = []

    try:
        with open(file_path, 'r', encoding='utf-8', errors='ignore') as file:
            for _ in range(lines_to_skip):
                next(file)

            for line in file:
                # print(line)
                data.append(line)
            
            new_data = ''.join(data)
            file = open("data.txt", "w")
            file.write(new_data)

            # return '\n'.join(data) # returns the data as a single string
           

    except FileNotFoundError:
        print(f"File '{file_path}' was not found.")
    except Exception as e:
        print(f"Error: {str(e)}")

if __name__ == "__main__":
    file_path = "../data/raw/f23_courses2.txt"
 
    data = process_data(file_path, 199) 




