import math
import cv2
import numpy as np
import matplotlib.pyplot as plt

pi = 3.142857
m = 8
n = 8

def dctTransform(matrix):

	dct = []
	for i in range(m):
		dct.append([None for _ in range(n)])

	for i in range(m):
		for j in range(n):

			if (i == 0):
				ci = 1 / (m ** 0.5)
			else:
				ci = (2 / m) ** 0.5
			if (j == 0):
				cj = 1 / (n ** 0.5)
			else:
				cj = (2 / n) ** 0.5

			sum = 0
			for k in range(m):
				for l in range(n):

					dct1 = matrix[k][l] * math.cos((2 * k + 1) * i * pi / (
						2 * m)) * math.cos((2 * l + 1) * j * pi / (2 * n))
					sum = sum + dct1

			dct[i][j] = ci * cj * sum

	for i in range(m):
		for j in range(n):
			print(dct[i][j], end="\t")
		print()
  
	output = np.array(dct)
	
	cv2.imshow('', output)

input = cv2.imread('./img.jpg', 0)

dctTransform(input)