package com.company;

import java.math.BigInteger;
import java.nio.charset.StandardCharsets;
import java.security.SecureRandom;
import java.util.Arrays;

import static java.math.BigInteger.ONE;

/**
 * Simple RSA public key encryption algorithm implementation.
 * <P>
 * Taken from "Paj's" website:
 * <TT>http://pajhome.org.uk/crypt/rsa/implementation.html</TT>
 * <P>
 * Adapted by David Brodrick
 */
public class RSA {
    private BigInteger n, d, e;

    private int bitlen = 1024;

    public static byte[] toUnsignedByteArray(BigInteger value) {
        byte[] signedValue = value.toByteArray();
        if(signedValue[0] != 0x00) {
            throw new IllegalArgumentException("value must be a positive BigInteger");
        }
        return Arrays.copyOfRange(signedValue, 1, signedValue.length);
    }

    public BigInteger myModPow(BigInteger a, BigInteger n, BigInteger b){
        //TODO do naprawy
        int m = b.bitLength();
        System.out.println(m);
        a = a.mod(n);
        BigInteger result = ONE;
        BigInteger x = a;
        for (int i = 0; i < m; i++) {
            if (b.testBit(i)){
                result = result.multiply(x);
                result = result.mod(n);
            }
            x = x.multiply(x);
            x = x.mod(n);
        }
        return result;
    }


    /** Create an instance that can encrypt using someone elses public key. */
    public RSA(BigInteger newn, BigInteger newe) {
        n = newn;
        e = newe;
    }

    /** Create an instance that can both encrypt and decrypt. */
    public RSA(int bits) {
        bitlen = bits;
        SecureRandom r = new SecureRandom();
        BigInteger p = new BigInteger(bitlen / 2, 100, r).nextProbablePrime();
        BigInteger q = new BigInteger(bitlen / 2, 100, r).nextProbablePrime();
        n = p.multiply(q);
        BigInteger m = (p.subtract(ONE)).multiply(q.subtract(ONE));
        e = new BigInteger("3");
        while (m.gcd(e).intValue() > 1) {
            e = e.add(new BigInteger("2"));
        }
        d = e.modInverse(m);
    }


    /** Encrypt the given plaintext message. */
    public synchronized String encrypt(String message) {
        return (new BigInteger(message.getBytes())).modPow(e, n).toString();
    }

    /** Encrypt the given plaintext message. */
    public synchronized BigInteger orygencrypt(BigInteger message) {
        return message.modPow(e, n);
    }

    public synchronized BigInteger encrypt(BigInteger message) {
        return myModPow(message, n, e);
    }

    /** Decrypt the given ciphertext message. */
    public synchronized String decrypt(String message) {
        return new String((new BigInteger(message)).modPow(d, n).toByteArray());
    }

    /** Decrypt the given ciphertext message. */
    public synchronized BigInteger decrypt(BigInteger message) {
        return message.modPow(d, n);
    }

    /** Generate a new public and private key set. */
    public synchronized void generateKeys() {
        SecureRandom r = new SecureRandom();
        BigInteger p;
        BigInteger q;
        do {
            p = new BigInteger(bitlen / 2, 100, r).nextProbablePrime();
            q = new BigInteger(bitlen / 2, 100, r).nextProbablePrime();
        }while(p.compareTo(q) == 0);
        n = p.multiply(q);
        BigInteger m = (p.subtract(ONE)).multiply(q.subtract(ONE));
        e = new BigInteger("65537");
        while (m.gcd(e).intValue() > 1) {
            e = e.add(new BigInteger("2"));
        }
        d = e.modInverse(m);
    }

    /** Return the modulus. */
    public synchronized BigInteger getN() {
        return n;
    }

    /** Return the public key. */
    public synchronized BigInteger getE() {
        return e;
    }
}
