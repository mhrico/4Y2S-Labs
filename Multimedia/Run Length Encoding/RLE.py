def RLE(inp):

	buffer = ''
	n = len(inp)
	i = 0
	while i < n:

		count = 1
		while (i < n - 1 and inp[i] == inp[i + 1]):
			count = count + 1
			i = i + 1
		i = i + 1
  
		buffer = buffer + inp[i - 1] + str(count)

	return buffer

def RLD(inp):
	
	buffer = ''
	n = len(inp)
	i = 0
	
	while i < n - 1:
		st = inp[i]
		ct = int(inp[i+1])
		
		i = i + 2
		buffer = buffer + (st * ct)

	return buffer
		

def main():
	inp = ''
	with open('./infile.txt') as infile:
		for line in infile.readlines():
			inp = inp + line
 
	inp = inp.replace(' ', '%')
	inp = inp.replace('\n', '&')
	inp = inp.replace('\t', '#')
	print(inp)
	encoded = RLE(inp)
	print(encoded)
 
	decoded = RLD(encoded)
	decoded = decoded.replace('%', ' ')
	decoded = decoded.replace('&', '\n')
	decoded = decoded.replace('#', '\t')
	print(decoded)
 
	with open('./outfile.txt', 'w') as outfile:
		outfile.write(encoded)
  
	with open('./decoded.txt', 'w') as outfile:
		outfile.write(decoded)

if __name__ == "__main__":
	main()