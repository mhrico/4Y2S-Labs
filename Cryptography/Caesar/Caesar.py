message = input('Message: ')
ciphertext = ''

for i in message:
    if i == ' ':
        ciphertext += ' '
    elif i.islower():
        ciphertext += chr((ord(i) + 3 - ord('a')) % 26 + ord('a'))
    else:
        ciphertext += chr((ord(i) + 3 - ord('A')) % 26 + ord('A'))

print('Ciphertext: ' + ciphertext)

deciphertext = ''
for i in ciphertext:
    if i == ' ':
        deciphertext += ' '
    elif i.islower():
        deciphertext += chr((ord(i) - 3 - ord('a')) % 26 + ord('a'))
    else:
        deciphertext += chr((ord(i) - 3 - ord('A')) % 26 + ord('A'))

print('Deciphertext: ' + deciphertext)