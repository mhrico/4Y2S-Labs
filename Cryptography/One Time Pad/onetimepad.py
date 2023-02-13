pad = 'abcdefghijklmnopqrstuvwxyz'

msg = 'helloworld'

enc = ''

for i in range(len(msg)):
    enc = enc + chr( ( (ord(msg[i]) - ord('a') + 1 ) + ord(pad[i]) ) % 26 + ord('a') )
print('pad: ' + pad)

dec = ''

for i in range(len(msg)):
    dec = dec + chr( ( (ord(msg[i]) - ord('a') - 1 ) - ord(pad[i]) ) % 26 + ord('a') )
    
# pad = pad[i:]
# print(pad)
print(enc)
print(dec)