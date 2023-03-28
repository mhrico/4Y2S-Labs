def huffman_encode(s):
    freq_dict = {}
    for char in s:
        if char not in freq_dict:
            freq_dict[char] = 1
        else:
            freq_dict[char] += 1

    node_list = [(freq, char) for char, freq in freq_dict.items()]
    print(node_list)
    while len(node_list) > 1:
        node_list = sorted(node_list, key = lambda n: n[0])
        print(node_list)

        min1 = node_list[0]
        min2 = node_list[1]

        node_list = node_list[2:]

        new_node = (min1[0] + min2[0], (min1[1], min2[1]))

        node_list.append(new_node)

    huff_tree = node_list[0][1]
    print('huff_tree = ', huff_tree)

    code_dict = {}
    def assign_codes(node, code=''):
        if type(node) is str:
            code_dict[node] = code
        else:
            assign_codes(node[0], code + '0')
            assign_codes(node[1], code + '1')

    assign_codes(huff_tree)

    encoded = ''.join([code_dict[char] for char in s])

    return encoded, code_dict


encoded, code_dict = huffman_encode('hello')
print(encoded)
print(code_dict)