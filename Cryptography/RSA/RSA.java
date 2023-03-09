import java.math.BigInteger;
import java.security.SecureRandom;

public class RSA {
    private BigInteger modulus;
    private BigInteger publicKey;
    private BigInteger privateKey;
    private int bitLength;

    public RSA(int bitLength) {
        this.bitLength = bitLength;
        SecureRandom rnd = new SecureRandom();
        BigInteger p = new BigInteger(bitLength / 2, 100, rnd);
        BigInteger q = new BigInteger(bitLength / 2, 100, rnd);
        modulus = p.multiply(q);
        BigInteger phi = p.subtract(BigInteger.ONE).multiply(q.subtract(BigInteger.ONE));
        publicKey = new BigInteger("65537");
        privateKey = publicKey.modInverse(phi);
    }

    public BigInteger encrypt(BigInteger message) {
        return message.modPow(publicKey, modulus);
    }

    public BigInteger decrypt(BigInteger encrypted) {
        return encrypted.modPow(privateKey, modulus);
    }

    public static void main(String[] args) {
        RSA rsa = new RSA(1024);
        BigInteger message = new BigInteger("123456789");
        BigInteger encrypted = rsa.encrypt(message);
        BigInteger decrypted = rsa.decrypt(encrypted);
        System.out.println("Original message: " + message);
        System.out.println("Encrypted message: " + encrypted);
        System.out.println("Decrypted message: " + decrypted);
    }
}