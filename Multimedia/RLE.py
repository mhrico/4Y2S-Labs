import matplotlib.pyplot as plt
import cv2
import numpy as np

def encode(input):
    runner = int()
    output = list()
    i = 0
    while i <= len(input) - 1:
        count = 1
        runner = input[i]
        j = i
        
        while j < len(input) - 1:
            if input[j] == input[j + 1]:
                count = count + 1
                j = j + 1
            else:
                break
        output.append(count)
        output.append(runner)
        i = j + 1
    output = np.array(output)
    np.savetxt('./output.txt', output, fmt = '%d')
    
    
    
def main():
    input = cv2.imread('./img.jpg', 0)
    # _, input = cv2.threshold(image, 128, 255, cv2.THRESH_BINARY)
    input = input.flatten()

    encode(input)

if __name__ == '__main__':
    main()