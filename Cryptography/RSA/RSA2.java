import java.math.BigInteger;
import java.security.SecureRandom;

public class RSA2 {
    private BigInteger modulus;
    private BigInteger publicKey;
    private BigInteger privateKey;
    private int bitLength;

    public RSA2(int bitLength) {
        this.bitLength = bitLength;
        SecureRandom rnd = new SecureRandom();
        BigInteger p = new BigInteger(bitLength / 2, 100, rnd);
        BigInteger q = new BigInteger(bitLength / 2, 100, rnd);
        modulus = p.multiply(q);
        BigInteger phi = p.subtract(BigInteger.ONE).multiply(q.subtract(BigInteger.ONE));
        publicKey = new BigInteger("1000000007");
        privateKey = publicKey.modInverse(phi);
    }

    public String encrypt(String message) {
        BigInteger plaintext = new BigInteger(message.getBytes());
        BigInteger ciphertext = plaintext.modPow(publicKey, modulus);
        return ciphertext.toString();
    }

    public String decrypt(String ciphertext) {
        BigInteger encrypted = new BigInteger(ciphertext);
        BigInteger decrypted = encrypted.modPow(privateKey, modulus);
        return new String(decrypted.toByteArray());
    }

    public static void main(String[] args) {
        RSA2 rsa = new RSA2(1024);
        String message = "Hello, CSERU!";
        String encrypted = rsa.encrypt(message);
        String decrypted = rsa.decrypt(encrypted);
        System.out.println("Original message: " + message);
        System.out.println("Encrypted message: " + encrypted);
        System.out.println("Decrypted message: " + decrypted);
    }
}
